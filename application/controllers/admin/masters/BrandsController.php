<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class BrandsController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->lang->load('sidebar','english');
        $this->lang->load('mastersAdmin','english');
        $this->lang->load('siteCommon','english');
        $this->lang->load('msgAlert','english');
        $this->lang->load('footer','english');
        $this->load->model('admin/masters/Brands_model','Brands');
    }
    
    /**
     * @ SHOW BRANDS IN TABLE
     */
    public function index(){
        $brandsList = $this->Brands->get_brands();
    	$data['view'] = "admin/masters/Brands/tableBrands_view";
        $data['brandsList'] = $brandsList;
        $this->load->view('admin/layoutAdmin',$data);
    }

    
    /**
     * @ CRAETE NEW BRAND VIEW
     */ 

    public function create() {
        $data['view'] = "admin/masters/Brands/createBrands_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ CREATE NEW BRAND
     */ 

    public function createBrand() {
        
        $this->form_validation->set_rules('brandName',$this->lang->line('sidebar_admin/brands')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required|callback_isExists');
        
        if($this->form_validation->run()==false){
           
            $this->create();
        
        }else{
            
            if($this->input->post('brandStatus')) {
                $status = 1;  // Status "1"  Stands for "ON"
            }else {
                $status = 0; // Status "0"  Stands for "OFF"
            }

            $data = array(
                
                'Name' => $this->input->post('brandName'),
                'Status' => $status,
                'CreatedBy' => 'Admin'

            );

            $response = $this->Brands->add($data);

            if($response==true) {
                $this->session->set_flashdata('success','New Brand Added Successfully.');
                redirect(site_url('admin/brands/create'));
            }else {
                $this->session->set_flashdata('error','Something went wrong.');
                redirect(site_url('admin/brands/create'));
            }
            
        }
    }


    public function isExists($brand)
    {   
        
        $result = $this->Brands->is_exists($brand);
        // 
        if($result) {
            $this->form_validation->set_message('isExists', $this->lang->line('brand_msg_admin/already_exist'));
            return false;
        }else {
            return true;
        }
        
    }


    /**
     * @ EDIT BRAND VIEW
     */ 

     public function edit() {
        $data['view'] = "admin/masters/Brands/editBrands_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ EDIT BRAND DATA
     */ 
    public function editBrand() {
        
        $this->form_validation->set_rules('brandName',$this->lang->line('sidebar_admin/brands')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        
        if($this->form_validation->run()==false){
           
            $this->edit();
        
        }else{
            
             if($this->input->post('brandStatus')) {
                $status = 1; // Status "1"  Stands for "ON"
            }else {
                $status = 0; // Status "0"  Stands for "OFF"
            }

            $data = array(
                
                'Name' => $this->input->post('brandName'),
                'Status' => $status
            );
            
        }
        
    }

    function delete($id) {
        $this->Brands->remove($id);
        redirect('admin/brands/index');
    }
}