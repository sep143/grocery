<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Category_model extends CI_Model{
    
    //get category
    public function getAllCategory(){
        $sql = "select * from categories where ParentID=0 and Status=1";
        $data = $this->db->query($sql);
        return $data->result();
    }
    //get category via ID
    public function getCategory($id){
        $sql = "select * from categories where ID=$id and ParentID=0 and Status=1";
        $data = $this->db->query($sql);
        return $data->result();
    }
    
    //get sub category via category id
    public function getSubCategory($id){
        $sql = "select * from categories where ParentID=$id and Status=1";
        $data = $this->db->query($sql, array($id));
        return $data->result();
    }
}