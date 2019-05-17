<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class ItemController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->lang->load('sidebar','english');
        $this->lang->load('itemCreate','english');
        $this->lang->load('siteCommon','english');
        $this->lang->load('footer','english');
    }
    
    /**
     * @ Show Items in table
     */ 
    public function index(){
    	$data['view'] = "vendor/tableItem_view";
        $this->load->view('vendor/layoutVendor',$data);
    }

    

    /**
     * @ Create New Item
     */ 

    public function create() {
        $data['view'] = "vendor/createItem_view";
        $this->load->view('vendor/layoutVendor',$data);
    }

    public function createItem() {
        
        $this->form_validation->set_rules('itemCategoryID',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/id'),'required');
        $this->form_validation->set_rules('itemPrice',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/price'),'numeric|xss_clean|trim|required');
        $this->form_validation->set_rules('itemQuantity',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/quantity'),'numeric|xss_clean|trim|required');
        $this->form_validation->set_rules('itemSize',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/size'),'xss_clean|trim|required');
        $this->form_validation->set_rules('itemUnitID',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/unit'),'required');
        $this->form_validation->set_rules('itemBrandID',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/brand'),'required');
        $this->form_validation->set_rules('itemName',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        
        $this->form_validation->set_rules('itemDescription',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/description'),'xss_clean|trim|required');
        
        $this->form_validation->set_rules('itemStatus',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/status'),'required');
        
        $this->form_validation->set_rules('itemOfferStatus',$this->lang->line('itemcreate_vendor/is_offer'),'required');

        $this->form_validation->set_rules('itemImage',$this->lang->line('site_common/image'),'required');
        
        if($this->form_validation->run()==false){
           
            $this->create();
        
        }else{
            
            $data['item_create'] = array(
                
                'itemCategoryID'     => $this->input->post('itemCategoryID'),
                'itemPrice'          => $this->input->post('itemPrice'),
                'itemQuantity'       => $this->input->post('itemQuantity'),
                'itemSize'           => $this->input->post('itemSize'),
                'itemUnitID'         => $this->input->post('itemUnitID'),
                'itemBrandID'        => $this->input->post('itemBrandID'),
                'itemName'           => $this->input->post('itemName'),
                'itemDescription'    => $this->input->post('itemDescription'),
                'itemStatus'         => $this->input->post('itemStatus'),
                'itemOfferStatus'    => $this->input->post('itemOfferStatus')

            );


            
        }
    }



    /**
     * @ Edit Item
     */ 

    public function edit() {
        $data['view'] = "vendor/editItem_view";
        $this->load->view('vendor/layoutVendor',$data);
    }

    public function editItem() {
        
        $this->form_validation->set_rules('itemCategoryID',$this->lang->line('site_common/category')." ".$this->lang->line('site_common/id'),'required');
        $this->form_validation->set_rules('itemPrice',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/price'),'numeric|xss_clean|trim|required');
        $this->form_validation->set_rules('itemQuantity',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/quantity'),'numeric|xss_clean|trim|required');
        $this->form_validation->set_rules('itemSize',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/size'),'xss_clean|trim|required');
        $this->form_validation->set_rules('itemUnitID',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/unit'),'required');
        $this->form_validation->set_rules('itemBrandID',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/brand'),'required');
        $this->form_validation->set_rules('itemName',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/name'),'xss_clean|trim|required');
        
        $this->form_validation->set_rules('itemDescription',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/description'),'xss_clean|trim|required');
        
        $this->form_validation->set_rules('itemStatus',$this->lang->line('site_common/item')." ".$this->lang->line('site_common/status'),'required');
        
        $this->form_validation->set_rules('itemOfferStatus',$this->lang->line('itemcreate_vendor/is_offer'),'required');

        $this->form_validation->set_rules('itemImage',$this->lang->line('site_common/image'),'required');
        
        if($this->form_validation->run()==false){
           
            $this->edit();
        
        }else{
            
            $data['item_create'] = array(
                
                'itemCategoryID'     => $this->input->post('itemCategoryID'),
                'itemPrice'          => $this->input->post('itemPrice'),
                'itemQuantity'       => $this->input->post('itemQuantity'),
                'itemSize'           => $this->input->post('itemSize'),
                'itemUnitID'         => $this->input->post('itemUnitID'),
                'itemBrandID'        => $this->input->post('itemBrandID'),
                'itemName'           => $this->input->post('itemName'),
                'itemDescription'    => $this->input->post('itemDescription'),
                'itemStatus'         => $this->input->post('itemStatus'),
                'itemOfferStatus'    => $this->input->post('itemOfferStatus')

            );


            
        }
    }

}