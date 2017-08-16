<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class Product_Model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
     function add_product($data=null){
        if($this->db->insert('products',$data))
                return $this->db->insert_id();
        else
            return FALSE;
    }
    function update_product($id=null,$data=null){
        $this->db->where('id_product',$id);
        $id = $this->db->update('products',$data);
        if($id)
            return TRUE;
        else
            return FALSE;
    }
    function delete_product($where=null){
        $del = ($this->db->delete('products',$where));
        if ($del)
            return TRUE;
        else
            return FALSE;
    }
    function get_all($where=null,$orderby=null,$limit=null,$offset=null){
        $this->db->select(
                'products.id_product,
                products.id_category,
                products.id_brand,
                products.product_code,
                products.product_name,
                products.description,
                products.price,
                products.stock,
                products.date_added,
                product_media.id_product_media,
                product_media.media_url,
                product_media.alt,
                product_media.as_default,
                categories.category_name,
                brand.brand_name
                ');
        $this->db->from('products');
        $this->db->join('categories','products.id_category=categories.id_category');
        $this->db->join('brand','products.id_brand=brand.id_brand','left');
        $this->db->join('product_media','products.id_product=product_media.id_product AND product_media.as_default = 1','left');
        if(!empty($where))
            $this->db->where($where);
        if(!empty($orderby))
            $this->db->order_by($orderby[0],$orderby[1]);
        if(!empty($limit) || !empty($offset))
            $this->db->limit($limit,$offset);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function get_product($where=null){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('product_media','products.id_product=product_media.id_product AND product_media.as_default = 1','left');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function get_totalproduct($where=null){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories','products.id_category=categories.id_category');
        if(!empty($where))
            $this->db->where($where);

        $total =  $this->db->count_all_results();
        return $total;
    }
     function get_product_rating(){
         $q1 = $this->db->get('products');
         $res = $q1->result();
         $rating = array();
         foreach($res as $r){
             $rating[$r->id_product]=0;
         }
         
         $this->db->select('id_product,COUNT(id_product) as jml_vote,SUM(rating) as total_vote');
         $this->db->from('product_rating');
         $this->db->group_by('id_product');
         $query=$this->db->get();
         $result = $query->result();
         
         foreach($result as $r){
             $rating[$r->id_product] = $r->total_vote / $r->jml_vote;
         }
         return $rating;
    }
    function get_all_media($where=null){
        $this->db->select('*');
        $this->db->from('product_media');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function get_media($where=null){
        $this->db->select('*');
        $this->db->from('product_media');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function add_media($data=null){
        if ($data['as_default'] == 1){
            $this->db->where(array('id_product'=>$data['id_product']));
            $this->db->update('product_media',array('as_default'=>0));
        }
        if($this->db->insert('product_media',$data)){
                return $this->db->insert_id();
        }
        else
            return FALSE;
    }
    function update_media($id=null,$data=null){
        if ($data['as_default'] == 1){
            $this->db->where(array('id_product'=>$data['id_product']));
            $this->db->update('product_media',array('as_default'=>0));
        }
        $this->db->where('id_product_media',$id);
        $id = $this->db->update('product_media',$data);
        if($id)
            return TRUE;
        else
            return FALSE;
    }
    function delete_media($where=null){
        $del = ($this->db->delete('product_media',$where));
        if ($del)
            return TRUE;
        else
            return FALSE;
    }
    function isVote($id_product=null,$id_user=null){
        $query = $this->db->get_where('product_rating', array('id_product' => $id_product,'id_user'=>$id_user));
        $total = $query->num_rows();

        if($total > 0)
            return 1;
        else
            return 0;
    }
    function add_rating($data=null){
        $this->db->insert('product_rating',$data);
        $id=$this->db->insert_id();
        return $id;
    }
    function get_rating($id_product=null){
        $query = $this->db->query(
                "SELECT SUM( rating ) AS total_rating, COUNT( id_product ) AS total_voter
                FROM `product_rating`
                GROUP BY id_product = '".$id_product."'
                ");
        $result = $query->row();
        return $result;
    }
    function get_all_rating_product(){
        $query = $this->db->query(
                "SELECT product_name,products.id_product,price,media_url,
                SUM( rating ) AS total_rating, COUNT(product_rating.id_product ) AS total_voter
                FROM `product_rating`
                JOIN products ON products.id_product = product_rating.id_product
                JOIN product_media ON products.id_product = product_media.id_product AND as_default = '1'
                GROUP BY id_product
                ORDER BY total_rating DESC
                ");
        $result = $query->result();
        return $result;
    }
    function favorite($data=null){
        $this->db->insert('product_favorite',$data);
    }
    function get_recommend(){
        $query = $this->db->query("SELECT * FROM social_activity
                                   JOIN products ON social_activity.id_product = products.id_product
                                   JOIN product_media ON products.id_product = product_media.id_product AND as_default=1
                                   GROUP BY products.id_product
                                   ORDER BY date DESC");
        $result = $query->result();
        return $result;

    }

    function get_penjualan_product($where=null){
        $query = $this->db->query("
            SELECT
            orders.id_order, orders.id_user,date_ordered,total_item,
            products.id_product, SUM(order_detail.subtotal_item) as sold_total,
            subtotal_item,
            product_name,media_url,
            (SELECT COUNT( id_social_activity ) AS total_share
            FROM  `social_activity`
            WHERE social_activity.id_product = products.id_product AND type='Share'
            ) as total_share,
            (SELECT COUNT( id_social_activity ) AS total_share
            FROM  `social_activity`
            WHERE social_activity.id_product = products.id_product AND type='Like'
            ) as total_like
            FROM `orders`
            JOIN order_detail ON orders.id_order = order_detail.id_order
            JOIN products ON order_detail.id_product = products.id_product
            JOIN product_media ON products.id_product = product_media.id_product
            AND as_default='1'
            WHERE ".$where."
            GROUP BY order_detail.id_product
                    ");
         $result = $query->result();
         $data = array();
         foreach($result as $val){
             $data[] = array(
                 "product_name"=>$val->product_name,
                 "url_product"=>$val->media_url,
                 "sold_item"=>$val->sold_total,
                 "total_share"=>$val->total_share,
                 "total_like"=>$val->total_like);
         }
         return json_encode($data);
    }

    function get_penjualan_graph(){
        $share = $this->db->query("
            SELECT COUNT(id_social_activity) as total_share, MONTH(date) as month, YEAR(date) as year
            FROM `social_activity`
            WHERE type = 'Share'  GROUP BY YEAR(date),MONTH(date)
            ");
        $res_share = $share->result();
        $like = $this->db->query("
            SELECT COUNT(id_social_activity) as total_like, MONTH(date) as month, YEAR(date) as year
            FROM `social_activity`
            WHERE type = 'Like'  GROUP BY YEAR(date),MONTH(date)
            ");
        $res_like = $like->result();
        $result = array('share'=>$res_share,'like'=>$res_like);
        return $result;
    }

    function get_mostActivity($type=null){
        $query = $this->db->query("
                SELECT  product_name,products.id_product,price,
                COUNT(id_social_activity) as total,media_url
                FROM `social_activity`
                JOIN products ON products.id_product = social_activity.id_product
                JOIN product_media ON product_media.id_product = social_activity.id_product AND as_default = 1
                WHERE type='$type'
                GROUP BY id_product
                ORDER BY total DESC");
        $result = $query->result();
        return $result;
    }
    function get_mostActiveUser(){
         $query = $this->db->query("
                SELECT user_info.id_user, firstname, lastname, profile_pic,
                SUM(case when type ='Share' then 1 else 0 end) totalshare,
                SUM(case when type = 'Like' then 1 else 0 end) totallike
                FROM `social_activity`
                JOIN user_info ON social_activity.id_user = user_info.id_user
                GROUP BY id_user");
        $result = $query->result();
        return $result;
    }
}

