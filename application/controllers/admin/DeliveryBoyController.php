<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class DeliveryBoyController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->lang->load('sidebar','english');
        $this->lang->load('siteCommon','english');
        $this->lang->load('deliveryBoyAdmin','english');
        $this->lang->load('footer','english');
    }
    
    /**
     * @ Show Delivery Boy in table
     */
    public function index(){
    	$data['view'] = "admin/delivery_boy/tableDeliveryBoy_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    
    /**
     * @ Create New Delivery Boy View
     */ 

    public function create() {
        $data['view'] = "admin/delivery_boy/createDeliveryBoy_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Create New Delivery Boy
     */ 

    public function createDeliveryBoy() {
        $this->form_validation->set_rules('VendorID',$this->lang->line('sidebar_admin/vendor'),'xss_clean|trim|required');
        $this->form_validation->set_rules('FirstName',$this->lang->line('delivery_boy_admin/first_name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('LastName',$this->lang->line('delivery_boy_admin/last_name'),'xss_clean|trim|required');
        
        $this->form_validation->set_rules('DOB',$this->lang->line('delivery_boy_admin/dob'),'xss_clean|trim|required');
        $this->form_validation->set_rules('Gender',$this->lang->line('delivery_boy_admin/gender'),'xss_clean|trim|required');

        $this->form_validation->set_rules('Email',$this->lang->line('delivery_boy_admin/email'),'xss_clean|trim|required|valid_email');
        $this->form_validation->set_rules('Mobile',$this->lang->line('delivery_boy_admin/mobile_no'),'numeric|xss_clean|trim|required|exact_length[10]');
        
        $this->form_validation->set_rules('Password',$this->lang->line('delivery_boy_admin/password'),'xss_clean|trim|min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('ConfirmPass',$this->lang->line('delivery_boy_admin/confirm_password'),'xss_clean|trim|matches[Password]|required');

        $this->form_validation->set_rules('Address',$this->lang->line('delivery_boy_admin/address'),'xss_clean|trim|required');
        $this->form_validation->set_rules('LandmarkAdd',$this->lang->line('delivery_boy_admin/landmark_address'),'xss_clean|trim');
        $this->form_validation->set_rules('Country',$this->lang->line('delivery_boy_admin/country'),'xss_clean|trim|required');
        $this->form_validation->set_rules('State',$this->lang->line('delivery_boy_admin/state'),'xss_clean|trim|required');
        $this->form_validation->set_rules('City',$this->lang->line('delivery_boy_admin/city'),'xss_clean|trim|required');
        $this->form_validation->set_rules('Pincode',$this->lang->line('delivery_boy_admin/picode'),'numeric|xss_clean|trim|required|exact_length[6]');

        $this->form_validation->set_rules('ProfilePic',$this->lang->line('delivery_boy_admin/profile_pic_label'),'required');
        $this->form_validation->set_rules('IdNumber',$this->lang->line('delivery_boy_admin/id_proof_img_label'),'required');
        $this->form_validation->set_rules('IDProofImg',$this->lang->line('delivery_boy_admin/id_proof_img_label'),'required');
        $this->form_validation->set_rules('DrivingLicNo',$this->lang->line('delivery_boy_admin/DrivingLicNo'),'required');
        $this->form_validation->set_rules('DrivingLicExpDate',$this->lang->line('delivery_boy_admin/licence_exp_date_label'),'required');
        
        if($this->form_validation->run()==false){
           
            $this->create();
        
        }else{
            if($this->input->post('Status')) {
                $status = 1;
            }else {
                $status = 0;
            }

            $data['delivery_boy_create'] = array(
                'VendorID' => $this->input->post('VendorID'),
                'FirstName' => $this->input->post('FirstName'),
                'LastName' => $this->input->post('LastName'),
                'DOB' => $this->input->post('DOB'),
                'Gender' => $this->input->post('Gender'),
                'Email' => $this->input->post('Email'),
                'Mobile' => $this->input->post('Mobile'),
                'Pwd' => $this->input->post('Password'),
                'Address1' => $this->input->post('Address'),
                'Address2' => $this->input->post('LandmarkAdd'),
                'Country' => $this->input->post('Country'),
                'State' => $this->input->post('State'),
                'City' => $this->input->post('City'),
                'PinCode' => $this->input->post('Pincode'),
                'ProfilePic' => $this->input->post('ProfilePic'),
                'IdNumber' => $this->input->post('IdNumber'),
                'IDProofImg' => $this->input->post('IDProofImg'),
                'DrivingLicNo' => $this->input->post('DrivingLicNo'),
                'DrivingLicExpDate' => $this->input->post('DrivingLicExpDate'),
                'Status' => $status
            );

            print_r($data['delivery_boy_create']);
            
        }
    }


    /**
     * @ Edit Delivery Boy View
     */ 

     public function edit() {
        $data['view'] = "admin/delivery_boy/editDeliveryBoy_view";
        $this->load->view('admin/layoutAdmin',$data);
    }

    /**
     * @ Edit Delivery Boy Data
     */ 
    public function editDeliveryBoy() {
        $this->form_validation->set_rules('VendorID',$this->lang->line('sidebar_admin/vendor'),'xss_clean|trim|required');
        $this->form_validation->set_rules('FirstName',$this->lang->line('delivery_boy_admin/first_name'),'xss_clean|trim|required');
        $this->form_validation->set_rules('LastName',$this->lang->line('delivery_boy_admin/last_name'),'xss_clean|trim|required');

        $this->form_validation->set_rules('DOB',$this->lang->line('delivery_boy_admin/dob'),'xss_clean|trim|required');
        $this->form_validation->set_rules('Gender',$this->lang->line('delivery_boy_admin/gender'),'xss_clean|trim|required');

        $this->form_validation->set_rules('Email',$this->lang->line('delivery_boy_admin/email'),'xss_clean|trim|required|valid_email');
        $this->form_validation->set_rules('Mobile',$this->lang->line('delivery_boy_admin/mobile_no'),'numeric|xss_clean|trim|required|exact_length[10]');
        
        $this->form_validation->set_rules('Password',$this->lang->line('delivery_boy_admin/password'),'xss_clean|trim|min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('ConfirmPass',$this->lang->line('delivery_boy_admin/confirm_password'),'xss_clean|trim|matches[Password]|required');

        $this->form_validation->set_rules('Address',$this->lang->line('delivery_boy_admin/address'),'xss_clean|trim|required');
        $this->form_validation->set_rules('LandmarkAdd',$this->lang->line('delivery_boy_admin/landmark_address'),'xss_clean|trim');
        $this->form_validation->set_rules('Country',$this->lang->line('delivery_boy_admin/country'),'xss_clean|trim|required');
        $this->form_validation->set_rules('State',$this->lang->line('delivery_boy_admin/state'),'xss_clean|trim|required');
        $this->form_validation->set_rules('City',$this->lang->line('delivery_boy_admin/city'),'xss_clean|trim|required');
        $this->form_validation->set_rules('pincode',$this->lang->line('delivery_boy_admin/picode'),'numeric|xss_clean|trim|required|exact_length[6]');

        $this->form_validation->set_rules('ProfilePic',$this->lang->line('delivery_boy_admin/profile_pic_label'),'required');
        $this->form_validation->set_rules('IdNumber',$this->lang->line('delivery_boy_admin/id_proof_img_label'),'required');
        $this->form_validation->set_rules('IDProofImg',$this->lang->line('delivery_boy_admin/id_proof_img_label'),'required');
        $this->form_validation->set_rules('DrivingLicNo',$this->lang->line('delivery_boy_admin/DrivingLicNo'),'required');
        $this->form_validation->set_rules('DrivingLicExpDate',$this->lang->line('delivery_boy_admin/licence_exp_date_label'),'required');
        
        if($this->form_validation->run()==false){
           
            $this->edit();
        
        }else{
            if($this->input->post('Status')) {
                $status = 1;
            }else {
                $status = 0;
            }

            $data['delivery_boy_edit'] = array(
                'VendorID' => $this->input->post('VendorID'),
                'FirstName' => $this->input->post('FirstName'),
                'LastName' => $this->input->post('LastName'),
                'DOB' => $this->input->post('DOB'),
                'Gender' => $this->input->post('Gender'),
                'Email' => $this->input->post('Email'),
                'Mobile' => $this->input->post('Mobile'),
                'Pwd' => $this->input->post('Password'),
                'Address1' => $this->input->post('Address'),
                'Address2' => $this->input->post('LandmarkAdd'),
                'Country' => $this->input->post('Country'),
                'State' => $this->input->post('State'),
                'City' => $this->input->post('City'),
                'PinCode' => $this->input->post('Pincode'),
                'ProfilePic' => $this->input->post('ProfilePic'),
                'IdNumber' => $this->input->post('IdNumber'),
                'IDProofImg' => $this->input->post('IDProofImg'),
                'DrivingLicNo' => $this->input->post('DrivingLicNo'),
                'DrivingLicExpDate' => $this->input->post('DrivingLicExpDate'),
                'Status' => $status
            );

            print_r($data['delivery_boy_edit']);
            
        }
        
    }


}