<?php
defined('BASEPATH')OR exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class VenderAPIController extends REST_Controller{
    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->lang->load('api/api_message','english');
        //load model
        $this->load->model('api/Auth_model','Login');
        $this->load->model('api/Vender_model','Vender');
    }
    
    /*
     * get all store data
     */
    public function AllStore_get(){
        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');
        $store = $this->input->get('vender');
        if($limit == ''){
            $limit = 10;
        }
        if($offset == ''){
            $offset = 0;
        }
        if($store != ''){
            $store = $this->Vender->getOneStore($store,$limit, $offset);
        }else{
            $store = $this->Vender->getAllStore($limit, $offset);
        }
        if($store){
            $response = array();
            foreach ($store as $value){
                    $feedback = $this->Vender->getAllFeedbackStore($value->ID);
                    $feedback_avg = $this->Vender->getAllFeedbackStoreAvg($value->ID);
                    $rating = number_format($feedback_avg->avg_rating, 1);
//                    if($feedback){
//                        $feedbackData = array();
//                        foreach ($feedback as $fdCount=>$fdVale){
//                            $rating += $fdVale->Rating;
//                            $fdView = array(
//                               'id'=>$fdVale->ID,
//                                'store_id'=>$fdVale->StoreID,
//                                'customer_id'=>$fdVale->C_ID,
//                                'rating'=>$fdVale->Rating,
//                                'comment'=>$fdVale->Comment,
//                                'submit_date'=>$fdVale->CreatedDT,
//                                'modified_date'=>$fdVale->LastModifiedDT, 
//                            );
//                            $feedbackData[] = $fdView;
//                        }
//                        $rating = ($rating/($fdCount + 1));
//                    }else{
//                        $feedbackData = array();
//                    }
                if($value->ProfilePic!=null && strpos($value->ProfilePic, 'http') === false){
                    $value->ProfilePic = base_url().'uploads/profile/vender/'.$value->ProfilePic;
                }
                if($value->ProfileCover!=null && strpos($value->ProfileCover, 'http') === false){
                    $value->ProfileCover = base_url().'uploads/profile/vender/'.$value->ProfileCover;
                }
                    
                $data = array(
                    'id'=>$value->ID,
                    'email_id'=>$value->Email,
                    'vender_name'=>$value->VenderName,
                    'owner_name'=>$value->OwnerName,
                    'mobile_no'=>$value->Mobile,
                    'land_line_no'=>$value->LandLineNo,
                    'description'=>$value->Description,
                    'address_1'=>$value->Address1,
                    'address_2'=>$value->Address2,
                    'city'=>$value->City,
                    'state'=>$value->State,
                    'country'=>$value->Country,
                    'pin_code'=>$value->PinCode,
                    'profile'=>$value->ProfilePic,
                    'cover_pic'=>$value->ProfileCover,
                    'create_date'=>$value->CreatedDT,
                    'modified_date'=>$value->LastModifiedDT,
                    'avg_rate'=>$rating,
                    //'feedback_user'=>$feedbackData
                );
                $response[] = $data;
            }
            $this->response([
                'status'=>true,
                'message'=>  $this->lang->line('all_store_success'),
                'responses'=>$response
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('all_store_nofound')
            ], REST_Controller::HTTP_OK);
        }
    }
    /*
     * get one store data >>by id to get
     */
    public function oneStore_get(){
        $store = $this->input->get('vender');
        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');
        if($limit == ''){
            $limit = 10;
        }
        if($offset == ''){
            $offset = 0;
        }
        $store = $this->Vender->getOneStore($store,$limit, $offset);
        if($store){
            $response = array();
            foreach ($store as $value){
                    $feedback = $this->Vender->getAllFeedbackStore($value->ID);
                    $feedback_avg = $this->Vender->getAllFeedbackStoreAvg($value->ID);
                    $rating = number_format($feedback_avg->avg_rating, 1);
                    if($feedback){
//                        $feedbackData = array();
//                        foreach ($feedback as $fdCount=>$fdVale){
//                            $rating += $fdVale->Rating;
//                            $fdView = array(
//                               'id'=>$fdVale->ID,
//                                'store_id'=>$fdVale->StoreID,
//                                'customer_id'=>$fdVale->C_ID,
//                                'rating'=>$fdVale->Rating,
//                                'comment'=>$fdVale->Comment,
//                                'submit_date'=>$fdVale->CreatedDT,
//                                'modified_date'=>$fdVale->LastModifiedDT, 
//                            );
//                            $feedbackData[] = $fdView;
//                        }
//                        $rating = ($rating/($fdCount + 1));
//                        $rating = $feedback_avg->avg_rating;
                    }else{
//                        $feedbackData = array();
                    }
                if($value->ProfilePic!=null && strpos($value->ProfilePic, 'http') === false){
                    $value->ProfilePic = base_url().'uploads/profile/vender/'.$value->ProfilePic;
                }
                if($value->ProfileCover!=null && strpos($value->ProfileCover, 'http') === false){
                    $value->ProfileCover = base_url().'uploads/profile/vender/'.$value->ProfileCover;
                }
                    
                $data = array(
                    'id'=>$value->ID,
                    'email_id'=>$value->Email,
                    'vender_name'=>$value->VenderName,
                    'owner_name'=>$value->OwnerName,
                    'mobile_no'=>$value->Mobile,
                    'land_line_no'=>$value->LandLineNo,
                    'description'=>$value->Description,
                    'address_1'=>$value->Address1,
                    'address_2'=>$value->Address2,
                    'city'=>$value->City,
                    'state'=>$value->State,
                    'country'=>$value->Country,
                    'pin_code'=>$value->PinCode,
                    'profile'=>$value->ProfilePic,
                    'cover_pic'=>$value->ProfileCover,
                    'create_date'=>$value->CreatedDT,
                    'modified_date'=>$value->LastModifiedDT,
                    'avg_rate'=>$rating,
                    //'feedback_user'=>$feedbackData
                );
                $response[] = $data;
            }
            $this->response([
                'status'=>true,
                'message'=>  $this->lang->line('all_store_success'),
                'responses'=>$response
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('all_store_nofound')
            ], REST_Controller::HTTP_OK);
        }
    }
}