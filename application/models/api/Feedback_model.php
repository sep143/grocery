<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Feedback_model extends CI_Model{
    
    //add store feedback
    public function add_store_feedback($data){
        $this->db->insert('feedback_store', $data);
        return true;
    }
    
    //add delivery boy feedback
    public function add_deliveryBoy_feedback($data){
        $this->db->insert('feedback_delivery', $data);
        return true;
    }
    
    //get single store feedback >>active only
    public function getStoreFeedback($store_id, $limit, $offset){
        $sql = "select * from feedback_store where StoreID=$store_id and Status=1 limit $limit offset $offset";
        $data = $this->db->query($sql, array($store_id, $limit, $offset));
        return $data->result();
    }
    //get all store feedback >>active only
    public function getAllStoreFeedback($limit, $offset){
        $sql = "select * from feedback_store where Status=1 limit $limit offset $offset";
        $data = $this->db->query($sql, array($limit, $offset));
        return $data->result();
    }
    //get all delivery boy feedback >>active only
    public function getDeliveryBoyFeedback($delivery, $limit, $offset){
        $sql = "select * from feedback_delivery where BoyID=$delivery and Status=1 limit $limit offset $offset";
        $data = $this->db->query($sql, array($delivery, $limit, $offset));
        return $data->result();
    }
    //get all delivery boy feedback >>active only
    public function getAllDeliveryBoyFeedback($limit, $offset){
        $sql = "select * from feedback_delivery where Status=1 limit $limit offset $offset";
        $data = $this->db->query($sql, array($limit, $offset));
        return $data->result();
    }
}