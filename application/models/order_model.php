<?php
if(!defined('BASEPATH')) exit('No direct');

class Order_Model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_order($where=null){
        $this->db->select('*');
        $this->db->from('orders');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function get_allorder($where=null){
        $this->db->select('*');
        $this->db->from('orders');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function get_detail($no_order=null){
        $where = array('orders.order_no'=>$no_order);
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_detail','orders.id_order=order_detail.id_order');
        $this->db->join('products','products.id_product=order_detail.id_product');
        $this->db->join('users','users.id = orders.id_user');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function add_order($order=null,$order_detail=null){
        //insert order
        $this->db->insert('orders',$order);
        $id_order = $this->db->insert_id();

        $this->db->where(array('id_order'=>$id_order));
        $data = array('order_no'=>date('Ymd').$id_order);
        $this->db->update('orders',$data);

        //insert order detail
        $detail = array();
        foreach($order_detail as $o){
            array_push($detail, array(
                'id_order'=>$id_order,
                'id_product'=>$o['id'],
                'subtotal_item'=>$o['qty'],
                'subtotal_price'=>$o['subtotal']
            ));
        }
        $this->db->insert_batch('order_detail',$detail);

        return $id_order;
    }

    function add_shipment($data){
        $this->db->insert('shipment_detail',$data);
        $id_shipment = $this->db->insert_id();
        return $id_shipment;
    }
    function update_order($no_order,$data){
        $this->db->where('order_no',$no_order);
        $this->db->update('orders',$data);
    }
    function getsales_bymonth($where=null){
        $grafik_data = array();
        
        //sales data
        $query = $this->db->query("SELECT MONTH(date_ordered) as month , SUM(total_item) as total FROM `orders` WHERE `date_ordered` ".$where." GROUP BY MONTH(date_ordered)");
        $result = $query->result();
        $tmp = array();
        for($i=1;$i<=12;$i++){
            $tmp[] = array($i,100);
        }
        foreach($result as $res){
            $tmp[$res->month - 1] = array(intval($res->month),intval($res->total*100));
        }
        $grafik_data[] = array("label"=>"Sales","data"=>$tmp,"color"=>"#a6d87a");
       


        //activites data
        $query2 = $this->db->query("SELECT MONTH(date) as month , COUNT(id_social_activity) as total FROM `social_activity` WHERE `date` ".$where." GROUP BY MONTH(date)");
        $result2 = $query2->result();

        $tmp2 = array();
        for($i=1;$i<=12;$i++){
            $tmp2[] = array($i,100);
        }
        foreach($result2 as $res){
            $tmp2[$res->month - 1] = array(intval($res->month),intval($res->total*100));
        }
        $grafik_data[] = array("label"=>"Activity","data"=>$tmp2,"color"=>"#282828");

        return json_encode($grafik_data);
    }
}