<?php
if(!defined('BASEPATH')) exit('No direct script');

class productmodel extends CI_Model{

    function __construct() {
        parent::__construct();
    }


    function addProduct($data=NULL){
        if($this->db->insert('product',$data)){
            return $this->db->insert_id();
        }
        else{
            return false;
        }
    }

    function addMedia($data = NULL){
        if($data['as_default'] == 1){
            $this->db->where(array('id_product' => $data['id_product']));
            $this->db->update('product_media',array('as_default'=>0));
        }
        if($this->db->insert('product_media',$data)){
            return $this->db->insert_id();
        }
        else{
            return false;
        }
    }

    function addRating($data=null){
        $this->db->insert('rating',$data);
        $id = $this->db->insert_id();
        return $id;
    }

    function getRating($id_product=NULL){
        $query = $this->db->query("SELECT SUM( rate ) AS total_rating, COUNT( id_product ) AS total_voter"
                . " FROM rating"
                . " GROUP BY id_product = '".$id_product."'");
        $result = $query->row();
        return $result;
    }

    function isVote($id_product, $id_user){
        $query = $this->db->get_where('rating',array('id_product' => $id_product, 'id_user' => $id_user));
        $total = $query->num_rows();
        if($total>0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function updateProduct($id=NULL,$data=NULL){
        $this->db->where('id_product',$id);
        $id = $this->db->update('product',$data);
        if($id)
            return TRUE;
        else
            return FALSE;

    }

    function updateMedia($id=NULL,$data=NULL){
        $this->db->where('id_media',$id);
        $id = $this->db->update('product_media',$data);
        if($id){
            return TRUE;

        }
        else{
            return FALSE;
        }

    }

    function deleteProduct($where=NULL){
        if($this->db->delete('product',$where)){
            return true;
        }
        else{
            return false;
        }

    }

    function deleteMedia($where=NULL){
        if($this->db->delete('product_media',$where)){
            return true;
        }
        else{
            return false;
        }
    }

    function getAll($where = null, $orderby=null, $limit=null, $offset=null){

        $this->db->select('product.id_product,'
                . 'product.id_category,'
                . 'product.id_brand,'
                . 'product.product_name,'
                . 'product.product_description,'
                . 'product.price,'
                . 'product.stock,'
                . 'product.date_added,'
                . 'product.product_code,'
                . 'product_media.id_media,'
                . 'product_media.url_product,'
                . 'product_media.alternative,'
                . 'product_media.as_default,'
                . 'brand.brand_name,'
                . 'categories.category_name'
                );
        $this->db->from('product');
        $this->db->join('categories','product.id_category=categories.id_category');
        $this->db->join('brand','product.id_brand = brand.id_brand','left');
        $this->db->join('product_media','product.id_product=product_media.id_product AND product_media.as_default = 1','left');
        if(!empty($where)){
            $this->db->where($where);
        }
        if(!empty($orderby)){
            $this->db->order_by($orderby[0],$orderby[1]);
        }
        if(!empty($limit) || !empty($offset)){
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getProductRating(){
        $q1 = $this->db->get('product');
        $res = $q1->result();
        $rating = array();
        foreach($res as $r){
            $rating[$r->id_product] = 0;
        }
        $this->db->select('id_product,COUNT(id_product) as jmlVote,SUM(rate) as totalVote');
        $this->db->from('rating');
        $this->db->group_by('id_product');
        $query = $this->db->get();
        $result = $query->result();

        foreach($result as $r){
            $rating[$r->id_product] = $r->totalVote/$r->jmlVote;
        }
        return $rating;
    }

    function getProduct($where = null){

        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('product_media','product.id_product=product_media.id_product AND product_media.as_default = 1','left');
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function getAllMedia($where = null){
        $this->db->select('*');
        $this->db->from('product_media');
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getMedia($where = null){
        $this->db->select('*');
        $this->db->from('product_media');
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function getTotalProduct($where = null){
        $this->db->select('*');
        $this->db->from('product');
         $this->db->join('categories','product.id_category=categories.id_category');
        if(!empty($where)){
            $this->db->where($where);
        }
        $total = $this->db->count_all_results();
        return $total;
    }

    function favorit($data = null){
        $this->db->insert('favorite',$data);
    }

    function getFavoriteProduct($where = null){
       $this->db->select('*');
       $this->db->from('favorite');
       $this->db->join('product','favorite.id_product=product.id_product');
       $this->db->join('product_media','product.id_product=product_media.id_product AND product_media.as_default = 1','left');
       if(!empty($where)){
           $this->db->where($where);
       }
       $query = $this->db->get();
       //echo $this->db->last_query();
       $result = $query->result();
       return $result;
    }
        function getPenjualanProduct($where=null){
        $query = $this->db->query("
            SELECT
            order.id_order, order.id_user,date_ordered,total_item,
            product.id_product, SUM(order_detail.total_sub_item) as sold_total,
            total_sub_item,
            product_name,url_product,
            (SELECT COUNT( id_activity ) AS total_share
            FROM  `activity`
            WHERE activity.id_product = product.id_product AND type='Share'
            ) as total_share,
            (SELECT COUNT( id_activity ) AS total_share
            FROM  `activity`
            WHERE activity.id_product = product.id_product AND type='Like'
            ) as total_like
            FROM `order`
            JOIN order_detail ON order.id_order = order_detail.id_order
            JOIN product ON order_detail.id_product = product.id_product
            JOIN product_media ON product.id_product = product_media.id_product
            AND as_default='1'
            WHERE ".$where."
            GROUP BY order_detail.id_product
                    ");
         $result = $query->result();
         $data = array();
         foreach($result as $val){
             $data[] = array(
                 "product_name"=>$val->product_name,
                 "url_product"=>$val->url_product,
                 "sold_item"=>$val->sold_total,
                 "total_share"=>$val->total_share,
                 "total_like"=>$val->total_like);
         }
         return json_encode($data);
    }
   
    function getPenjualanGraph(){
        $share = $this->db->query("
            SELECT COUNT(id_activity) as total_share, MONTH(date) as month, YEAR(date) as year
            FROM `activity`
            WHERE type = 'Share'  GROUP BY YEAR(date),MONTH(date)
            ");
        $res_share = $share->result();
        $like = $this->db->query("
            SELECT COUNT(id_activity) as total_like, MONTH(date) as month, YEAR(date) as year
            FROM `activity`
            WHERE type = 'Like'  GROUP BY YEAR(date),MONTH(date)
            ");
        $res_like = $like->result();
        $result = array('share'=>$res_share,'like'=>$res_like);
        return $result;
    }
    
    function getMostActivity($type=null){
        $query = $this->db->query("
                SELECT  product_name,products.id_product,price,
                COUNT(id_activity) as total,url_product
                FROM `activity`
                JOIN product ON product.id_product = activity.id_product
                JOIN product_media ON product_media.id_product = activity.id_product AND as_default = 1
                WHERE type='$type'
                GROUP BY id_product
                ORDER BY total DESC");
        $result = $query->result();
        return $result;
    }

        function getMostActiveUser(){
            $query = $this->db->query("
                   SELECT id_user,product_name,product.id_product,price,
                   COUNT(id_activity) as total,url_product
                   FROM `activity`
                   JOIN product ON product.id_product = activity.id_product
                   JOIN product_media ON product_media.id_product = activity.id_product AND as_default = 1
                   GROUP BY id_user
                   ORDER BY total DESC");
        $result = $query->result();
        return $result;
    }
}
