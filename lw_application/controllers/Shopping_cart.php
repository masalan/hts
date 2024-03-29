<?php 
/**
 * Store Shopping Cart Controller file
 *
 * PHP version 5.2.4 or newer
 *
 * @category   ControllerFile
 * @package    JQueryPHPStoreShop
 * @author     Vinod <livelyworks@gmail.com>
 * @copyright  2013 LivelyWorks. (http://livelyworks.net)
 * @license    LivelyWorks (http://livelyworks.net)
 * @link       http://livelyworks.net
 * @since      Version 1.0
 * @deprecated NA
 */


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require('libs/PaypalIPN.php');

/**
 * Store Shopping Cart Controller
 *
 * @category   ControllerFile 
 * @package    JQueryPHPStoreShop
 * @author     Vinod <livelyworks@gmail.com>
 * @copyright  2013 LivelyWorks. (http://livelyworks.net)
 * @license    LivelyWorks (http://livelyworks.net)
 * @link       http://livelyworks.net
 * @since      Version 1.0
 * @deprecated NA
 */

class Shopping_Cart extends Base_Controller
{
    /**
         * Constructor
         *
         * @return void
    */
    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('tank_auth');
		
		 $this->cart->product_name_safe	= false;
    }

    /**
         * Show shopping cart
         *
         * @return void
    */
    function index()
    {
        $this->load->library('form_validation');

        $data = getSettingsItem();

        $data['insertScripts'] = array(
                'js_ajax_cart_form'
            );

        $data['cartBtnMarkup'] = $this->updateCartBtnString();
        $data['totalCartItems'] = $this->cart->total_items();

        $data['page'] = 'store/cart_view';
        loadView($data, 'JSON');
    }

    /**
         * Add product to shopping cart
         *
         * @return void
    */

    function addToCart()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters(
            '<div class="errorMsg">', 
            '</div>'
        );
        
        $this->form_validation->set_rules('size', __('Size'), 'trim');
        $this->form_validation->set_rules('color', __('Color'), 'trim');
        $this->form_validation->set_rules(
            'product_id', __('Product ID'), 
            'required|trim|numeric'
        );
        $this->form_validation->set_rules(
            'product_qty', __('Product Qty'), 
            'required|trim|numeric|is_natural'
        );
        
        if ($this->form_validation->run() != false) {

            $this->load->model('products_model');

            $oldContents = $this->cart->contents();

            $product_size = $this->input->post('size');
            $product_color = $this->input->post('color');
            $product_id = $this->input->post('product_id');
            $product_qty = $this->input->post('product_qty');

            $product = $this->products_model->fetch($product_id);

            if (!$product) {
                return false;
            }
            
            $product    = $product[0];
            $amount     = $product->price;
            $item_name  = $product->name;
            $prod_id    = $product->product_id;

            //$this->lw_lang->setDefaultLang();

            $insertData = array(
               'id'      => $product_id,
               'qty'     => $product_qty,
               'item_id' => $prod_id,
               'price'   => $amount,
               'name'    => $item_name,
               'options' => array(
                                'size' => $product_size,
                                'color' => $product_color
                            )
            );

           // $this->lw_lang->restoreLastLang();
            $cartData = $this->cart->insert($insertData);

            if(!empty($oldContents[$cartData]))
            {
                $this->cart->remove($cartData);
                $cartData = $this->cart->insert($insertData);
            }

            $returnData = array();
            $returnData['row_id'] = $cartData;
            $returnData['insert_type']  = 'new';

            if (isset($oldContents[$cartData])) {
                $returnData['insert_type']  = 'updated';
            }

            $newContents = $this->cart->contents();
            $returnData['itemData']  = $newContents[$cartData];

            $returnData['cartBtnString']  = $this->updateCartBtnString();

            if ($this->input->is_ajax_request()) {
                echo json_encode($returnData);
            } else {
                redirect('product/details/'.$product_id.'/'.url_title($item_name,"-",true));
            }
          
        } else {
            $errors = array(
                        'validationErrors' => validation_errors()
                    );

            echo json_encode($errors);
        }
    }


    /**
         * Update shopping cart button text
         *
         * @return void
    */
    function updateCartBtnString()
    {

        $store_settings = storeConfigItem('store_settings');
        $settings = ($store_settings['settings']);

        $glo_total = $this->cart->total();
        $glo_total_items = $this->cart->total_items();

        $topButtomArray = array(
          '%total_items%' => $glo_total_items, 
          '%item_select%' => ($glo_total_items == 1) ? __('item') : __('items'), 
          '%glo_total%' => priceFormat($glo_total, true), 
          );
        $cartBtnMarkup = __('<strong>%total_items%</strong> %item_select% of <strong>%glo_total%</strong> in your').
        ' <i class="icon-shopping-cart"></i>';
        $cartBtnMarkup =  strtr($cartBtnMarkup, $topButtomArray);

        return $cartBtnMarkup; 
    }

    /**
         * Update shopping cart
         *
         * @return void
    */
    function update()
    {

        $cartPostData = $this->input->post();
        $updateData = array();

        foreach ($cartPostData as $key) {
            $updateData[] = array(
                    "rowid" => $key['rowid'],
                    "qty" => $key['qty']
                );
        }

        $this->cart->update($updateData);
        $this->index();
    }

    /**
         * Remove an Item from shopping cart
        *
         * @param number $item_id item_id
         *
         * @return void
    */
    function remove($item_id = null)
    {

        if ($item_id == null) {
            return false;
        }

        $updateData = array(
               'rowid' => $item_id,
               'qty'   => 0
            );

        $this->cart->update($updateData);
        $this->index();
    }

    /**
         * Checkout by submit order via email action
         *
         * @return void
    */
    function checkoutSubmitOrder()
    {
        
        $this->load->library('form_validation');
        $val = $this->form_validation;
        $val->set_error_delimiters(
            '<span class="help-inline error_msg">', 
            '</span>'
        );

        $val->set_rules('fname', __('Name'), 'trim|required');
        $val->set_rules(
            'sof_email', __('Email'), 
            'trim|required|valid_email'
        );

        $data = getSettingsItem();

        $data['totalCartItems'] = $this->cart->total_items();

        if ($data['totalCartItems'] <= 0) {
            redirect('shopping_cart');
        }

        if ($val->run()) {

            if(IS_STORE_DEMO){

                $data['email_result'] = 1;
                
                if($data['email_result']){
                    $this->cart->destroy();
                    $data['cartBtnMarkup'] = $this->updateCartBtnString();
                    $data['totalCartItems'] = $this->cart->total_items();
                }

                if($this->input->is_ajax_request())
                {
                    echo json_encode($data);
                    return;
                }elseif($data['email_result']){
                    redirect('shopping_cart/thankYou');
                    return;
                }
                
                return;
            }

            $businessEmail          = $data['business_email'];
            $site_name              = $data['store_name'];
            $fromEmail              = $this->input->post('sof_email', true);
            $fname                  = $this->input->post('fname', true);
            $data['formData']       = $this->input->post();

            $data['payment_status'] = __('pending');

            if (config_item('send_order_in_default_language') == true) {
                $this->lw_lang->setDefaultLang();
                $data['payment_status'] = __('pending');
            }
            

            $emailMessage = $this->load->view(
                config_item('apply_theme').
                '/email/order_submit_email', $data, true
            );

            $this->load->library('email');
            $this->email->from($fromEmail, $fname);
            $this->email->reply_to($fromEmail, $fname);
            $this->email->to($businessEmail);
            $this->email->subject(__('New Order Placed'));
            $this->email->message($emailMessage);
            
            $data['email_result'] = $this->email->send();

            $this->email->clear();

            if ($data['email_result']) {
                if (config_item('send_order_in_default_language') == true) {
                    $this->lw_lang->restoreLastLang();

                    $data['payment_status'] = __('pending');
                    $emailMessage           = $this->load->view(
                        config_item('apply_theme').'/email/order_submit_email', 
                        $data, true
                    );
                }

                $this->email->from($businessEmail, $site_name);
                $this->email->reply_to($businessEmail, $site_name);
                $this->email->to($fromEmail);
                $this->email->subject(__('Your order has been Placed.'));
                $this->email->message($emailMessage);
                $data['email_result_customer'] = $this->email->send();

            }

            if ($data['email_result']) {
                $this->cart->destroy();
                $data['cartBtnMarkup']  = $this->updateCartBtnString();
                $data['totalCartItems'] = $this->cart->total_items();
            }

            if ($this->input->is_ajax_request()) {
                echo json_encode($data);
                return;
            } elseif ($data['email_result']) {
                redirect('shopping_cart/thankYou');
                return;
            }
        }

        $data['page'] = 'store/submit_order_form';
        loadView($data, 'JSON');
    }

    /**
         * checkout using PayPal action. 
         * It will take user to the PayPal secured site.
         *
         * @return void
    */
    function checkoutWithPaypal()
    {

        $data['totalCartItems'] = $this->cart->total_items();
        if ($data['totalCartItems'] <= 0) {
            redirect('shopping_cart');
        }

        $storeSettings      = getSettingsItem();

        $current_locale     = $this->session->userdata('current_store_lang');

        $cancelReturn       = site_url('shopping_cart?lang='.$current_locale);

        $notify_url         = site_url(
            'shopping_cart/updateOrderIpn?lang='.$current_locale
        );
        $business           = $storeSettings['business_email'];
        $currency           = $storeSettings['currency'];
        $ShippingCharges    = calculateShipping();

        $paypalUrl          = "";

        if (config_item('paypal_testing')) {
            $paypalUrl      .= "Location: https://www.sandbox.paypal.com/";
        } else {
            $paypalUrl      .= "Location: https://www.paypal.com/";
        }

        $paypalUrl          .= "cgi-bin/webscr?cmd=_cart&upload=1&charset=utf-8&currency_code=$currency&business=$business&cancel_return=$cancelReturn&notify_url=$notify_url&rm=2&handling_cart=$ShippingCharges";

        $orderItems = $this->cart->contents();

        $totalAmount = $this->cart->total() + $ShippingCharges;

        $order_data = json_encode(array('totalAmount' => $totalAmount));

        $i = 1;
        foreach ($orderItems as $items):
            $paypalUrl .= '&item_name_'.$i.'='.$items['name'].' - ';
            foreach (
                $this->cart->product_options($items['rowid']) 
                as $option_name => $option_value
                ):
                    if(!empty($option_value)) {
                        $paypalUrl .= $option_name.' : '.$option_value.' ';
                    }
                    
            endforeach;
            $paypalUrl .= '&item_number_'.$i.'='.$items['item_id'];
            $paypalUrl .= '&quantity_'.$i.'='.$items['qty'];
            $paypalUrl .= '&amount_'.$i.'='.$this->cart->format_number(
                $items['price']
            );
            $i++;
        endforeach;

        $returnTo   = site_url("shopping_cart/thankYou?lang=".$current_locale);

        $paypalUrl .= "&return=$returnTo&custom=$order_data";

        header($paypalUrl);
    }

    /**
         * Thank you action after order submission
         *
         * @return void
    */
    function thankYou()
    {

        $store_settings     = getSettingsItem();

        $this->cart->destroy();

        $data['show_msg']   = $store_settings['msg_on_order_submit'];

        $data['page']       = 'other_message_view';
        loadView($data);
    }

    /**
         * Sending an Order Placement email to user 
         * & admin after payment made via PayPal
         *
         * @return void
    */
    function updateOrderIpn()
    {
        if(IS_STORE_DEMO){
            return true;
        }

        $ipn = new PaypalIPN();

        if (config_item('paypal_testing')) {
            // Use the sandbox endpoint during testing.
            $ipn->useSandbox();
        }

        $verified = $ipn->verifyIPN();

        if ($verified) {
            //VERIFIED IPN

            $this->ipn_data = $this->input->post();

            $store_settings         = getSettingsItem();

            $businessEmail          = $store_settings['business_email'];
            $site_name              = $store_settings['store_name'];

            $emailMessage           = "NA";

            $testvalidate_ipn       = "New ";

            $data                   = array_merge($store_settings, $this->ipn_data);

            $fromEmail              = $data['payer_email'];
            $fname                  = $data['address_name'];

            $order_data             = json_decode($data['custom']);

            if (config_item('send_order_in_default_language') == true) {
                $this->lw_lang->setDefaultLang();
            }

            $data['payment_msg']    = __('Payment');
            $data['payment_method'] = __('PayPal');
            $data['payment_msg']    .= ' '.$data['payment_status'];

            if ($data['payment_status'] == 'Completed') {

                if ($data['receiver_email'] != $data['business_email'] 
                    AND $data['currency'] != $data['mc_currency']  
                    AND $order_data['totalAmount'] != $data['mc_gross']
                ) {
                    $data['payment_msg'] .= ' - '.__('Needs further review!!');
                } else {
                    $data['payment_msg'] .= ' - '.__('Confirmed');
                }

            }

            $emailMessage = $this->load->view(
                config_item('apply_theme').'/email/paypal_order_submit_email', 
                $data, true
            );

            $this->load->library('email');
            $this->email->from($fromEmail, $fname);
            $this->email->reply_to($fromEmail, $fname);
            $this->email->to($businessEmail);
            $this->email->subject(__('New Order Placed'));

            $this->email->message($emailMessage);
            
            $data['email_result'] = $this->email->send();

            $this->email->clear();

            if ($data['email_result']) {

                if (config_item('send_order_in_default_language') == true) {
                    $this->lw_lang->restoreLastLang();

                    $data['payment_msg'] = __('Payment');
                    $data['payment_method'] = __('PayPal');
                    $data['payment_msg'] .= ' '.$data['payment_status'];

                    if ($data['payment_status'] == 'Completed') {

                        if ($data['receiver_email'] != $data['business_email'] 
                            AND $data['currency'] != $data['mc_currency']  
                            AND $order_data['totalAmount'] != $data['mc_gross']
                        ) {
                            $data['payment_msg'] .= ' - '
                            .__('Needs further review!!');
                        } else {
                                $data['payment_msg'] .= ' - '.__('Confirmed');
                        }
                    }

                    $emailMessage = $this->load->view(
                        config_item('apply_theme')
                        .'/email/paypal_order_submit_email', 
                        $data, true
                    );
                }

                $this->email->from($businessEmail, $site_name);
                $this->email->reply_to($businessEmail, $site_name);
                $this->email->to($fromEmail);
                $this->email->subject(__('Your order has been Placed.'));
                $this->email->message($emailMessage);
                $data['email_result_customer'] = $this->email->send();

            }

            // Reply with an empty 200 response to indicate to paypal the IPN was received correctly
            header("HTTP/1.1 200 OK");

            return true;

        } else {
            //INVALID
            show_404();
            return false;   
        }
    }
}

/* End of file shopping_cart.php */
/* Location: ./lw_application/controllers/shopping_cart.php */