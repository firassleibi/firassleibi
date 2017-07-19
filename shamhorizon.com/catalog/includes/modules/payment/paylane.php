<?php

class paylane
{
    const PAYLANE_SECURE_FORM_URL = 'https://secure.paylane.com/order/cart.html';
    var $code, $title, $description, $enabled;

    function paylane()
    {
        global $order;

        $this->code = 'paylane';
        $this->title = MODULE_PAYMENT_PAYLANE_TEXT_TITLE;
        $this->description = MODULE_PAYMENT_PAYLANE_TEXT_DESCRIPTION;
        $this->sort_order = MODULE_PAYMENT_PAYLANE_SORT_ORDER;

        $this->enabled = ((MODULE_PAYMENT_PAYLANE_STATUS == 'True') ? true : false);

        if ((int)MODULE_PAYMENT_PAYLANE_ORDER_STATUS_ID > 0)
        {
            $this->order_status = MODULE_PAYMENT_PAYLANE_ORDER_STATUS_ID;
        }

        $this->form_action_url = self::PAYLANE_SECURE_FORM_URL;

        if (is_object($order)) $this->update_status();
    }

    function update_status()
    {
        global $order;

        if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_PAYLANE_ZONE > 0) )
        {
            $check_flag = false;
            $check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_PAYLANE_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
            while ($check = tep_db_fetch_array($check_query))
            {
                if ($check['zone_id'] < 1)
                {
                    $check_flag = true;
                    break;
                }
                elseif ($check['zone_id'] == $order->delivery['zone_id'])
                {
                    $check_flag = true;
                    break;
                }
            }

            if ($check_flag == false)
            {
                $this->enabled = false;
            }
        }
    }

    function javascript_validation()
    {
        return false;
    }

    function selection()
    {
        return array(
            'id' => $this->code,
            'module' => $this->title
        );
    }

    function pre_confirmation_check()
    {
        return false;
    }

    function confirmation()
    {
        return false;
    }

    function process_button()
    {
        global $order, $currency, $language;

        $transaction_description = MODULE_PAYMENT_PAYLANE_SHOPPED_ITEMS . ": ";
        $process_button_string = "";

        foreach ($order->products as $k => $v)
        {
            $transaction_description .= $v['name'] . ", ";
        }

        $transaction_description = substr($transaction_description, 0, -2);

        $parameters = array(
            'merchant_id' => MODULE_PAYMENT_PAYLANE_MERCHANTID,
            'merchant_transaction_id' => "osCommerce",
            'amount' => $order->info['total'],
            'currency_code' => $currency,
            'transaction_type' => 'S',
            'back_url' => HTTP_SERVER . DIR_WS_HTTP_CATALOG . FILENAME_CHECKOUT_PROCESS,
            'transaction_description' => $transaction_description,
            'language' => ('polish' == $language) ? "pl" : "en",
            'customer_name' => $order->customer['firstname'] . " " . $order->customer['lastname'],
            'customer_email' => $order->customer['email_address'],
            'customer_address' => $order->customer['street_address'],
            'customer_zip' => $order->customer['postcode'],
            'customer_city' => $order->customer['city'],
            'customer_state' => $order->customer['state'],
            'customer_country' => $order->customer['country']['iso_code_2'],
        );

        $hash = MODULE_PAYMENT_PAYLANE_HASH;

        if ( !empty($hash))
        {
            $parameters['hash'] = SHA1(
                MODULE_PAYMENT_PAYLANE_HASH . "|" .
                $parameters['merchant_transaction_id'] . "|" .
                $parameters['amount'] . "|" .
                $parameters['currency_code'] . "|" .
                $parameters['transaction_type']
            );
        }

        reset($parameters);
        while (list($key, $value) = each($parameters))
        {
            $process_button_string .= tep_draw_hidden_field($key, $value);
        }

        return $process_button_string;
    }

    function before_process()
    {
        if ('POST' == MODULE_PAYMENT_PAYLANE_REDIRECT)
        {
            $request = $_POST;
        }
        else
        {
            $request = $_GET;
        }

        if (1 != $request['correct'])
        {
            tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_PAYLANE_ERROR_INCORRECT), 'NONSSL', true, false));
        }

        $hash = MODULE_PAYMENT_PAYLANE_HASH;
        $hash_transaction = SHA1(MODULE_PAYMENT_PAYLANE_HASH . "|" . $request['correct'] . "|" . $request['merchant_transaction_id'] . "|" . $request['amount'] . "|" . $request['currency_code']);

        if ( !empty($hash) and $hash_transaction != $request['hash'])
        {
            tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_PAYLANE_ERROR_HASH), 'NONSSL', true, false));
        }

        if ( !empty($request['id_error']) and 0 < $request['id_error'])
        {
            tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_PAYLANE_ERROR_FROM_PROCESSOR . " " . $request['error_code'] . "-" . $request['error_text']), 'NONSSL', true, false));
        }

        return true;
    }

    function after_process()
    {
        global $customer_id;

        if ('POST' == MODULE_PAYMENT_PAYLANE_REDIRECT)
        {
            $request = $_POST;
        }
        else
        {
            $request = $_GET;
        }

        $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by date_purchased desc limit 1");
        $orders = tep_db_fetch_array($orders_query);
        $order_id = $orders['orders_id'];

        if ($order_id > 0)
        {
            tep_db_query("update " . TABLE_ORDERS_STATUS_HISTORY . " set comments = 'Paylane id sale = " . $request['id_sale'] . "' where orders_id = '" . (int)$order_id . "' order by date_added desc limit 1");
        }

        return true;
    }

    function output_error()
    {
        return false;
    }

    function check()
    {
        if (!isset($this->_check))
        {
            $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYLANE_STATUS'");
            $this->_check = tep_db_num_rows($check_query);
        }
        return $this->_check;
    }

    function install()
    {
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable PayLane Secure Form', 'MODULE_PAYMENT_PAYLANE_STATUS', 'False', 'Do you want to process payments via PayLane Secure Form?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Type of Secure Form redirect', 'MODULE_PAYMENT_PAYLANE_REDIRECT', 'POST', 'How you want to handle redirects from PayLane?', '6', '1', 'tep_cfg_select_option(array(\'POST\', \'GET\'), ', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayLane Merchant ID', 'MODULE_PAYMENT_PAYLANE_MERCHANTID', '0', 'Your PayLane Merchant ID', '6', '2', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Hash salt', 'MODULE_PAYMENT_PAYLANE_HASH', '0', 'Your HASH from Paylane Merchant Panel', '6', '2', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sorting order', 'MODULE_PAYMENT_PAYLANE_SORT_ORDER', '0', 'Default sorting order. Most recent are first in default.', '6', '0', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment region', 'MODULE_PAYMENT_PAYLANE_ZONE', '0', 'If any is choosen, then this form of payments will be only available in that zone', '6', '2', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Default order status', 'MODULE_PAYMENT_PAYLANE_ORDER_STATUS_ID', '0', 'All orders processed by this form pament will be checked as setted up option', '6', '0', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");

    }

    function remove()
    {
        tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys()
    {
        return array('MODULE_PAYMENT_PAYLANE_STATUS', 'MODULE_PAYMENT_PAYLANE_REDIRECT', 'MODULE_PAYMENT_PAYLANE_MERCHANTID', 'MODULE_PAYMENT_PAYLANE_HASH', 'MODULE_PAYMENT_PAYLANE_ZONE', 'MODULE_PAYMENT_PAYLANE_ORDER_STATUS_ID','MODULE_PAYMENT_PAYLANE_SORT_ORDER');
    }
}
