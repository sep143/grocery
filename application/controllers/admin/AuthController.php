<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class AuthController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->lang->load('loginAdmin','english');
    }
    
    /*
     * Login form
     */
    public function index(){
        $this->load->view('admin/loginAdmin_view');
    }
    
    /*
     * Login authetication check
     * 
     */
    public function login(){
        $this->form_validation->set_rules('email','Email','xss_clean|trim|required');
        $this->form_validation->set_rules('password','Password','xss_clean|trim|required|callback_check');
        if($this->form_validation->run()==false){
            $this->index();
        }else{
            echo $this->input->post('email').'</br>';
            echo $this->input->post('password');
            redirect(site_url('admin/dashboard'));
        }
    }

    function check($password){
        $email=  $this->input->post('email');
        $result=  $this->user_model->check($userName,$password);
        if ($result) {
            if ($result->Role != 2) { //advertiser user ko chhod kr baki pr login kr dega
                $data = array(
                    'log_id' => $result->ID,
                    'log_fname' => $result->FirstName,
                    'log_lname' => $result->LastName,
                    'log_user_name' => $result->UserName,
                    'log_role' => $result->Role,
                    'login' => true,
                );
                $this->session->set_userdata($data);
                return TRUE;
            }//role check condition
            else {
                $this->form_validation->set_message('check', 'No Authorised.');
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('check', 'Invalid email id or password');
            return FALSE;
        }
    }


}