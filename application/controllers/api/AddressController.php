<?php
defined('BASEPATH')OR exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';
class AddressController extends REST_Controller{
    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->lang->load('api/api_message','english');
        //load model
        $this->load->model('api/Auth_model','Login');
        $this->load->model('api/Customer_Address_Model','Address_model');
    }
    
    /*
     * get all address for perticuler customer
     */
    public function allAddressView_post(){
        $id = $this->post('id');
        $token = $this->post('token');
        if($id != '' && $token != ''){
            $check = $this->Login->get_customer_data_viaid($id);
            if($check->Token == $token){
                $result = $this->Address_model->get_all_address($check->ID);
                if($result){
                    $resData = array();
                    foreach ($result as $value){
                        $data = array(
                            'address_id'=>$value->ID,
                            'address_line'=>$value->Address_1,
                            'address_2'=>$value->Address_2,
                            'city'=>$value->City,
                            'state'=>$value->State,
                            'country'=>$value->Country,
                            'pin_code'=>$value->PinCode,
                            'contact_no'=>$value->ContactNo,
                            'default'=>$value->Default,
                        );
                        $resData[] = $data;
                    }
                    
                }else{
                    $resData = array();
                }
                $this->response([
                    'status'=>true,
                    'message'=>  $this->lang->line('address_success'),
                    'response'=>$resData
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=>false,
                    'message'=>  $this->lang->line('token_invalid')
                ], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('address_token_id_require')
            ], REST_Controller::HTTP_OK);
        }
    }
    
    /*
     * Enter new address for customer
     */
    public function addAddress_post(){
        $id = $this->post('id');
        $token = $this->post('token');
        
        $default = $this->post('default');
        $address1 = $this->post('address1');
        $address2 = $this->post('address2');
        $city = $this->post('city');
        $state = $this->post('state');
        $country = $this->post('country');
        $pin_code = $this->post('pin_code');
        $contact_no = $this->post('contact_no');
        $this->form_validation->set_rules('address2','Address','required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('state','State','required');
        $this->form_validation->set_rules('country','Country','required');
        $this->form_validation->set_rules('pin_code','Pin Code','required');
        $this->form_validation->set_rules('contact_no','Contact No','required|min_length[13]');
        if($this->form_validation->run()==false){
            $string_html = validation_errors();
            $description_without = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string_html));
            $description_without = htmlentities($description_without, ENT_QUOTES, "UTF-8");
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('address_add_required_field'),
                'error'=>$description_without
            ], REST_Controller::HTTP_OK);
        }else{
            if($id != '' && $token != ''){
                $check = $this->Login->get_customer_data_viaid($id);
                if($check->Token == $token){
                    $data = array(
                        'C_ID'=>$id,
                        'Default'=>$default,
                        'Address_1'=>$address1,
                        'Address_2'=>$address2,
                        'City'=>$city,
                        'State'=>$state,
                        'Country'=>$country,
                        'PinCode'=>$pin_code,
                        'ContactNo'=>$contact_no,
                        'CreatedBy'=>$id,
                    );
                    //if set default then before all default clear then set insert time
                    if($default == 1){
                        $def_ok = $this->Address_model->default_clear($id);
                    }else{
                        $def_ok = true;
                    }
                    
                    //insert data
                    if($def_ok){
                        $done_ok = $this->Address_model->newAddAddress($data);
                        if($done_ok){
                            $default_msg = ($default == 1)?$this->lang->line('address_success_default_set'):$this->lang->line('address_success_default_unset');
                            $this->response([
                                'status'=>true,
                                'message'=>  $this->lang->line('address_success_add'),
                                'default'=>$default_msg
                            ], REST_Controller::HTTP_OK);
                        }
                    }else{
                        $this->response([
                            'status'=>false,
                            'message'=>  $this->lang->line('server_error')
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
                    'message'=>  $this->lang->line('address_token_id_require')
                ], REST_Controller::HTTP_OK);
            }
        }
        
    }
    
    /*
     * Edit address for customer
     */
    public function updateAddress_post(){
        $id = $this->post('id');
        $token = $this->post('token');
        
        $address_id = $this->post('address_id');
        $default = $this->post('default');
        $address1 = $this->post('address1');
        $address2 = $this->post('address2');
        $city = $this->post('city');
        $state = $this->post('state');
        $country = $this->post('country');
        $pin_code = $this->post('pin_code');
        $contact_no = $this->post('contact_no');
        $this->form_validation->set_rules('address2','Address','required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('state','State','required');
        $this->form_validation->set_rules('country','Country','required');
        $this->form_validation->set_rules('pin_code','Pin Code','required');
        $this->form_validation->set_rules('contact_no','Contact No','required|min_length[13]');
        if($this->form_validation->run()==FALSE){
            $string_html = validation_errors();
            $description_without = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string_html));
            $description_without = htmlentities($description_without, ENT_QUOTES, "UTF-8");
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('address_add_required_field'),
                'error'=>$description_without
            ], REST_Controller::HTTP_OK);
        }else{
            if($id != '' && $token != ''){
                $check = $this->Login->get_customer_data_viaid($id);
                if($check->Token == $token){
                    $updateData = array(
                        'C_ID'=>$id,
                        'Default'=>$default,
                        'Address_1'=>$address1,
                        'Address_2'=>$address2,
                        'City'=>$city,
                        'State'=>$state,
                        'Country'=>$country,
                        'PinCode'=>$pin_code,
                        'ContactNo'=>$contact_no,
                        'LastModifiedBy'=>$id,
                        'LastModifiedDT'=>date('Y-m-d H:i:s'),
                    );
                    //if set default then before all default clear then set insert time
                    if($default == 1){
                        $def_ok = $this->Address_model->default_clear($id);
                    }else{
                        $def_ok = true;
                    }
                    if($def_ok){
                        $done_ok = $this->Address_model->updateAddress($address_id,$updateData);
                        if($done_ok){
                            $default_msg = ($default == 1)?$this->lang->line('address_success_default_set'):$this->lang->line('address_success_default_unset');
                            $this->response([
                                'status'=>true,
                                'message'=>  $this->lang->line('address_success_add'),
                                'default'=>$default_msg
                            ], REST_Controller::HTTP_OK);
                        }
                        
                    }else{
                        $this->response([
                            'status'=>false,
                            'message'=>  $this->lang->line('server_error')
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
                    'message'=>  $this->lang->line('address_token_id_require')
                ], REST_Controller::HTTP_OK);
            }
        }
    }
    
    /*
     * address delete api
     * 
     */
    public function deleteAddress_post(){
        $id = $this->post('id');
        $token = $this->post('token');
        $address_id = $this->post('address_id');
        
        if($id != '' && $token != ''){
            $check = $this->Login->get_customer_data_viaid($id);
            if($check->Token == $token){
                $del_add = $this->Address_model->deleteAddress($id,$address_id);
                if($del_add){
                    $this->response([
                        'status'=>TRUE,
                        'message'=>  $this->lang->line('address_delete_success'),
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status'=>false,
                        'message'=>  $this->lang->line('server_error')
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
     * pattern api
     * 
     */
    public function default_post(){
        $id = $this->post('id');
        $token = $this->post('token');
        $address_id = $this->post('address_id');
        
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