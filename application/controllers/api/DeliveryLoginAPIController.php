<?php
defined('BASEPATH')OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class DeliveryLoginAPIController extends REST_Controller {
    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->lang->load('api/api_message','english');
        //load model
        $this->load->model('api/Delivery_model','Login');
        //$this->load->library('encryption');
        $this->load->library('mailsend');
    }
    
    /*
     * Login api>> user authentication 
     */
    public function login_post(){
        $user = $this->input->post('username');
        $pwd = $this->input->post('password');
        //$type = $this->input->post('type'); //1=mobile, 2=email
        if($user != '' && $pwd != ''){
            $check_username = $this->Login->check_username($user);
            if($check_username){
                if($check_username->Status == 1){
                    $result = $this->Login->check($user, $pwd);
                    if($result){
                        $key = "Appspunditinfotech2019-".$result->ID.$result->Email.$result->Pwd.date('YmdHisA');
                        $token = sha1(sha1($key).sha1($key)).sha1($key).md5($key);
                        $done = $this->Login->update_token($result->ID,$token);
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
                            'status'=> false,
//                            'message' => $this->lang->line('delivery_login_wrong'),
                            'message' => $this->lang->line('enter_valid_auth_pass'),
                        ], REST_Controller::HTTP_OK);
                    }
                }else{
                   $this->response([
                        'status'=> false,
                        'message' => $this->lang->line('delivery_login_admin_inactive'),
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
     * profile get
     */
    public function profile_post(){
        $id = $this->input->post('id');
        $token = $this->input->post('token');
        if($id != '' && $token != ''){
            $result = $this->Login->profile_view($id, $token);
            if($result){
                if($result->ProfilePic!=null && strpos($result->ProfilePic, 'http') === false)
                    $result->ProfilePic = base_url().'uploads/profile/delivery/'.$result->ProfilePic;
                $data = array(
                    'id'=>$result->ID,
                    'email'=>$result->Email,
                    'first_name'=>$result->FirstName,
                    'last_name'=>$result->LastName,
                    'mobile_no'=>$result->Mobile,
                    'profile_pic'=>$result->ProfilePic,
                    'address_1'=>$result->Address1,
                    'address_2'=>$result->Address2,
                    'city'=>$result->City,
                    'state'=>$result->State,
                    'country'=>$result->Country,
                    'pin_code'=>$result->PinCode,
                    'online_status'=>$result->Online,
                    'create_date'=>$result->CreatedDT,
                    'modified_date'=>$result->LastModifiedDT,
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