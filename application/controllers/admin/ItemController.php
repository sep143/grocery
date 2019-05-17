<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class ItemController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->lang->load('sidebar','english');
        $this->lang->load('itemCreate','english');
        $this->lang->load('siteCommon','english');
        $this->lang->load('vendorAdmin','english');
        $this->lang->load('footer','english');
    }
    
    /**
     * @ Show Items in table
     */
    public function index(){
    	$data['view'] = "admin/items/tableItem_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    
    /**
     * @ Create New Item View
     */ 

    public function create() {
        $data['view'] = "admin/items/createItem_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Create New Item
     */ 

    public function createItem() {
        $this->form_validation->set_rules('vendorName',$this->lang->line('vendor_admin/vendor_name'),'required');
        $this->form_validation->set_rules('itemCategory',$this->lang->line('site_common/category'),'required');
        $this->form_validation->set_rules('itemSubCategory',$this->lang->line('sidebar_admin/sub_category'),'required');
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
                'vendorName'         => $this->input->post('vendorName'),
                'itemCategory'       => $this->input->post('itemCategory'),
                'itemSubCategory'    => $this->input->post('itemSubCategory'),
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
     * @ Edit Item View
     */ 

     public function edit() {
        $data['view'] = "admin/items/editItem_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Edit Item Data
     */ 
    public function editItem() {
        $this->form_validation->set_rules('vendorName',$this->lang->line('vendor_admin/vendor_name'),'required');
        $this->form_validation->set_rules('itemCategory',$this->lang->line('site_common/category'),'required');
        $this->form_validation->set_rules('itemSubCategory',$this->lang->line('sidebar_admin/sub_category'),'required');
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
            
            $data['item_update'] = array(
                'vendorName'         => $this->input->post('vendorName'),
                'itemCategory'     => $this->input->post('itemCategory'),
                'itemSubCategory'     => $this->input->post('itemSubCategory'),
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
     * @ Edit Item View
     */ 

     public function itemRating() {
        $data['view'] = "admin/items/tableItemRating_view";
        $this->load->view('admin/layoutAdmin',$data);
    }



}