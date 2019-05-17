<?php
defined('BASEPATH')OR exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class ProductAPIController extends REST_Controller {
    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->lang->load('api/api_message','english');
        //load model
        $this->load->model('api/Products_model','Products');
        
    }
    
    /*
     * all product and vender and store wise get products
     */
    public function getAllProducts_get(){
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
            $products = $this->Products->getOneVenderProduct($store,$limit, $offset);
        }else{
            $products = $this->Products->getAllProductsWIthAllVender($limit, $offset);
        }
        //get vender products
        if($products){
            $response = array();
            foreach ($products as $value){
                $pr_image = $this->Products->getProductsImages($value->ID);
                if($pr_image){
                    $product_images = array();
                    foreach ($pr_image as $pr_value){
                        if($pr_value->Images!=null && strpos($pr_value->Images, 'http') === false){
                            $pr_value->Images = base_url().'uploads/products/'.$pr_value->Images;
                        }
                        $img_data = array(
                            'img_id'=>$pr_value->ID,
                            'img'=>$pr_value->Images,
                            'create_date'=>$pr_value->CreatedDT,
                        );
                        $product_images[] = $img_data;
                    }
                }else{
                    $product_images = array();
                }
                $data = array(
                    'id'=>$value->ID,
                    'vender_id'=>$value->StoreID,
                    'product_name'=>$value->Name,
                    'product_price'=>$value->Price,
                    'product_description'=>$value->Description,
                    'product_quentity'=>$value->Quantity,
                    'product_size'=>$value->Size,
                    'category_name'=>$value->category_name,
                    'unit_name'=>$value->unit_name,
                    'brand_name'=>$value->brand_name,
                    'product_offer'=>$value->Offer,
                    'product_offer_price'=>$value->OfferPrice,
                    'product_offer_ex_date'=>$value->OfferExpiredDT,
                    'product_create_DT'=>$value->CreatedDT,
                    'product_modified_DT'=>$value->LastModifiedDT,
                    'products_images'=>$product_images
                );
                $response[] = $data;
            }
            
            $this->response([
                'status'=>true,
                'message'=>  $this->lang->line('products_success'),
                'response'=>$response
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'=>false,
                'message'=>  $this->lang->line('products_nofound')
            ], REST_Controller::HTTP_OK);
        }
    }
}