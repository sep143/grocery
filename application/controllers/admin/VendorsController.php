<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class VendorsController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->lang->load('sidebar','english');
        $this->lang->load('siteCommon','english');
        $this->lang->load('vendorAdmin','english');
        $this->lang->load('footer','english');
    }
    
    /**
     * @ Show Vendor in table
     */
    public function index(){
    	$data['view'] = "admin/vendors/tableVendor_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    
    /**
     * @ Create New Vendor View
     */ 

    public function create() {
        $data['view'] = "admin/vendors/createVendor_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Create New Vendor
     */ 

    public function createVendor() {
        
        $this->form_validation->set_rules('VendorName',$this->lang->line('vendor_admin/vendor_name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('OwnerName',$this->lang->line('vendor_admin/owner_name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('vendorEmail',$this->lang->line('vendor_admin/email'),'xss_clean|trim|required|valid_email');
        $this->form_validation->set_rules('vendorMobile',$this->lang->line('vendor_admin/mobile_no'),'numeric|xss_clean|trim|required|exact_length[10]');
        $this->form_validation->set_rules('vendorLandlineNo',$this->lang->line('vendor_admin/landline_no'),'numeric|xss_clean|trim');
        $this->form_validation->set_rules('vendorPassword',$this->lang->line('vendor_admin/password'),'xss_clean|trim|min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('vendorConfirmPass',$this->lang->line('vendor_admin/confirm_password'),'xss_clean|trim|matches[vendorPassword]|required');
        $this->form_validation->set_rules('vendorAddress',$this->lang->line('vendor_admin/address'),'xss_clean|trim|required');
        $this->form_validation->set_rules('vendorLandmarkAdd',$this->lang->line('vendor_admin/landmark_address'),'xss_clean|trim');
        $this->form_validation->set_rules('country',$this->lang->line('vendor_admin/country'),'xss_clean|trim|required');
        $this->form_validation->set_rules('state',$this->lang->line('vendor_admin/state'),'xss_clean|trim|required');
        $this->form_validation->set_rules('city',$this->lang->line('vendor_admin/city'),'xss_clean|trim|required');
        $this->form_validation->set_rules('pincode',$this->lang->line('vendor_admin/picode'),'numeric|xss_clean|trim|required|exact_length[6]');
        $this->form_validation->set_rules('profilePic',$this->lang->line('vendor_admin/profile_pic_label'),'required');
        $this->form_validation->set_rules('profile_cover_pic',$this->lang->line('profile_cover_pic_label'),'');
        
        if($this->form_validation->run()==false){
           
            $this->create();
        
        }else{
            if($this->input->post('vendorStatus')) {
                $status = 1;
            }else {
                $status = 0;
            }

            $data['vendor_create'] = array(
                'VendorName' => $this->input->post('VendorName'),
                'OwnerName' => $this->input->post('OwnerName'),
                'Email' => $this->input->post('vendorEmail'),
                'Mobile' => $this->input->post('vendorMobile'),
                'LandLineNo' => $this->input->post('vendorLandlineNo'),
                'Pwd' => $this->input->post('vendorPassword'),
                'Address1' => $this->input->post('vendorAddress'),
                'Address2' => $this->input->post('vendorLandmarkAdd'),
                'Country' => $this->input->post('country'),
                'State' => $this->input->post('state'),
                'City' => $this->input->post('city'),
                'PinCode' => $this->input->post('pincode'),
                'ProfilePic' => $this->input->post('profilePic'),
                'ProfileCover' => $this->input->post('profile_cover_pic'),
                'Status' => $status
            );

            print_r($data['vendor_create']);
            
        }
    }


    /**
     * @ Edit Vendor View
     */ 

     public function edit() {
        $data['view'] = "admin/vendors/editVendor_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Edit Vendor Data
     */ 
    public function editVendor() {
        
        $this->form_validation->set_rules('VendorName',$this->lang->line('vendor_admin/vendor_name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('OwnerName',$this->lang->line('vendor_admin/owner_name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('vendorEmail',$this->lang->line('vendor_admin/email'),'xss_clean|trim|required|valid_email');
        $this->form_validation->set_rules('vendorMobile',$this->lang->line('vendor_admin/mobile_no'),'numeric|xss_clean|trim|required|exact_length[10]');
        $this->form_validation->set_rules('vendorLandlineNo',$this->lang->line('vendor_admin/landline_no'),'numeric|xss_clean|trim');
        $this->form_validation->set_rules('vendorPassword',$this->lang->line('vendor_admin/password'),'xss_clean|trim|min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('vendorConfirmPass',$this->lang->line('vendor_admin/confirm_password'),'xss_clean|trim|matches[vendorPassword]|required');
        $this->form_validation->set_rules('vendorAddress',$this->lang->line('vendor_admin/address'),'xss_clean|trim|required');
        $this->form_validation->set_rules('vendorLandmarkAdd',$this->lang->line('vendor_admin/landmark_address'),'xss_clean|trim');
        $this->form_validation->set_rules('country',$this->lang->line('vendor_admin/country'),'xss_clean|trim|required');
        $this->form_validation->set_rules('state',$this->lang->line('vendor_admin/state'),'xss_clean|trim|required');
        $this->form_validation->set_rules('city',$this->lang->line('vendor_admin/city'),'xss_clean|trim|required');
        $this->form_validation->set_rules('pincode',$this->lang->line('vendor_admin/picode'),'numeric|xss_clean|trim|required|exact_length[6]');
        $this->form_validation->set_rules('profilePic',$this->lang->line('vendor_admin/profile_pic_label'),'required');
        $this->form_validation->set_rules('profile_cover_pic',$this->lang->line('profile_cover_pic_label'),'');
        
        if($this->form_validation->run()==false){
           
            $this->edit();
        
        }else{
            if($this->input->post('vendorStatus')) {
                $status = 1;
            }else {
                $status = 0;
            }

            $data['vendor_edit'] = array(
                'VendorName' => $this->input->post('VendorName'),
                'OwnerName' => $this->input->post('OwnerName'),
                'Email' => $this->input->post('vendorEmail'),
                'Mobile' => $this->input->post('vendorMobile'),
                'LandLineNo' => $this->input->post('vendorLandlineNo'),
                'Pwd' => $this->input->post('vendorPassword'),
                'Address1' => $this->input->post('vendorAddress'),
                'Address2' => $this->input->post('vendorLandmarkAdd'),
                'Country' => $this->input->post('country'),
                'State' => $this->input->post('state'),
                'City' => $this->input->post('city'),
                'PinCode' => $this->input->post('pincode'),
                'ProfilePic' => $this->input->post('profilePic'),
                'ProfileCover' => $this->input->post('profile_cover_pic'),
                'Status' => $status
            );

            print_r($data['vendor_edit']);
            
        }
        
    }


}