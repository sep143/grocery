<?php
defined('BASEPATH')OR exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class AuthController extends REST_Controller{
    public function __construct($config = 'rest') {
        parent::__construct($config);
        //$this->lang->load('api/api_message','english');
        if (is_array($this->response->lang))
        {
            //Accept-Language >> english
          $this->load->language('api/api_message', 'english');
//          $this->load->language('api/api_message', $this->response->lang[0]);
        }
        else
        {
          $this->load->language('api/api_message', $this->response->lang);
        }
        //load model
        $this->load->model('api/Auth_model','Login');
        //$this->load->library('encryption');
        $this->load->library('mailsend');
    }

    /*
     * Signup customer
     */
    public function signup_post(){
        $email = $this->post('email');
        $pwd = $this->post('password');
        $fname = $this->post('first_name');
        $lname = $this->post('last_name');
        $mobile = $this->post('mobile');
        $mobileOtp = rand(100000, 999999);
        $emailOtp = rand(100000, 999999);
        $accountType = $this->post('account_type'); //1=fb, 2=google, 3=normal
        if(!empty($accountType)){
            $accountType = $this->post('account_type');
        }else{
            $accountType = "3";
        }
        $this->form_validation->set_rules('email','Email','xss_clean|trim|valid_email|required|is_unique[customerslogin.Email]');
        $this->form_validation->set_rules('password','Password','xss_clean|required|trim|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('first_name','First Name','xss_clean|required|trim');
        $this->form_validation->set_rules('last_name','Last Name','xss_clean|required|trim');
        $this->form_validation->set_rules('mobile','Mobile','xss_clean|required|trim|min_length[13]|max_length[15]|is_unique[customerslogin.Mobile]');
        if($this->form_validation->run()==FALSE){
            $string_html = validation_errors();
            $description_without = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string_html));
            $description_without = htmlentities($description_without, ENT_QUOTES, "UTF-8");
            $this->response([
                'status'=>false,
                'message'=>$this->lang->line('register_fail'),
                'error'=>$description_without
            ],  REST_Controller::HTTP_OK);
        }else{
            //advertiser profile image upload
            if(($accountType == 1) ||($accountType == 2)){
                $profile = $this->post('profile_image');
                $emailOtp = null;
            }else if($accountType == 3){
               if (!empty($_FILES['profile_image']['name'])) {
                   $path = './uploads/profile/customers/';
                   //unlink($path.$user_profile->Profile);
                    $new_name = time().$_FILES["profile_image"]['name'];
                    $config['file_name'] = $new_name;
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $_FILES['profile_image']['name'];
                    //$config['max_size'] = '100';
                    $config['encrypt_name'] = true;
                    $config['overwrite']     = FALSE; 
                    //$config['max_width']  = '1024';
                    //$config['max_height']  = '768';
                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('profile_image')) {
                        $uploadData = $this->upload->data();
                        $profile = $uploadData['file_name'];
                    } else {
                        $profile = NULL;
                    }
                } else {
                    $profile = NULL;
                } 
            }
            $data = array(
                'Email'=>$email,
                'Pwd'=>md5($pwd),
                'FirstName'=>$fname,
                'LastName'=>$lname,
                'Mobile'=>$mobile,
                'VerifyMobile'=>$mobileOtp,
                'VerifyEmail'=>$emailOtp,
                'AccountType'=>$accountType,
                'ProfilePic'=>$profile,
                //'Token'=>$token
            );
            $done = $this->Login->register_customer($data);
            if($done){
                $key = "Appspunditinfotech2019-".$done.$email.$mobile.date('YmdHisA');
                $token = sha1(sha1($key).sha1($key)).sha1($key).md5($key);
                $this->Login->update_token($done,$token);
                $result_2 = $this->Login->get_customer_data_viaid($done);
                $this->response([
                    'status'=>true,
                    'message'=>$this->lang->line('register_success'),
                    'token'=>$result_2->Token,
                    'id'=>$result_2->ID,
                    'next_api'=>'Verify email and mobile'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=>FALSE,
                    'message'=> $this->lang->line('server_error'),
                    //'insert data'=>$data
                ], REST_Controller::HTTP_OK);
            }
        }
    }
    
    /*
     * Verify otp after signup
     */
    public function verifyOtp_post(){
        $id = $this->post('id');
        $token = $this->post('token');
        $type = $this->post('type'); //1=mobile, 2=email
        $otp = $this->post('otp');
        $result = $this->Login->get_customer_data_viaid($id);
        if($token == $result->Token){
            if($type == 1){
                if($result->VerifyMobile != null){
                    if($otp == $result->VerifyMobile){
                        $update = array(
                            'VerifyMobile'=>NULL
                        );
                        $done = $this->Login->Update_otp($result->ID, $update);
                        if($done){
                            $this->response([
                                'status'=>true,
                                'message'=>'Successfully verify otp. Login account'
                            ],  REST_Controller::HTTP_OK);
                        }
                    }else{
                        $this->response([
                            'status'=>false,
                            'message'=>'Invalid otp'
                        ], REST_Controller::HTTP_OK);
                    }
                }else{
                    $this->response([
                        'status'=>false,
                        'message'=>'Alredy verify mobile no.'
                    ], REST_Controller::HTTP_OK);
                }
            }else if($type == 2){
                if($result->VerifyEmail != null){
                    if($otp == $result->VerifyEmail){
                        $update = array(
                            'VerifyEmail'=>NULL
                        );
                        $done = $this->Login->Update_otp($result->ID, $update);
                        if($done){
                            $this->response([
                                'status'=>true,
                                'message'=>'Successfully verify otp. Login account'
                            ],  REST_Controller::HTTP_OK);
                        }
                    }else{
                        $this->response([
                            'status'=>false,
                            'message'=>'Invalid otp'
                        ], REST_Controller::HTTP_OK);
                    }
                }else{
                    $this->response([
                        'status'=>false,
                        'message'=>'Alredy verify email id'
                    ], REST_Controller::HTTP_OK);
                }
            }else{
                $this->response([
                    'status'=>FALSE,
                    'message'=>'please mention type'
                ], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response([
                'status'=>FALSE,
                'message'=>'Token invalid'
            ], REST_Controller::HTTP_OK);
        }
    }
    
    /*
     * if not verify and otp then resend otp
     */
    public function resendOtpMail_post(){
        $user_name = $this->input->post('user_name');
        if($user_name != ''){
            $result = $this->Login->find_email($user_name); 
            if($result){
                if($result->VerifyEmail != NULL){
                    $otp = rand(100000, 999999);
                    $update = array(
                        'VerifyEmail'=>$otp
                    );
                    $done = $this->Login->Update_otp($result->ID, $update);
                    if($done){
                        //mobile msg send api call
                        $v = $this->mailsend->mobile_otp_send($user_name,$otp);
                        $this->response([
                            'status'=> true,
                            'message' => $this->lang->line('resendOtpEmail_success'),
                            'otp'=>$otp,
                            'msg'=>$v
                        ], REST_Controller::HTTP_OK); 
                    }else{
                        $this->response([
                            'status'=> false,
                            'message' => $this->lang->line('server_error'),
                        ], REST_Controller::HTTP_OK); 
                    }
                    
                }else{
                    $this->response([
                        'status'=> false,
                        'message' => $this->lang->line('resendOtpEmail_verifyAlredy'),
                    ], REST_Controller::HTTP_OK); 
                }
            }else{
               $this->response([
                    'status'=> false,
                    'message' => $this->lang->line('resendOtpEmail_wrong'),
                ], REST_Controller::HTTP_OK); 
            }
            //$this->mailsend->mail_send_otp($otp, $email);
        }else{
            $this->response([
                'status'=> false,
                'message' => $this->lang->line('resendOtpEmail_enter'),
            ], REST_Controller::HTTP_OK);
        }
    }
    
    /*
     * 
     */
    public function resendOtpMobile_post(){
        $user_name = $this->input->post('user_name');
        if($user_name != ''){
            $result = $this->Login->find_mobile($user_name); 
            if($result){
                if($result->VerifyMobile != NULL){
                    $otp = rand(100000, 999999);
                    $update = array(
                        'VerifyMobile'=>$otp
                    );
                    $done = $this->Login->Update_otp($result->ID, $update);
                    if($done){
                        //mobile msg send api call
                        $v = $this->mailsend->mobile_otp_send($user_name,$otp);
                        $this->response([
                            'status'=> true,
                            'message' => $this->lang->line('resendOtpMobile_success'),
                            'otp'=>$otp,
                            'msg'=>$v
                        ], REST_Controller::HTTP_OK); 
                    }else{
                        $this->response([
                            'status'=> false,
                            'message' => $this->lang->line('server_error'),
                        ], REST_Controller::HTTP_OK); 
                    }
                    
                }else{
                    $this->response([
                        'status'=> false,
                        'message' => $this->lang->line('resendOtpMobile_verifyAlredy'),
                    ], REST_Controller::HTTP_OK); 
                }
            }else{
               $this->response([
                    'status'=> false,
                    'message' => $this->lang->line('resendOtpMobile_wrong'),
                ], REST_Controller::HTTP_OK); 
            }
            //$this->mailsend->mail_send_otp($otp, $email);
        }else{
            $this->response([
                'status'=> false,
                'message' => $this->lang->line('resendOtpMobile_enter'),
            ], REST_Controller::HTTP_OK);
        }
    }
    
    /*
     * Login api>> user authentication 
     */
    public function login_post(){
        $user = $this->input->post('username');
        $pwd = $this->input->post('password');
        $type = $this->input->post('type'); //1=mobile, 2=email
        if($user != '' && $pwd != ''){
             //account type 1=FB, 2=Google, 3=Only login via Email and password
            $check_username = $this->Login->check_username($user);
            if($check_username){
                if($check_username->AccountType == 1){
                    $this->response([
                        'status'=> false,
                        'message' => $this->lang->line('fb_login'),
                    ], REST_Controller::HTTP_OK);
                }else if($check_username->AccountType == 2){
                    $this->response([
                        'status'=> false,
                        'message' => $this->lang->line('google_login'),
                    ], REST_Controller::HTTP_OK);
                }else if($check_username->AccountType == 3){
                    $result = $this->Login->check($user, $pwd);
                    if($result){
                        $key = "Appspunditinfotech2019-".$result->ID.$result->UserName.$result->Pwd.date('YmdHisA');
                        $token = sha1(sha1($key).sha1($key)).sha1($key).md5($key);
                        $done = $this->Login->update_token($result->ID,$token);
                        if($type == 1){
                            $mn = $this->Login->find_mobile($user);
                            if($mn){
                                if($mn->VerifyMobile == null){
                                    if($done){
                                        $this->response([
                                            'status'=> TRUE,
                                            'message' => $this->lang->line('login_success'),
                                            'token'=>$token,
                                            'id'=>$result->ID,
                                        ], REST_Controller::HTTP_OK);
                                    }else{
                                        $this->response([
                                            'status'=> TRUE,
                                            'message' => $this->lang->line('login_fail'),
                                            //'token'=>$token,
                                        ], REST_Controller::HTTP_OK);
                                    }
                                }else{
                                    $this->response([
                                        'status'=> TRUE,
                                        'message' => $this->lang->line('login_not_verify_account'),
                                        'next_api'=>'Verify mobile no.',
                                        'id'=>$mn->ID,
                                        'token'=>$mn->Token
                                    ], REST_Controller::HTTP_OK);
                                }
                            }else{
                                $this->response([
                                    'status'=> TRUE,
                                    'message' => $this->lang->line('login_account_notFound'),
                                ], REST_Controller::HTTP_OK);
                            }
                        }else if($type == 2){
                            $em = $this->Login->find_email($user);
                            if($em){
                                if($em->VerifyEmail == null){
                                    if($done){
                                        $this->response([
                                            'status'=> TRUE,
                                            'message' => $this->lang->line('login_success'),
                                            'token'=>$token,
                                            'id'=>$result->ID,
                                        ], REST_Controller::HTTP_OK);
                                    }else{
                                        $this->response([
                                            'status'=> TRUE,
                                            'message' => $this->lang->line('login_fail'),
                                        ], REST_Controller::HTTP_OK);
                                    }
                                }else{
                                    $this->response([
                                        'status'=> TRUE,
                                        'message' => $this->lang->line('login_not_verify_account'),
                                        'next_api'=>'Verify email',
                                        'id'=>$em->ID,
                                        'token'=>$em->Token
                                    ], REST_Controller::HTTP_OK);
                                }
                            }else{
                                $this->response([
                                    'status'=> TRUE,
                                    'message' => $this->lang->line('login_account_notFound'),
                                ], REST_Controller::HTTP_OK);
                            }
                        }else{
                            //if enter user name then dekhenge
                        }
                        
                        
                    }else{
                        $this->response([
                            'status'=> false,
                            'message' => $this->lang->line('enter_valid_auth_pass'),
                        ], REST_Controller::HTTP_OK);
                    }
                    //accountType 3 end condition
                }else{
                    $this->response([
                        'status'=> false,
                        'message' => $this->lang->line('login_error'),
                    ], REST_Controller::HTTP_OK);
                }
            }else{
                $this->response([
                    'status'=> false,
                    'message' => $this->lang->line('enter_valid_auth_email'),
                ], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response([
                'status'=> false,
                'message' => $this->lang->line('enter_username_pass'),
            ], REST_Controller::HTTP_OK);
        }
    }
    
    /*
     * Forget password
     */
    public function forget_post(){
        $type = $this->input->post('type'); //type 1=mobile no, 2= email id
        $user_name = $this->input->post('user_name');
        if($type != '' && $user_name != ''){
            $check_username = $this->Login->check_username($user_name);
            if($check_username->AccountType == 1){
                $this->response([
                    'status'=> false,
                    'message' => $this->lang->line('fb_login'),
                ], REST_Controller::HTTP_OK);
            }else if($check_username->AccountType == 2){
                $this->response([
                    'status'=> false,
                    'message' => $this->lang->line('google_login'),
                ], REST_Controller::HTTP_OK);  
            }else if($check_username->AccountType == 3){
                 //forget mobile 
                if($type == 1){
                    $mn = $this->Login->find_mobile($user_name);
                    if($mn){
                        if($em->VerifyMobile == null){
                            //send msg
                            $this->response([
                                'status'=> TRUE,
                                'message' => $this->lang->line('forget_mobile_success'),
                               // 'token'=>$token,
                            ], REST_Controller::HTTP_OK);
                        }else{
                            $this->response([
                                'status'=> TRUE,
                                'message' => $this->lang->line('login_not_verify_account'),
                                'next_api'=>'Verify email',
                            ], REST_Controller::HTTP_OK);
                        }
                    }else{
                        $this->response([
                            'status'=> TRUE,
                            'message' => $this->lang->line('login_account_notFound'),
                        ], REST_Controller::HTTP_OK);
                    }
                }
                //forget email
                else if($type == 2){
                    $em = $this->Login->find_email($user_name);
                    if($em){
                        if($em->VerifyEmail == null){
                            //send mail
                            $this->response([
                                'status'=> TRUE,
                                'message' => $this->lang->line('forget_email_success'),
                               // 'token'=>$token,
                            ], REST_Controller::HTTP_OK);
                        }else{
                            $this->response([
                                'status'=> TRUE,
                                'message' => $this->lang->line('login_not_verify_account'),
                                'next_api'=>'Verify email',
                            ], REST_Controller::HTTP_OK);
                        }
                    }else{
                        $this->response([
                            'status'=> TRUE,
                            'message' => $this->lang->line('login_account_notFound'),
                        ], REST_Controller::HTTP_OK);
                    }
                }
            }else{
                $this->response([
                    'status'=> false,
                    'message' => $this->lang->line('forget_account_not_found_email'),
                ], REST_Controller::HTTP_OK);
            }
           
        }else{
            $this->response([
                'status'=> false,
                'message' => $this->lang->line('forget_enter_data'),
            ], REST_Controller::HTTP_OK);
        }
    }
    
    /*
     * forget password then send otp and change password
     */
    public function changePasswordVerifyOtp_post(){
        
    }
    
    /*
     * profile get
     */
    public function profile_post(){
        $id = $this->input->post('id');
        $token = $this->input->post('token');
        if($id != '' && $token != ''){
            $result = $this->Login->profile_view($id, $token);
            if($result){
                if($result->ProfilePic!=null && strpos($result->ProfilePic, 'http') === false)
                    $result->ProfilePic = base_url().'uploads/profile/'.$result->ProfilePic;
                $data = array(
                    'id'=>$result->ID,
                    'user_name'=>$result->UserName,
                    'first_name'=>$result->FirstName,
                    'last_name'=>$result->LastName,
                    'mobile_no'=>$result->Mobile,
                    'profile_pic'=>$result->ProfilePic,
                    'account_type'=>$result->AccountType
                );
                $this->response([
                    'status'=> false,
                    'message' => $this->lang->line('profile_success'),
                    'response'=> $data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=> false,
                    'message' => $this->lang->line('profile_invalid'),
                ], REST_Controller::HTTP_OK);
            }
            
        }else{
            $this->response([
                'status'=> false,
                'message' => $this->lang->line('profile_id_error'),
            ], REST_Controller::HTTP_OK);
        }
    }
    
    /*
     * Profile update 
     */
    public function profileUpdate_post() {
        $fname = $this->post('first_name');
        $lname = $this->post('last_name');
        $accountType = $this->post('account_type'); //1=fb, 2=google, 3=normal
        $id = $this->post('id');
        $token = $this->post('token');
        
        $this->form_validation->set_rules('first_name','First Name','xss_clean|required|trim');
        $this->form_validation->set_rules('last_name','Last Name','xss_clean|required|trim');
        if($this->form_validation->run()==false){
            $string_html = validation_errors();
            $description_without = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string_html));
            $description_without = htmlentities($description_without, ENT_QUOTES, "UTF-8");
            $this->response([
                'status'=>false,
                'message'=>$this->lang->line('register_fail'),
                'error'=>$description_without
            ],  REST_Controller::HTTP_OK);
        }else{
            if($id != '' && $token != ''){
                $result = $this->Login->get_customer_data_viaid($id);
                if($result->Token == $token){
                    if(($result->VerifyMobile == null) && ($result->VerifyEmail == null)){
                        //advertiser profile image upload
                        if (!empty($_FILES['profile_image']['name'])) {
                               $path = './uploads/profile/customers/';
                               //unlink($path.$user_profile->Profile);
                            $config['upload_path'] = $path;
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                            $config['file_name'] = $_FILES['profile_image']['name'];
                            //$config['max_size'] = '100';
                            $config['encrypt_name'] = true;
                            $config['overwrite']     = FALSE; 
                            //$config['max_width']  = '1024';
                            //$config['max_height']  = '768';
                            //Load upload library and initialize configuration
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('profile_image')) {
                                $uploadData = $this->upload->data();
                                $profile = $uploadData['file_name'];
                            } else {
                                $profile = $result->ProfilePic;
                            }
                        } else {
                            $profile = $result->ProfilePic;
                        }
                        
                        $updateData = array(
                            'FirstName'=>$fname,
                            'LastName'=>$lname,
                            'ProfilePic'=>$profile,
                            'LastModifiedBy'=>$result->ID,
                            'LastModifiedDT'=>date('Y-m-d H:i:s')
                        );
                        $update_ok = $this->Login->update_customer($id, $updateData);
                        if($update_ok){
                            $this->response([
                                'status'=>true,
                                'message'=>$this->lang->line('profile_update_success'),
                            ], REST_Controller::HTTP_OK);
                        }else{
                            $this->response([
                                'status'=>false,
                                'message'=>  $this->lang->line('server_error'),
                            ], REST_Controller::HTTP_OK);
                        }
                    }else{
                        $this->response([
                            'status'=>false,
                            'message'=>$this->lang->line('profile_verify_account_requre'),
                        ],  REST_Controller::HTTP_OK);
                    }
                }else{
                    $this->response([
                        'status'=>false,
                        'message'=>$this->lang->line('profile_token_invalid'),
                    ],  REST_Controller::HTTP_OK);
                }
            }else{
                $this->response([
                    'status'=>false,
                    'message'=>$this->lang->line('profile_token_id_required'),
                    'error'=>$description_without
                ],  REST_Controller::HTTP_OK);
            }
        }
    }
}