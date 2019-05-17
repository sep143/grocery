<?php
defined('BASEPATH')OR exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class CategoryAPIController extends REST_Controller{
    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->lang->load('api/api_message','english');
        //load model
        $this->load->model('api/Auth_model','Login');
        $this->load->model('api/Category_model','Category');
    }
    
    /*
     * get category with sub category >>all category and single category
     */
    public function allCategory_get(){
        $cat = $this->input->get('id');
        if($cat != ''){
            $category = $this->Category->getCategory($cat);
        }else{
            $category = $this->Category->getAllCategory();
        }
        if($category){
            $response = array();
            foreach ($category as $value){
                $sub_category = $this->Category->getSubCategory($value->ID);
                if($sub_category){
                    foreach ($sub_category as $sbValue){
                        if($sbValue->Image!=null && strpos($sbValue->Image, 'http') === false){
                            $sbValue->Image = base_url().'categories/'.$sbValue->Image;
                        }
                        $sub_data = array(
                            'id'=>$sbValue->ID,
                            'name'=>$sbValue->Name,
                            'description'=>$sbValue->Description,
                            'image'=>$sbValue->Image,
                            'create_date'=>$sbValue->CreatedDT,
                            'modified_date'=>$sbValue->LastModifiedDT,
                        );
                        $response_sub[] = $sub_data;
                    }
                }else{
                    $response_sub = array();
                }
                if($value->Image!=null && strpos($value->Image, 'http') === false){
                    $value->Image = base_url().'categories/'.$value->Image;
                }
                $data = array(
                    'id'=>$value->ID,
                    'name'=>$value->Name,
                    'description'=>$value->Description,
                    'image'=>$value->Image,
                    'create_date'=>$value->CreatedDT,
                    'modified_date'=>$value->LastModifiedDT,
                    'sub_category'=>$response_sub
                );
                $response[] = $data;
            }
            
            $this->response([
                'status'=>true,
                'message'=>  $this->lang->line('category_success'),
                'response'=>$response
            ],  REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('category_nofound')
            ], REST_Controller::HTTP_OK);
        }
    }
}