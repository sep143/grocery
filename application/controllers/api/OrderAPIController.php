<?php

defined('BASEPATH')OR exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class OrderAPIController extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->lang->load('api/api_message', 'english');
        //load model
        $this->load->model('api/Auth_model', 'Login');
        $this->load->model('api/Orders_model', 'Orders');
    }

    /*
     * order get for customer view but after verification then view
     */

    public function orderView_post() {
        $id = $this->post('id'); //customer id
        $token = $this->post('token');
        $limit = $this->post('limit');
        $offset = $this->post('offset');
        if ($limit == '') {
            $limit = 10;
        }
        if ($offset == '') {
            $offset = 0;
        }
        if ($id != '' && $token != '') {
            $check = $this->Login->get_customer_data_viaid($id);
            if ($check->Token == $token) {
                $order_list = $this->Orders->get_all_orders($id, $limit, $offset);
                if ($order_list) {
                    $response = array();
                    foreach ($order_list as $value) {
                        //order address >> order time mention
                        $order_address = $this->Orders->getOrderAddress($value->C_Address_ID);
                        if($order_address){
                            $c_address = array(
                                'address_1' => $order_address->Address_1,
                                'address_2' => $order_address->Address_2,
                                'city' => $order_address->City,
                                'state' => $order_address->State,
                                'country' => $order_address->Country,
                                'pin_code' => $order_address->PinCode,
                                'contact' => $order_address->ContactNo,
                            );
                        }else{
                            $c_address = array();
                        }
                        
                        $data = array(
                            'order_id' => $value->ID,
                            'instruction' => $value->Instruction,
                            'order_status' => $value->OrderStatus,
                            'order_status_date' => $value->OrderDT,
                            'order_delivery_date' => $value->DeliveryDate,
                            'order_delivery_time_range' => $value->TimeRang,
                            'order_date' => $value->CreatedDT,
                            'order_modified_date' => $value->LastModifiedDT,
                            'txt_id' => $value->txt_id,
                            'actual_amt' => $value->real_amt,
                            'tax_amt' => $value->tax_amt,
                            'total_amt' => $value->total_amount,
                            'payment_date' => $value->payment_date,
                            'address'=>$c_address,
                            'address_order'=>json_decode($value->Address, true),
                            'products' => json_decode($value->ProductsInfo, true),
                            'invoice'=>base_url().'order/invoice/sdhfjkhsdf_sjdfhjsdf'
                        );
                        $response[] = $data;
                    }

                    $this->response([
                        'status' => true,
                        'message' => $this->lang->line('order_success_found'),
                        'response' => $response
                            ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => $this->lang->line('order_noFound'),
                            ], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response([
                    'status' => false,
                    'message' => $this->lang->line('token_invalid')
                        ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => $this->lang->line('token_id_require')
                    ], REST_Controller::HTTP_OK);
        }
    }

    /*
     * order add
     */

    public function orderAdd_post() {
        $id = $this->post('id'); //customer id
        $token = $this->post('token');
        $c_address_id = $this->post('c_address_id');
        $store_id = $this->post('vender_id');
        $instruction = $this->post('instruction');
        $time_rang = $this->post('time_rang');
        $order_date = $this->post('order_date');
        $products_ids = $this->post('products_ids');//array
        
        $txt_id = $this->post('txt_id');
        $amt = $this->post('amt');
        $tax = $this->post('tax');
        $total_amt = $this->post('total_amt');
        $email = $this->post('email');
        $phone = $this->post('phone');
        $currency = $this->post('currency');
        
        $this->form_validation->set_rules('id','Customer ID','required|trim|numeric');
        $this->form_validation->set_rules('c_address_id','Customer Address ID','required|trim|numeric');
        $this->form_validation->set_rules('vender_id','Vender ID','required|trim|numeric');
        if($this->form_validation->run()==false){
            $string_html = validation_errors();
            $description_without = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string_html));
            $description_without = htmlentities($description_without, ENT_QUOTES, "UTF-8");
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('order_reuired_value'),
                'error'=>$description_without
            ], REST_Controller::HTTP_OK);
        }else{
           if ($id != '' && $token != '') {
                $check = $this->Login->get_customer_data_viaid($id);
                if ($check->Token == $token) {
                    $product_json = array();
                    $ccCheck = 0;
                    foreach ($products_ids as $ids=>$key){
                        $pruduct_check = $this->Orders->productGetById($key['id']);
                        if($pruduct_check->Quantity >= $key['quantity']){
                            $flag = 1;
                            $brand_name = $this->Orders->brandGetById($pruduct_check->BrandID);
                            $unit_name = $this->Orders->unitGetById($pruduct_check->UnitID);
                            $category_name = $this->Orders->categoryGetById($pruduct_check->CategoryID);
                            $json['products'] = array(
                                'id'=>$pruduct_check->ID,
                                'category_name'=>$category_name->Name,
                                'unit_name'=>$unit_name->Name,
                                'brand_name'=>$brand_name->Name,
                                'name'=>$pruduct_check->Name,
                                'price'=>$pruduct_check->Price,
                                'quantity'=>$key['quantity'],
                                'description'=>$pruduct_check->Description,
                                'offer_price'=>$pruduct_check->OfferPrice,
                                'stoke_status'=>'stoke ok',
                            );
                            $product_json[]=$json['products'];
                            
                        }else{
                            $ccCheck ++;
                            $flag = 0;
                            $product_json_2[]=array(
                                'id'=>$pruduct_check->ID,
                                'name'=>$pruduct_check->Name,
                                'price'=>$pruduct_check->Price,
                                'quantity'=>$key['quantity'],
                                'description'=>$pruduct_check->Description,
                                'offer_price'=>$pruduct_check->OfferPrice,
                                'stoke_status'=>'out of stoke',
                            );
                        }
                    }
                        if($ccCheck <= 0){
                            //product table in quantity update if sale subtrac
                            $qnty = (($pruduct_check->Quantity)-($key['quantity']));
                            $updateProduct = array(
                                'Quantity'=>$qnty
                            );
                            $product_ok = $this->Orders->productQuantityUpdate($key['id'], $updateProduct);
                            //address set json
                            $order_address = $this->Orders->getOrderAddress($c_address_id);
                            $addressData = array(
                               'address_1' => $order_address->Address_1,
                                'address_2' => $order_address->Address_2,
                                'city' => $order_address->City,
                                'state' => $order_address->State,
                                'country' => $order_address->Country,
                                'pin_code' => $order_address->PinCode,
                                'contact' => $order_address->ContactNo, 
                            );
                            $addressData = json_encode($addressData);
                            $product_json = json_encode($product_json);
                            $data = array(
                                'StoreID'=>$store_id,
                                'C_ID'=>$id,
                                'C_Address_ID'=>$c_address_id,
                                'Address'=>$addressData,
                                'Instruction'=>$instruction,
                                'ProductsInfo'=>$product_json,
                                'OrderDT'=>date('Y-m-d H:i:s'),
                                'TimeRang'=>$time_rang,
                                'DeliveryDate'=>$order_date
                            );
                            $order_add_ok = $this->Orders->orderAdd($data);
                            if($order_add_ok){
                                $PaymentData = array(
                                    'OrderID'=>$order_add_ok,
                                    'C_ID'=>$id,
                                    'StoreID'=>$store_id,
                                    'TxtID'=>$txt_id,
                                    'Amt'=>$amt,
                                    'Tax'=>$tax,
                                    'TotalAmt'=>$total_amt,
                                    'Email'=>$email,
                                    'Phone'=>$phone,
                                    'Currency'=>$currency,
                                    'Status'=>1,
                                    //'Encrypt'=>$ecy
                                );
                                $payment_done = $this->Orders->paymentAdd($PaymentData);
                                if($payment_done){
                                    $updateOrder = array(
                                        'PayID'=>$payment_done
                                    );
                                    $ok = $this->Orders->orderUpdate($order_add_ok,$updateOrder);
                                        if($ok){
                                            $this->response([
                                               'status'=>true,
                                                'message'=>  $this->lang->line('order_payment_successfully'),
                                                'order_id'=>$ok
                                            ], REST_Controller::HTTP_OK);
                                        }else{
                                            $this->response([
                                                'status'=>false,
                                                'message'=>  $this->lang->line('server_error')
                                            ],  REST_Controller::HTTP_OK);
                                        }
                                }else{
                                    $this->response([
                                        'status'=>false,
                                        'message'=>  $this->lang->line('server_error')
                                    ],  REST_Controller::HTTP_OK);
                                }
//                                $this->response([
//                                    'status'=>true,
//                                    'message'=>  $this->lang->line('order_add_successfully'),
//                                    'order_id'=>$order_add_ok,
//                                    'next_api'=>'order_payment_check'
//                                ],  REST_Controller::HTTP_OK);
                            }else{
                                $this->response([
                                    'status'=>false,
                                    'message'=>  $this->lang->line('server_error')
                                ],  REST_Controller::HTTP_OK);
                            }
                        }else{
                            $data = $product_json_2;
                            $this->response([
                                'status'=>false,
                                'message'=>  $this->lang->line('order_add_out_of_stock'),
                                'order_id'=>$data,
                                //'next_api'=>'order_payment_check'
                            ],  REST_Controller::HTTP_OK);
                        }
                        
//                        $this->response([
//                            'status'=>$status,
//                            'message'=>$message,
//                            'res'=>  $data,
//                        ], REST_Controller::HTTP_OK);
                         
                        
                } else {
                    $this->response([
                        'status' => false,
                        'message' => $this->lang->line('token_invalid')
                            ], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response([
                    'status' => false,
                    'message' => $this->lang->line('token_id_require')
                        ], REST_Controller::HTTP_OK);
            } 
        }
        
    }
    
    /*
     * order check before payment then 
     */
    public function orderCheck_post(){
       $id = $this->post('id'); //customer id
        $token = $this->post('token');
        $c_address_id = $this->post('c_address_id');
        $store_id = $this->post('vender_id');
        $instruction = $this->post('instruction');
        $products_ids = $this->post('products_ids');//array
        
        $this->form_validation->set_rules('id','Customer ID','required|trim|numeric');
        $this->form_validation->set_rules('c_address_id','Customer Address ID','required|trim|numeric');
        $this->form_validation->set_rules('vender_id','Vender ID','required|trim|numeric');
        if($this->form_validation->run()==false){
            $string_html = validation_errors();
            $description_without = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string_html));
            $description_without = htmlentities($description_without, ENT_QUOTES, "UTF-8");
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('order_reuired_value'),
                'error'=>$description_without
            ], REST_Controller::HTTP_OK);
        }else{
           if ($id != '' && $token != '') {
                $check = $this->Login->get_customer_data_viaid($id);
                if ($check->Token == $token) {
                    $product_json = array();
                    $ccCheck = 0;
                    foreach ($products_ids as $ids=>$key){
                        $pruduct_check = $this->Orders->productGetById($key['id']);
                        if($pruduct_check){
                            if($pruduct_check->Quantity >= $key['quantity']){
                                
                                $flag = 1;
                                $brand_name = $this->Orders->brandGetById($pruduct_check->BrandID);
                                $unit_name = $this->Orders->unitGetById($pruduct_check->UnitID);
                                $category_name = $this->Orders->categoryGetById($pruduct_check->CategoryID);
                                $json['products'] = array(
//                                    'id'=>$pruduct_check->ID,
//                                    'category_name'=>$category_name->Name,
//                                    'unit_name'=>$unit_name->Name,
//                                    'brand_name'=>$brand_name->Name,
//                                    'name'=>$pruduct_check->Name,
//                                    'price'=>$pruduct_check->Price,
//                                    'quantity'=>$key['quantity'],
//                                    'description'=>$pruduct_check->Description,
//                                    'offer_price'=>$pruduct_check->OfferPrice,
                                    'time_rang'=>$RangeData,
                                    'stoke_status'=>'available stoke',
                                );
                                $product_json[]=$json['products'];
                                
                            }else{
                                $ccCheck ++;
                                $flag = 0;
                                $product_json_2[]=array(
                                    'id'=>$pruduct_check->ID,
                                    'name'=>$pruduct_check->Name,
                                    'price'=>$pruduct_check->Price,
                                    'quantity'=>$key['quantity'],
                                    'description'=>$pruduct_check->Description,
                                    'offer_price'=>$pruduct_check->OfferPrice,
                                    'stoke_status'=>'out of stoke',
                                );
                            }
                        }else{
                            $this->response([
                                'status'=>false,
                                'message'=>'No data found '
                            ], REST_Controller::HTTP_OK);
                        }
                        
                    }
                    if($ccCheck <= 0){
                        $timeRang = $this->Orders->getTimeRange();
                        if($timeRang){
                            $RangeData = array();
                            foreach ($timeRang as $tm_value){
                                $tmData = array(
                                    'id'=>$tm_value->ID,
                                    'name'=>$tm_value->Name,
                                    'time_range'=>$tm_value->TimeRang,
                                );
                                $RangeData[]=$tmData;
                            }
                        }else{
                            $RangeData = array();
                        }
                        $this->response([
                            'status'=>true,
                            'message'=> $this->lang->line('stock_available_success'),
                            'next_api'=> 'Order_add',
                            'res'=>  $RangeData,
                        ], REST_Controller::HTTP_OK);
                    }else{
                        $this->response([
                            'status'=>false,
                            'message'=>$this->lang->line('stock_Notavailable_unsuccess'),
                            'res'=>  $product_json_2,
                        ], REST_Controller::HTTP_OK);
                    }
                        
                } else {
                    $this->response([
                        'status' => false,
                        'message' => $this->lang->line('token_invalid')
                            ], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response([
                    'status' => false,
                    'message' => $this->lang->line('token_id_require')
                        ], REST_Controller::HTTP_OK);
            } 
        } 
    }


    /*
     * order edit not use
     */

    public function orderEditNot_post() {
        $id = $this->post('id'); //customer id
        $token = $this->post('token');
//        $product_id = $this->post('product_id');
        $c_address_id = $this->post('c_address_id');
        $store_id = $this->post('vender_id');
        $instruction = $this->post('instruction');
        $quantity = $this->post('quantity');
        $order_id = $this->post('order_id');
        
        $this->form_validation->set_rules('id','Customer ID','required|trim|numeric');
//        $this->form_validation->set_rules('product_id','Product ID','required|trim|numeric');
        $this->form_validation->set_rules('c_address_id','Customer Address ID','required|trim|numeric');
        $this->form_validation->set_rules('vender_id','Vender ID','required|trim|numeric');
        $this->form_validation->set_rules('order_id','Order ID','required|trim|numeric');
        $this->form_validation->set_rules('quantity','Quantity','required');
        if($this->form_validation->run()==false){
            $string_html = validation_errors();
            $description_without = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string_html));
            $description_without = htmlentities($description_without, ENT_QUOTES, "UTF-8");
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('order_reuired_value'),
                'error'=>$description_without
            ], REST_Controller::HTTP_OK);
        }else{
            if ($id != '' && $token != '') {
                $check = $this->Login->get_customer_data_viaid($id);
                if ($check->Token == $token) {
                    $pruduct_check = $this->Orders->productGetById($product_id);
                    $order_check = $this->Orders->getOrderForEdit($order_id);
                    if($order_check->PayID == null){
                        if($pruduct_check->Quantity >= $quantity){
                            $data = array(
                                'StoreID'=>$store_id,
//                                'ProductID'=>$product_id,
                                'C_ID'=>$id,
                                'C_Address_ID'=>$c_address_id,
                                'Instruction'=>$instruction,
                                'Quantity'=>$quantity,
                                'OrderDT'=>date('Y-m-d H:i:s')
                            );
                            $order_add_ok = $this->Orders->orderUpdate($order_id,$data);
                            if($order_add_ok){
                                $this->response([
                                    'status'=>true,
                                    'message'=>  $this->lang->line('order_edit_successfully'),
                                    'order_id'=>$order_add_ok,
                                    'next_api'=>'order_payment_check'
                                ],  REST_Controller::HTTP_OK);
                            }else{
                                $this->response([
                                    'status'=>false,
                                    'message'=>  $this->lang->line('server_error')
                                ],  REST_Controller::HTTP_OK);
                            }
                        }else{
                            $this->response([
                                'status'=>false,
                                'message'=>  $this->lang->line('order_quantity_large'),
                            ],  REST_Controller::HTTP_OK);
                        }
                    }else{
                        $this->response([
                            'status'=>false,
                            'message'=>  $this->lang->line('order_edit_not_possible')
                        ], REST_Controller::HTTP_OK);
                    }

                } else {
                    $this->response([
                        'status' => false,
                        'message' => $this->lang->line('token_invalid')
                            ], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response([
                    'status' => false,
                    'message' => $this->lang->line('token_id_require')
                        ], REST_Controller::HTTP_OK);
            }
        }
        
    }
    
    /*
     * order details sent and payment success then call this api
     */
    public function paymentOrderCheck_post(){
        $id = $this->post('id');
        $token = $this->post('token');
        $order_id = $this->post('order_id');
        
        if($id != '' && $token != ''){
            $check = $this->Login->get_customer_data_viaid($id);
            if($check->Token == $token){
                //$pruduct_check = $this->Orders->productGetById($product_id);
                $order_check = $this->Orders->getOrderForEdit($order_id);
                if($order_check->PayID == null){
                    $this->response([
                        'status'=>TRUE,
                        'message'=>  $this->lang->line('order_payment_process'),
                        'next_api'=>'order_payment_success or order_payment_cancel'
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status'=>false,
                        'message'=>  $this->lang->line('order_payment_already')
                    ], REST_Controller::HTTP_OK);
                }
            }else{
                $this->response([
                    'status'=>false,
                    'message'=>  $this->lang->line('token_invalid')
                ], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('token_id_require')
            ], REST_Controller::HTTP_OK);
        }
    
    }
    
    /*
     * order add and update then success payment then call thius api and update payment status and order table in update details
     */
    public function paymentOrderSuccessNOT_post() {
        $id = $this->post('id');
        $token = $this->post('token');
        $order_id = $this->post('order_id');
        $txt_id = $this->post('txt_id');
        $amt = $this->post('amt');
        $tax = $this->post('tax');
        $total_amt = $this->post('total_amt');
        $email = $this->post('email');
        $phone = $this->post('phone');
        $currency = $this->post('currency');
        
        $key = 'Appspunditinfotech2019-'.$id.$token.$txt_id;
        $ecy = md5(sha1($key).md5($id.$token)).sha1($key);
        
        if ($id != '' && $token != '') {
            $check = $this->Login->get_customer_data_viaid($id);
            if ($check->Token == $token) {
                $order_check = $this->Orders->getOrderForEdit($order_id);
                $product = $this->Orders->productQuantity($order_check->ProductID);
                if($product->Quantity >= $order_check->Quantity){
                    if($order_check->PayID == null){
                        $data = array(
                            'OrderID'=>$order_id,
                            'C_ID'=>$order_check->C_ID,
                            'StoreID'=>$order_check->StoreID,
                            'TxtID'=>$txt_id,
                            'Amt'=>$amt,
                            'Tax'=>$tax,
                            'TotalAmt'=>$total_amt,
                            'Email'=>$email,
                            'Phone'=>$phone,
                            'Currency'=>$currency,
                            'Status'=>1,
                            'Encrypt'=>$ecy
                        );
                        $payment_done = $this->Orders->paymentAdd($data);
                        if($payment_done){
                            //product table in quantity update if sale subtrac
                            $qnty = (($product->Quantity)-($order_check->Quantity));
                            $updateProduct = array(
                                'Quantity'=>$qnty
                            );
                            $product_ok = $this->Orders->productQuantityUpdate($order_check->ProductID, $updateProduct);

                            $updateOrder = array(
                                'PayID'=>$payment_done
                            );
                            $ok = $this->Orders->orderUpdate($order_id,$updateOrder);
                            if($ok){
                                $this->response([
                                   'status'=>true,
                                    'message'=>  $this->lang->line('order_payment_successfully'),
                                    'order_id'=>$ok
                                ], REST_Controller::HTTP_OK);
                            }else{
                                $this->response([
                                    'status'=>false,
                                    'message'=>  $this->lang->line('server_error')
                                ],  REST_Controller::HTTP_OK);
                            }
                        }else{
                            $this->response([
                                'status'=>false,
                                'message'=>  $this->lang->line('server_error')
                            ],  REST_Controller::HTTP_OK);
                        }
                    }else{
                        $this->response([
                            'status'=>false,
                            'message'=>  $this->lang->line('order_payment_already')
                        ], REST_Controller::HTTP_OK);
                    }
                }else{
                    $this->response([
                        'status'=>false,
                        'message'=>  $this->lang->line('order_quantity_large'),
                    ],  REST_Controller::HTTP_OK);
                }
                
            } else {
                $this->response([
                    'status' => false,
                    'message' => $this->lang->line('token_invalid')
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => $this->lang->line('token_id_require')
            ], REST_Controller::HTTP_OK);
        }
    }

    public function paymentOrderCancel_post(){
        $id = $this->post('id');
        $token = $this->post('token');
        $address_id = $this->post('order_id');
        
        if($id != '' && $token != ''){
            $check = $this->Login->get_customer_data_viaid($id);
            if($check->Token == $token){
                
            }else{
                $this->response([
                    'status'=>false,
                    'message'=>  $this->lang->line('token_invalid')
                ], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('token_id_require')
            ], REST_Controller::HTTP_OK);
        }
    }

}
