<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Brands_model extends CI_Model{
    
    /**
     * @ADD NEW BRAND
     */
    public function add ($data){
        $this->db->insert('brand_list', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
        // return true;
    }

    public function update($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('brand_list', $data); 
            return ($this->db->affected_rows() != 1) ? false : true;
        }
    }

    /**
     * @BRAND EXIST OR/NOT
     */ 
    
    public function is_exists ($brand) {
        
        $query = $this->db->get_where('brand_list', array('Name' => $brand));
        if ($query->num_rows() > 0 ) {

            return true;

        } else {
            
            return false;
        }
        
    }
    
    public function get_brands ($id = null ) {
        $this->db->select()->from('brand_list');
        if ($id != null) {
            $this->db->where('brand_list.id', $id);
        } else {
            $this->db->order_by('brand_list.id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row(); 
        } else {
            return $query->result_array(); 
        }
    }



    public function remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('brand_list');
    }



    // public function add($data) {
    //     if (isset($data['id'])) {
    //         $this->db->where('id', $data['id']);
    //         $this->db->update('vehicles', $data); 
    //     } else {
    //         $this->db->insert('vehicles', $data); 
    //         return $this->db->insert_id();
    //     }
    // }
    
}