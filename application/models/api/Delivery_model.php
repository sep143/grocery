<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Delivery_model extends CI_Model{
    
    //login username enter then check username
    public function check_username($user){
        $sql = "select Status from delivery_login where Email='$user'";
        $data = $this->db->query($sql, array($user));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    
    //
    public function check($user, $pwd){
        $pwd = md5($pwd);
        $sql = "select * from delivery_login where Email='$user' and Pwd='$pwd' and Status=1";
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
        $this->db->update('delivery_login', array('Token'=>$token, 'LastLogin'=> date('Y-m-d H:i:s')));
        return true;
    }
    
    //after login then view profile
    public function profile_view($id, $token){
        $sql = "select * from delivery_login where ID=? and Token=?";
        $data = $this->db->query($sql, array($id, $token));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
}