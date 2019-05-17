<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Products_model extends CI_Model {
    
    //get all products store / vender wise >> only active products
    public function getOneVenderProduct($store,$limit, $offset){
        $sql = "select a.*,b.Name as unit_name, c.Name as category_name, d.Name as brand_name from "
                . "products a inner join unit_list b on a.UnitID=b.ID "
                . "inner join categories c on c.ID=a.CategoryID "
                . "inner join brand_list d on d.ID=a.BrandID "
                . "where a.StoreID=$store and a.Status=1 limit $limit OFFSET $offset ";
        $data = $this->db->query($sql, array($store,$limit, $offset));
        return $data->result();
    }
    //get all products all store >> only active products
    public function getAllProductsWIthAllVender($limit, $offset){
        $sql = "select a.*,b.Name as unit_name, c.Name as category_name, d.Name as brand_name from "
                . "products a inner join unit_list b on a.UnitID=b.ID "
                . "inner join categories c on c.ID=a.CategoryID "
                . "inner join brand_list d on d.ID=a.BrandID "
                . "where a.Status=1 limit $limit OFFSET $offset ";
        $data = $this->db->query($sql, array($limit, $offset));
        return $data->result();
    }
    
    //get all procudts then get all images products id to get
    public function getProductsImages($id){
        $sql = "select * from products_images where ProductID=$id and Status=1";
        $data = $this->db->query($sql, array($id));
        return $data->result();
    }
}