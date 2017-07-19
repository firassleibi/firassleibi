<?php

class paylane_directdebit
{
    var $code, $title, $description, $enabled, $paylane, $paylane_transaction_id;
    public $supported_countries = array(
        array(
            "id" => "",
            "text" => "Select country"
        ),
        array(
            "id" => "14",
            "text" => "Austria"
        ),
        array(
            "id" => "81",
            "text" => "Germany"
        ),
        array(
            "id" => "150",
            "text" => "Netherlands"
        ),
        array(
            "id" => "103",
            "text" => "Ireland"
        ),
    );

    function paylane_directdebit()
    {
        global $order;

        include_once(DIR_FS_CATALOG . DIR_WS_CLASSES . 'PayLaneClient.php');
        $this->paylane = new PayLaneClient();

        $this->code = 'paylane_directdebit';
        $this->title = MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_TEXT_TITLE;
        $this->public_title = MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_TEXT_PUBLIC_TITLE;
        $this->description = MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_TEXT_DESCRIPTION;
        $this->sort_order = MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_SORT_ORDER;

        $this->enabled = ((MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_STATUS == 'True') ? true : false);

        if ((int)MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ORDER_STATUS_ID > 0)
        {
            $this->order_status = MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ORDER_STATUS_ID;
        }

        if (is_object($order)) $this->update_status();
    }

    function update_status()
    {
        global $order;

        if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ZONE > 0) )
        {
            $check_flag = false;
            $check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
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
        $selection = array('id' => $this->code,
            'module' => $this->public_title);

        global $order;

        $selection['fields'] = array(array('title' => MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ACCOUNT_HOLDER,
            'field' => tep_draw_input_field('account_holder', $order->billing['firstname'] . ' ' . $order->billing['lastname'])),
            array('title' => MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ACCOUNT_NUMBER,
                'field' => tep_draw_input_field('account_number')),
            array('title' => MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ACCOUNT_COUNTRY,
                'field' => tep_draw_pull_down_menu('account_country', $this->supported_countries)),
            array('title' => MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_BANK_CODE_NUMBER,
                'field' => tep_draw_input_field('bank_code') . ' ' . MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_BANK_CODE_NUMBER_INFO)
        );

        return $selection;
    }

    function pre_confirmation_check()
    {
        return false;
    }

    function confirmation()
    {
        $confirmation = array();

        global $HTTP_POST_VARS;

        $countries = tep_get_countries($HTTP_POST_VARS['account_country'], true);

        $confirmation['fields'] = array(array('title' => MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ACCOUNT_HOLDER,
            'field' => $HTTP_POST_VARS['account_holder']),
            array('title' => MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ACCOUNT_NUMBER,
                'field' => $HTTP_POST_VARS['account_number']),
            array('title' => MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ACCOUNT_COUNTRY,
                'field' => $countries['countries_name']));

        if (isset($HTTP_POST_VARS['bank_code']) && !empty($HTTP_POST_VARS['bank_code']))
        {
            $confirmation['fields'][] = array('title' => MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_BANK_CODE_NUMBER,
                'field' => $HTTP_POST_VARS['bank_code']);
        }

        return $confirmation;
    }

    function process_button()
    {
        global $HTTP_POST_VARS;

        $countries = tep_get_countries($HTTP_POST_VARS['account_country'], true);

        $process_button_string = tep_draw_hidden_field('account_country', $countries['countries_iso_code_2']) .
            tep_draw_hidden_field('account_number', $HTTP_POST_VARS['account_number']) .
            tep_draw_hidden_field('account_holder', $HTTP_POST_VARS['account_holder']);

        if (isset($HTTP_POST_VARS['bank_code']) && !empty($HTTP_POST_VARS['bank_code']))
        {
            $process_button_string .= tep_draw_hidden_field('bank_code', $HTTP_POST_VARS['bank_code']);
        }

        return $process_button_string;

    }

    function before_process()
    {
        global $HTTP_POST_VARS, $order, $currency;

        if (
                isset($HTTP_POST_VARS['account_country'])
            and
                !empty($HTTP_POST_VARS['account_country'])
            and
                isset($HTTP_POST_VARS['account_number'])
            and
                !empty($HTTP_POST_VARS['account_number'])
            and
                isset($HTTP_POST_VARS['account_holder'])
            and
                !empty($HTTP_POST_VARS['account_holder'])
        )
        {

            $pl_init = false;

            if ($this->enabled)
            {
                $pl_init = $this->paylane->init(
                    MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_APILOGIN,
                    MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_APIPASSWORD,
                    ((MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_DEBUG == 'yes') ? true : false)
                );
            }

            if ( !$pl_init)
            {
                tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ERROR_GATEWAY_CONNECTION, 'SSL'));
            }

            $params = array("payment_method" => array(
                "account_data" => array(
                    "account_country"   =>  $HTTP_POST_VARS['account_country'],
                    "account_number"    =>  $HTTP_POST_VARS['account_number'],
                    "account_holder"    =>  $HTTP_POST_VARS['account_holder'],
                )
            ),
                "customer" => array(
                    "name" => $order->customer['name'],
                    "email" => $order->customer['email_address'],
                    "ip" => tep_get_ip_address(),
                    "address" => array(
                        "street_house"	=>	$order->billing['street_address'],
                        "city"			=>	$order->billing['city'],
                        "state"			=>	$order->billing['state'],
                        "zip"			=>	$order->billing['postcode'],
                        "country_code"	=>	$order->billing['country']['iso_code_2'],

                    )
                ),
                "amount" => $order->info['total'],
                "currency_code" => $currency,
                "product" => array(
                    "description" => "osCommerce sale"
                )
            );

            if (0 < $HTTP_POST_VARS['bank_code'])
            {
                $params['payment_method']['account_data']['bank_code'] = (int)$HTTP_POST_VARS['bank_code'];
            }

            $result = $this->paylane->multiSale($params);

            if (isset($result->OK) and $result->OK->id_sale > 0)
            {
                $this->paylane_transaction_id = $result->OK->id_sale;
            }
            else
            {
                tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ERROR_WITH_PAYMENT . " " . ((!empty($result->ERROR->error_description)) ? $result->ERROR->error_description : ""), 'SSL'));
            }
        }
        else
        {
            tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ERROR_ALL_FIELDS_REQUIRED, 'SSL'));
        }
    }

    function after_process()
    {
        global $customer_id;

        $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by date_purchased desc limit 1");
        $orders = tep_db_fetch_array($orders_query);
        $order_id = $orders['orders_id'];

        if ($order_id > 0)
        {
            tep_db_query("update " . TABLE_ORDERS_STATUS_HISTORY . " set comments = 'Paylane id sale = " . $this->paylane_transaction_id . "' where orders_id = '" . (int)$order_id . "' order by date_added desc limit 1");
        }

        return true;
    }

    function get_error()
    {
        return false;
    }

    function check()
    {
        if ( !isset($this->_check))
        {
            $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_STATUS'");
            $this->_check = tep_db_num_rows($check_query);
        }
        return $this->_check;
    }

    function install()
    {
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable PayLane Direct', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_STATUS', 'False', 'Do you want to process payments via PayLane Direct System?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Debug mode', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_DEBUG', 'no', 'Do you want to use debug mode (additional verboses from system on errors)?', '6', '1', 'tep_cfg_select_option(array(\'no\', \'yes\'), ', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayLane Direct Login', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_APILOGIN', 'login', 'Your PayLane Direct Login, which can found at PayLane merchant panel => Account => Merchant account settings => Direct => Edit', '6', '2', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayLane Direct Password', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_APIPASSWORD', '', 'Password to your PayLane Direct System account', '6', '2', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sorting order', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_SORT_ORDER', '0', 'Default sorting order. Most recent are first in default.', '6', '0', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment region', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ZONE', '0', 'If any is choosen, then this form of payments will be only available in that zone', '6', '2', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Default order status', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ORDER_STATUS_ID', '0', 'All orders processed by this form payment will be checked as setted up option', '6', '0', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");
    }

    function remove()
    {
        tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys()
    {
        return array('MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_STATUS', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_DEBUG', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_APILOGIN', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_APIPASSWORD', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ZONE', 'MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_ORDER_STATUS_ID','MODULE_PAYMENT_PAYLANE_DIRECTDEBIT_SORT_ORDER');
    }
}
