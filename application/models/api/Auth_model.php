<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Auth_model extends CI_Model{
    
    //Register cutomer
    public function register_customer($data){
        $this->db->insert('customerslogin', $data);
        return $this->db->insert_id(); 
    }
    //get data via id for customer
    public function get_customer_data_viaid($id){
        $sql = "select * from customerslogin where ID=?";
        $data = $this->db->query($sql, array($id));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }

    //login username enter then check username
    public function check_username($user){
        $sql = "select AccountType from customerslogin where (UserName='$user' or Email='$user' or Mobile='$user' )";
        $data = $this->db->query($sql, array($user));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }

    public function check($user, $pwd){
        $pwd = md5($pwd);
        $sql = "select * from customerslogin where (UserName='$user' or Email='$user' or Mobile='$user') and Pwd='$pwd'";
        $data = $this->db->query($sql, array($user, $pwd));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    
    //update token
    public function update_token($id,$token){
        $this->db->where('ID', $id);
        $this->db->update('customerslogin', array('Token'=>$token, 'LastLogin'=> date('Y-m-d H:i:s')));
        return true;
    }
    
    //after login then view profile
    public function profile_view($id, $token){
        $sql = "select * from customerslogin where ID=? and Token=?";
        $data = $this->db->query($sql, array($id, $token));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    
    //profile update
    public function update_customer($id, $updateData){
        $this->db->where('ID', $id);
        $this->db->update('customerslogin', $updateData);
        return true;
    }


    //resend otp then check username then send otp
    public function find_email($userName){
        $sql = "select * from customerslogin where Email=?";
        $data = $this->db->query($sql, array($userName));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    
    //resend otp then find mobile no
    public function find_mobile($userName){
        $sql = "select * from customerslogin where Mobile=?";
        $data = $this->db->query($sql, array($userName));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    
    //update otp
    public function Update_otp($id, $otp){
        $this->db->where('ID', $id);
        $this->db->update('customerslogin', $otp);
        return true;
    }
}