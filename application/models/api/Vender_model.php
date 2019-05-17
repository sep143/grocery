<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Vender_model extends CI_Model{
    
    //get all store data via db
    public function getAllStore($limit, $offset){
        $sql = "select * from vender_login where Status=1 limit $limit offset $offset";
        $data = $this->db->query($sql, array($limit, $offset));
        return $data->result();
    }
    //get one store data via db >>get by id
    public function getOneStore($store,$limit, $offset){
        $sql = "select * from vender_login where ID=$store and Status=1 limit $limit offset $offset";
        $data = $this->db->query($sql, array($store, $limit, $offset));
        return $data->result();
    }
    
    //all store get then include feedback
    public function getAllFeedbackStore($id){
        $sql = "select * from feedback_store where Status=1 and StoreID=$id";
        $data = $this->db->query($sql, array($id));
        return $data->result();
    }
    //all store get then include feedback
    public function getAllFeedbackStoreAvg($id){
        $sql = "select avg(Rating) as avg_rating from feedback_store where Status=1 and StoreID=$id";
        $data = $this->db->query($sql, array($id));
        return $data->row();
    }
}