<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Orders_model extends CI_Model{
    
    
    //get coustomer id to get all orders
    public function get_all_orders($id, $limit, $offset){
//        $sql = "select a.*,b.TxtID as txt_id, b.Amt as real_amt, b.Tax as tax_amt, b.TotalAmt as total_amount, b.CreatedDT as payment_date, "
//                . "c.Address_1 as c_add_1, c.Address_2 as c_add_2, c.City as c_city, c.State as c_state, c.Country as c_country, c.PinCode as c_pin_code, c.ContactNo as c_contact, "
//                . "a.ProductID as p_id, d.Name as p_name, d.Price as p_price, d.Description as p_description, d.Offer as p_offer, d.OfferPrice as p_offer_price,d.OfferExpiredDT as offer_expire_date, "
//                . "d.Quantity as p_quantity, e.Name as brand_name, "
//                . "f.Name as uinit_name "
//                . "from orders a left join payments b on a.ID=b.OrderID "
//                . "left join customer_address c on a.C_Address_ID=c.ID "
//                . "inner join products d on a.ProductID=d.ID "
//                . "inner join brand_list e on e.ID=d.BrandID "
//                . "inner join unit_list f on f.ID=d.UnitID "
//                . "where a.C_ID=$id and a.Status=1 order by a.CreatedDT DESC limit $limit offset $offset";
        $sql = "select a.*,b.TxtID as txt_id, b.Amt as real_amt, b.Tax as tax_amt, b.TotalAmt as total_amount, b.CreatedDT as payment_date "
                . "from orders a inner join payments b on a.ID=b.OrderID "
                . "where a.C_ID=$id and a.Status=1 order by a.CreatedDT DESC limit $limit offset $offset";
        $data = $this->db->query($sql, array($id, $limit, $offset));
        return $data->result();
    }
    
    //get all procudts then get all images products id to get
    public function getProductsImages($id){
        $sql = "select * from products_images where ProductID=$id and Status=1";
        $data = $this->db->query($sql, array($id));
        return $data->result();
    }
    
    //order add then check product quantity
    public function productGetById($product_id){
        $sql = "select * from products where ID=? and Status=1";
        $data = $this->db->query($sql, array($product_id));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    //order add then check unit list in get name
    public function unitGetById($id){
        $sql = "select * from unit_list where ID=?";
        $data = $this->db->query($sql, array($id));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    //order add then check brand list in get name
    public function brandGetById($id){
        $sql = "select * from brand_list where ID=?";
        $data = $this->db->query($sql, array($id));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    //order add then check category in get name
    public function categoryGetById($id){
        $sql = "select * from categories where ID=?";
        $data = $this->db->query($sql, array($id));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    //order add then check category in get name
    public function getOrderAddress($id){
        $sql = "select * from customer_address where ID=?";
        $data = $this->db->query($sql, array($id));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    
    //purchance a product then 
    public function orderAdd($data){
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }
    
    //if edit then check payID null then edit possible otherwise not 
    public function getOrderForEdit($id){
        $sql = "select * from orders where ID=$id";
        $data = $this->db->query($sql, array($id));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    
    //order update
    public function orderUpdate($order_id,$data){
        $this->db->where('ID', $order_id);
        $this->db->update('orders',$data);
        return $order_id;
    }
    
    //order after payment success then add table in data
    public function paymentAdd($data){
        $this->db->insert('payments', $data);
        return $this->db->insert_id();
    }
    
    //
    public function productQuantity($ProductID){
        $sql = "select * from products where ID=$ProductID and Status=1";
        $data = $this->db->query($sql, array($ProductID));
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }
    
    //product table in quantity update subtract result
    public function productQuantityUpdate($ProductID, $updateProduct){
        $this->db->where('ID', $ProductID);
        $this->db->update('products', $updateProduct);
        return true;
    }
    
    //order check then available stoke then time range view
    public function getTimeRange(){
        $sql = "select * from time_range where Status=1";
        $data = $this->db->query($sql);
        return $data->result();
    }
}