<?php

class paylane_card
{
    var $code, $title, $description, $enabled, $paylane, $paylane_transaction_id;

    function paylane_card()
    {
        global $order;

        include_once(DIR_FS_CATALOG . DIR_WS_CLASSES . 'PayLaneClient.php');
        $this->paylane = new PayLaneClient();

        $this->code = 'paylane_card';
        $this->title = MODULE_PAYMENT_PAYLANE_CARD_TEXT_TITLE;
        $this->public_title = MODULE_PAYMENT_PAYLANE_CARD_TEXT_PUBLIC_TITLE;
        $this->description = MODULE_PAYMENT_PAYLANE_CARD_TEXT_DESCRIPTION;
        $this->sort_order = MODULE_PAYMENT_PAYLANE_CARD_SORT_ORDER;

        $this->enabled = ((MODULE_PAYMENT_PAYLANE_CARD_STATUS == 'True') ? true : false);

        if ((int)MODULE_PAYMENT_PAYLANE_CARD_ORDER_STATUS_ID > 0)
        {
            $this->order_status = MODULE_PAYMENT_PAYLANE_CARD_ORDER_STATUS_ID;
        }

        if (is_object($order)) $this->update_status();
    }

    function update_status()
    {
        global $order;

        if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_PAYLANE_CARD_ZONE > 0) )
        {
            $check_flag = false;
            $check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_PAYLANE_CARD_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
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

        $today = getdate();

        $months_array = array();
        for ($i=1; $i<13; $i++)
        {
            $months_array[] = array('id' => sprintf('%02d', $i), 'text' => strftime('%B',mktime(0,0,0,$i,1,2000)));
        }

        $year_valid_from_array = array();
        for ($i=$today['year']-10; $i < $today['year']+1; $i++)
        {
            $year_valid_from_array[] = array('id' => strftime('%Y',mktime(0,0,0,1,1,$i)), 'text' => strftime('%Y',mktime(0,0,0,1,1,$i)));
        }

        $year_expires_array = array();
        for ($i=$today['year']; $i < $today['year']+10; $i++)
        {
            $year_expires_array[] = array('id' => strftime('%Y',mktime(0,0,0,1,1,$i)), 'text' => strftime('%Y',mktime(0,0,0,1,1,$i)));
        }

        $selection['fields'] = array(array('title' => MODULE_PAYMENT_PAYLANE_CARD_CARD_OWNER,
            'field' => tep_draw_input_field('cc_owner', $order->billing['firstname'] . ' ' . $order->billing['lastname'])),
            array('title' => MODULE_PAYMENT_PAYLANE_CARD_CARD_NUMBER,
                'field' => tep_draw_input_field('cc_number_nh-dns')),
            array('title' => MODULE_PAYMENT_PAYLANE_CARD_CARD_EXPIRES,
                'field' => tep_draw_pull_down_menu('cc_expires_month', $months_array) . '&nbsp;' . tep_draw_pull_down_menu('cc_expires_year', $year_expires_array)),
            array('title' => MODULE_PAYMENT_PAYLANE_CARD_CARD_CVC,
                'field' => tep_draw_input_field('cc_cvc_nh-dns', '', 'size="5" maxlength="4"')),
            array('title' => MODULE_PAYMENT_PAYLANE_CARD_CARD_ISSUE_NUMBER,
                'field' => tep_draw_input_field('cc_issue_nh-dns', '', 'size="3" maxlength="2"') . ' ' . MODULE_PAYMENT_PAYLANE_CARD_CARD_ISSUE_NUMBER_INFO)
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

        $confirmation['fields'] = array(array('title' => MODULE_PAYMENT_PAYLANE_CARD_CARD_OWNER,
            'field' => $HTTP_POST_VARS['cc_owner']),
            array('title' => MODULE_PAYMENT_PAYLANE_CARD_CARD_NUMBER,
                'field' => str_repeat('X', strlen($HTTP_POST_VARS['cc_number_nh-dns']) - 4) . substr($HTTP_POST_VARS['cc_number_nh-dns'], -4)),
            array('title' => MODULE_PAYMENT_PAYLANE_CARD_CARD_EXPIRES,
                'field' => $HTTP_POST_VARS['cc_expires_month'] . '/' . $HTTP_POST_VARS['cc_expires_year']));

        if (isset($HTTP_POST_VARS['cc_issue_nh-dns']) && !empty($HTTP_POST_VARS['cc_issue_nh-dns']))
        {
            $confirmation['fields'][] = array('title' => MODULE_PAYMENT_PAYLANE_CARD_CARD_ISSUE_NUMBER,
                'field' => $HTTP_POST_VARS['cc_issue_nh-dns']);
        }

        return $confirmation;
    }

    function process_button()
    {
        global $HTTP_POST_VARS;

        $process_button_string = tep_draw_hidden_field('cc_owner', $HTTP_POST_VARS['cc_owner']) .
            tep_draw_hidden_field('cc_number_nh-dns', $HTTP_POST_VARS['cc_number_nh-dns']) .
            tep_draw_hidden_field('cc_expires_month', $HTTP_POST_VARS['cc_expires_month']) .
            tep_draw_hidden_field('cc_expires_year', $HTTP_POST_VARS['cc_expires_year']) .
            tep_draw_hidden_field('cc_cvc_nh-dns', $HTTP_POST_VARS['cc_cvc_nh-dns']);

        if (isset($HTTP_POST_VARS['cc_issue_nh-dns']) && !empty($HTTP_POST_VARS['cc_issue_nh-dns']))
        {
            $process_button_string .= tep_draw_hidden_field('cc_issue_nh-dns', $HTTP_POST_VARS['cc_issue_nh-dns']);
        }

        return $process_button_string;

    }

    function before_process()
    {
        global $HTTP_POST_VARS, $order, $sendto, $currency;

        if (
                isset($HTTP_POST_VARS['cc_owner'])
            and
                !empty($HTTP_POST_VARS['cc_owner'])
            and
                isset($HTTP_POST_VARS['cc_number_nh-dns'])
            and
                !empty($HTTP_POST_VARS['cc_number_nh-dns'])
            and
                isset($HTTP_POST_VARS['cc_cvc_nh-dns'])
            and
                !empty($HTTP_POST_VARS['cc_cvc_nh-dns'])
        )
        {

            $pl_init = false;

            if ($this->enabled)
            {
                $pl_init = $this->paylane->init(
                    MODULE_PAYMENT_PAYLANE_CARD_APILOGIN,
                    MODULE_PAYMENT_PAYLANE_CARD_APIPASSWORD,
                    ((MODULE_PAYMENT_PAYLANE_CARD_DEBUG == 'yes') ? true : false)
                );
            }

            if ( !$pl_init)
            {
                tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . MODULE_PAYMENT_PAYLANE_CARD_ERROR_GATEWAY_CONNECTION, 'SSL'));
            }

            $params = array("payment_method" => array(
                "card_data" => array(
                    "card_number"		=>	$HTTP_POST_VARS['cc_number_nh-dns'],
                    "card_code"			=>	(int)$HTTP_POST_VARS['cc_cvc_nh-dns'],
                    "expiration_month"	=>	$HTTP_POST_VARS['cc_expires_month'],
                    "expiration_year"	=>	$HTTP_POST_VARS['cc_expires_year'],
                    "name_on_card"		=>	$HTTP_POST_VARS['cc_owner']
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

            if (0 < $HTTP_POST_VARS['cc_issue_nh-dns'])
            {
                $params['payment_method']['card_data']['issue_number'] = (int)$HTTP_POST_VARS['cc_issue_nh-dns'];
            }

            $result = $this->paylane->multiSale($params);

            if (isset($result->OK) and $result->OK->id_sale > 0)
            {
                $this->paylane_transaction_id = $result->OK->id_sale;
            }
            else
            {
                tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . MODULE_PAYMENT_PAYLANE_CARD_ERROR_WITH_PAYMENT . " " . ((!empty($result->ERROR->error_description)) ? $result->ERROR->error_description : ""), 'SSL'));
            }
        }
        else
        {
            tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . MODULE_PAYMENT_PAYLANE_CARD_ERROR_ALL_FIELDS_REQUIRED, 'SSL'));
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
            $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYLANE_CARD_STATUS'");
            $this->_check = tep_db_num_rows($check_query);
        }
        return $this->_check;
    }

    function install()
    {
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable PayLane Direct', 'MODULE_PAYMENT_PAYLANE_CARD_STATUS', 'False', 'Do you want to process payments via PayLane Direct System?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Debug mode', 'MODULE_PAYMENT_PAYLANE_CARD_DEBUG', 'no', 'Do you want to use debug mode (additional verboses from system on errors)?', '6', '1', 'tep_cfg_select_option(array(\'no\', \'yes\'), ', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayLane Direct Login', 'MODULE_PAYMENT_PAYLANE_CARD_APILOGIN', 'login', 'Your PayLane Direct Login, which can found at PayLane merchant panel => Account => Merchant account settings => Direct => Edit', '6', '2', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayLane Direct Password', 'MODULE_PAYMENT_PAYLANE_CARD_APIPASSWORD', '', 'Password to your PayLane Direct System account', '6', '2', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sorting order', 'MODULE_PAYMENT_PAYLANE_CARD_SORT_ORDER', '0', 'Default sorting order. Most recent are first in default.', '6', '0', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment region', 'MODULE_PAYMENT_PAYLANE_CARD_ZONE', '0', 'If any is choosen, then this form of payments will be only available in that zone', '6', '2', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())");
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Default order status', 'MODULE_PAYMENT_PAYLANE_CARD_ORDER_STATUS_ID', '0', 'All orders processed by this form payment will be checked as setted up option', '6', '0', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");
    }

    function remove()
    {
        tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys()
    {
        return array('MODULE_PAYMENT_PAYLANE_CARD_STATUS', 'MODULE_PAYMENT_PAYLANE_CARD_DEBUG', 'MODULE_PAYMENT_PAYLANE_CARD_APILOGIN', 'MODULE_PAYMENT_PAYLANE_CARD_APIPASSWORD', 'MODULE_PAYMENT_PAYLANE_CARD_ZONE', 'MODULE_PAYMENT_PAYLANE_CARD_ORDER_STATUS_ID','MODULE_PAYMENT_PAYLANE_CARD_SORT_ORDER');
    }
}
