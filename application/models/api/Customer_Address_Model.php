<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Customer_Address_Model extends CI_Model{
    
    //get address
    public function get_all_address($cid) {
        $sql = "select * from customer_address where C_ID=?";
        $data = $this->db->query($sql, array($cid));
        return $data->result();
    }
    
    //add address
    public function newAddAddress($data) {
        $this->db->insert('customer_address', $data);
        return true;
    }
    
    //if default set this address then old set default clear then new address set default
    public function default_clear($id) {
        $this->db->where_in('C_ID',$id);
        $this->db->update('customer_address', array('Default'=>0));
        return TRUE;
    }
    
    //update address
    public function updateAddress($add_id, $data){
        $this->db->where('ID', $add_id);
        $this->db->update('customer_address', $data);
        return true;
    }
    
    //address delete
    public function deleteAddress($id,$address_id){
        $this->db->where('ID', $address_id);
        $this->db->where('C_ID', $id);
        $this->db->delete('customer_address');
        return true;
    }
}