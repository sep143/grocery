<?php
defined('BASEPATH')OR exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';
class FeedbackAPIController extends REST_Controller{
    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->lang->load('api/api_message','english');
        //load model
        $this->load->model('api/Auth_model','Login');
        $this->load->model('api/Feedback_model','Feedback');
    }
    
    /*
     * Store feedback of coustomer ADD feedback
     */
    public function storeFeedback_post(){
        $id = $this->post('id'); //customer id
        $token = $this->post('token');
        
        $store_id = $this->post('store_id');
        $rating = $this->post('rating');
        $comment = $this->post('comment');
        $this->form_validation->set_rules('store_id','Store ID','required|numeric');
        $this->form_validation->set_rules('rating','Rating','required|numeric');
        $this->form_validation->set_rules('comment','Comment','required|min_length[20]');
        if($this->form_validation->run()==false){
            $string_html = validation_errors();
            $description_without = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string_html));
            $description_without = htmlentities($description_without, ENT_QUOTES, "UTF-8");
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('store_feedback_fail'),
                'error'=>$description_without
            ], REST_Controller::HTTP_OK);
        }else{
            if($id != '' && $token != ''){
                $check = $this->Login->get_customer_data_viaid($id);
                if($check->Token == $token){
                    $data = array(
                        'StoreID'=>$store_id,
                        'C_ID'=>$id,
                        'Rating'=>$rating,
                        'Comment'=>$comment,
                    );
                    $feedback_ok = $this->Feedback->add_store_feedback($data);
                    if($feedback_ok){
                        $this->response([
                            'status'=>true,
                            'message'=>  $this->lang->line('store_feedback_success')
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
        
    }
    
    /*
     * Delivery boy feedback of coustomer ADD Feedback
     */
    public function deliveryBoyFeedback_post(){
        $id = $this->post('id'); //customer id
        $token = $this->post('token');
        
        $store_id = $this->post('store_id');
        $boy_id = $this->post('delivery_id');
        $rating = $this->post('rating');
        $comment = $this->post('comment');
        $this->form_validation->set_rules('store_id','Store ID','required|numeric');
        $this->form_validation->set_rules('delivery_id','Delivery Boy ID','required|numeric');
        $this->form_validation->set_rules('rating','Rating','required|numeric');
        $this->form_validation->set_rules('comment','Comment','required|min_length[20]');
        if($this->form_validation->run()==false){
            $string_html = validation_errors();
            $description_without = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string_html));
            $description_without = htmlentities($description_without, ENT_QUOTES, "UTF-8");
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('store_feedback_fail'),
                'error'=>$description_without
            ], REST_Controller::HTTP_OK);
        }else{
            if($id != '' && $token != ''){
                $check = $this->Login->get_customer_data_viaid($id);
                if($check->Token == $token){
                    $data = array(
                        'StoreID'=>$store_id,
                        'BoyID'=>$boy_id,
                        'C_ID'=>$id,
                        'Rating'=>$rating,
                        'Comment'=>$comment,
                    );
                    $feedback_ok = $this->Feedback->add_deliveryBoy_feedback($data);
                    if($feedback_ok){
                        $this->response([
                            'status'=>true,
                            'message'=>  $this->lang->line('store_feedback_success_delivery')
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
        
    }
    
    
    /*
     * All store feedback view >> only active fedback
     */
    public function storeFeedbackView_get(){
        $store_id = $this->input->get('store');
        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');
        if($limit == ''){
            $limit = 10;
        }
        if($offset == ''){
            $offset = 0;
        }
        $feedback = $this->Feedback->getStoreFeedback($store_id, $limit, $offset);
        if($feedback){
            $response = array();
            foreach ($feedback as $value){
                $data = array(
                    'id'=>$value->ID,
                    'store_id'=>$value->StoreID,
                    'customer_id'=>$value->C_ID,
                    'rating'=>$value->Rating,
                    'comment'=>$value->Comment,
                    'submit_date'=>$value->CreatedDT,
                    'modified_date'=>$value->LastModifiedDT,
                );
                $response[] = $data;
            }
            $this->response([
                'status'=>true,
                'message'=>  $this->lang->line('store_all_feedback_success'),
                'responses'=>$response
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('store_all_feedback_nofound')
            ], REST_Controller::HTTP_OK);
        }
    }
    
    
    /*
     * All store feedback view >> only active fedback
     */
    public function allStoreFeedbackView_get(){
        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');
        if($limit == ''){
            $limit = 10;
        }
        if($offset == ''){
            $offset = 0;
        }
        $feedback = $this->Feedback->getAllStoreFeedback($limit, $offset);
        if($feedback){
            $response = array();
            foreach ($feedback as $value){
                $data = array(
                    'id'=>$value->ID,
                    'store_id'=>$value->StoreID,
                    'customer_id'=>$value->C_ID,
                    'rating'=>$value->Rating,
                    'comment'=>$value->Comment,
                    'submit_date'=>$value->CreatedDT,
                    'modified_date'=>$value->LastModifiedDT,
                );
                $response[] = $data;
            }
            $this->response([
                'status'=>true,
                'message'=>  $this->lang->line('store_all_feedback_success'),
                'responses'=>$response
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('store_all_feedback_nofound')
            ], REST_Controller::HTTP_OK);
        }
    }
    
    
    /*
     * All delivery bot feedback view >> only active fedback
     */
    public function deliveryBoyFeedbackView_get(){
        $delivery = $this->input->get('delivery');
        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');
        if($limit == ''){
            $limit = 10;
        }
        if($offset == ''){
            $offset = 0;
        }
        $feedback = $this->Feedback->getDeliveryBoyFeedback($delivery, $limit, $offset);
        if($feedback){
            $response = array();
            foreach ($feedback as $value){
                $data = array(
                    'id'=>$value->ID,
                    'store_id'=>$value->StoreID,
                    'customer_id'=>$value->C_ID,
                    'rating'=>$value->Rating,
                    'comment'=>$value->Comment,
                    'submit_date'=>$value->CreatedDT,
                    'modified_date'=>$value->LastModifiedDT,
                );
                $response[] = $data;
            }
            $this->response([
                'status'=>true,
                'message'=>  $this->lang->line('delivery_all_feedback_success'),
                'responses'=>$response
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('delivery_all_feedback_nofound')
            ], REST_Controller::HTTP_OK);
        }
    }
    
    /*
     * All delivery bot feedback view >> only active fedback
     */
    public function allDeliveryBoyFeedbackView_get(){
        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');
        if($limit == ''){
            $limit = 10;
        }
        if($offset == ''){
            $offset = 0;
        }
        $feedback = $this->Feedback->getAllDeliveryBoyFeedback($limit, $offset);
        if($feedback){
            $response = array();
            foreach ($feedback as $value){
                $data = array(
                    'id'=>$value->ID,
                    'store_id'=>$value->StoreID,
                    'customer_id'=>$value->C_ID,
                    'rating'=>$value->Rating,
                    'comment'=>$value->Comment,
                    'submit_date'=>$value->CreatedDT,
                    'modified_date'=>$value->LastModifiedDT,
                );
                $response[] = $data;
            }
            $this->response([
                'status'=>true,
                'message'=>  $this->lang->line('delivery_all_feedback_success'),
                'responses'=>$response
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('delivery_all_feedback_nofound')
            ], REST_Controller::HTTP_OK);
        }
    }
    
}