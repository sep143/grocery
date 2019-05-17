<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class CategoryController extends CI_Controller{
    
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
    	$data['view'] = "admin/masters/category/tableCategory_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    
    /**
     * @ Create New Item View
     */ 

    public function create() {
        $data['view'] = "admin/masters/category/createCategory_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Create New Item
     */ 

    public function createCategory() {
        
        $this->form_validation->set_rules('categoryID',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/id'),'xss_clean|trim');
        $this->form_validation->set_rules('categoryName',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('categoryDescription',$this->lang->line('site_common/description'),'xss_clean|trim|required');
        $this->form_validation->set_rules('categoryImage',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/image'),'required');
        // $this->form_validation->set_rules('categoryStatus',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/status'),'required');
        
        if($this->form_validation->run()==false){
           
            $this->create();
        
        }else{
            
            $data['category_create'] = array(
                'categoryID' => $this->input->post('categoryID'),
                'categoryName' => $this->input->post('categoryName'),
                'categoryDescription' => $this->input->post('categoryDescription'),
                'categoryImage' => $this->input->post('categoryImage'),
                'categoryStatus' => $this->input->post('categoryStatus'),
            );
            
        }
    }


    /**
     * @ Edit Item View
     */ 

     public function edit() {
        $data['view'] = "admin/masters/category/editCategory_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Edit Item Data
     */ 
    public function editCategory() {
        
        $this->form_validation->set_rules('categoryID',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/id'),'xss_clean|trim');
        $this->form_validation->set_rules('categoryName',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('categoryDescription',$this->lang->line('site_common/description'),'xss_clean|trim|required');
        $this->form_validation->set_rules('categoryImage',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/image'),'required');
        // $this->form_validation->set_rules('categoryStatus',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/status'),'required');
        
        if($this->form_validation->run()==false){
           
            $this->edit();
        
        }else{
            
            $data['category_update'] = array(
                'categoryID' => $this->input->post('categoryID'),
                'categoryName' => $this->input->post('categoryName'),
                'categoryDescription' => $this->input->post('categoryDescription'),
                'categoryImage' => $this->input->post('categoryImage'),
                'categoryStatus' => $this->input->post('categoryStatus'),
            );
            
        }
        
    }


}