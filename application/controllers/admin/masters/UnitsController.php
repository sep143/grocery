<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class UnitsController extends CI_Controller{
    
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
    	$data['view'] = "admin/masters/units/tableUnits_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    
    /**
     * @ Create New Item View
     */ 

    public function create() {
        $data['view'] = "admin/masters/units/createUnits_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Create New Item
     */ 

    public function createUnit() {
        
        $this->form_validation->set_rules('unitName',$this->lang->line('sidebar_admin/unit')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        
        if($this->form_validation->run()==false){
           
            $this->create();
        
        }else{
            
            $data['unit_create'] = array(
                
                'unitName' => $this->input->post('unitName'),

            );
            
        }
    }


    /**
     * @ Edit Item View
     */ 

     public function edit() {
        $data['view'] = "admin/masters/units/editUnits_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Edit Item Data
     */ 
    public function editUnit() {
        
        $this->form_validation->set_rules('unitName',$this->lang->line('sidebar_admin/unit')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        
        if($this->form_validation->run()==false){
           
            $this->edit();
        
        }else{
            
            $data['unit_update'] = array(
                
                'unitName' => $this->input->post('unitName'),

            );
            
        }
        
    }


}