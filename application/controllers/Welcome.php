<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->lang->load('sidebarAdmin','english');
    }

    public function index()
    {
        redirect(site_url('admin/login'));
        //$this->load->view('welcome_message');
    }
        
    public function check(){
        $data['view'] = "admin/dashboardAdmin";
        $data['title'] = "Hello dear this title";
        $this->load->view('admin/layoutAdmin', $data);
    }
}
