<?php
if(!defined('BASEPATH')) exit('No direct script');

class Review_Model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     function get_all($where=null){
        $this->db->select('
                product_review.id_user,
                product_review.id_product,
                product_review.id_product_review,
                product_review.review,
                product_review.date_added,
                products.product_name,
                users.username,
                user_info.profile_pic
            ');
        $this->db->from('product_review');
        $this->db->join('products','product_review.id_product = products.id_product');
        $this->db->join('users','users.id=product_review.id_user','left');
        $this->db->join('user_info','user_info.id_user=product_review.id_user','left');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function get_review($where=null){
        $this->db->select('*');
        $this->db->from('product_review');
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function add_review($data=null){
        if($this->db->insert('product_review',$data))
            return TRUE;
        else
            return FALSE;
    }
    function update_review($id=null,$data=null){
        $this->db->where('id_product_review',$id);
        if($this->db->update('product_review',$data))
            return TRUE;
        else
            return FALSE;
    }
    function delete_review($where=null){
        if($this->db->delete('product_review',$where))
                return TRUE;
        else
                return FALSE;
    }
}
?>
