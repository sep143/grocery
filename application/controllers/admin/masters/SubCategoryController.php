<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class SubCategoryController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->lang->load('sidebar','english');
        $this->lang->load('mastersAdmin','english');
        $this->lang->load('siteCommon','english');
        $this->lang->load('footer','english');
    }
    
    /**
     * @ Show Items in table
     */
    public function index(){
    	$data['view'] = "admin/masters/sub-category/tableSubCategory_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    
    /**
     * @ Create New Item View
     */ 

    public function create() {
        $data['view'] = "admin/masters/sub-category/createSubCategory_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Create New Item
     */ 

    public function createSubCategory() {
        
        $this->form_validation->set_rules('categoryName',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('categoryDescription',$this->lang->line('site_common/description')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('categoryImage',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/image'),'required');
        
        if($this->form_validation->run()==false){
           
            $this->create();
        
        }else{
            
            $data['category_create'] = array(
                
                'categoryName' => $this->input->post('categoryName'),
                'categoryDescription' => $this->input->post('categoryDescription'),
                'categoryImage' => $this->input->post('categoryImage'),

            );
            
        }
    }


    /**
     * @ Edit Item View
     */ 

     public function edit() {
        $data['view'] = "admin/masters/sub-category/editSubCategory_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Edit Item Data
     */ 
    public function editSubCategory() {
        
        $this->form_validation->set_rules('categoryName',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('categoryDescription',$this->lang->line('site_common/description')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('categoryImage',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/image'),'required');
        
        if($this->form_validation->run()==false){
           
            $this->create();
        
        }else{
            
            $data['category_update'] = array(
                
                'categoryName' => $this->input->post('categoryName'),
                'categoryDescription' => $this->input->post('categoryDescription'),
                'categoryImage' => $this->input->post('categoryImage'),
            );
            
        }
        
    }


}