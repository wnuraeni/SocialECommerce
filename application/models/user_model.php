<?php

if(!defined('BASEPATH')) exit('No direct access');

class User_Model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_all_user($where=null){
       // echo 'check user existence<br>';
        $this->db->select('*');
        $this->db->from('users');
        //$this->db->join('');
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function get_user($where=null){
       // echo 'check user existence<br>';
        $this->db->select('*');
        $this->db->from('users');
        //$this->db->join('');
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function get_userinfo($where=null){
         $this->db->select('*');
        $this->db->from('user_info');
        if(!empty($where)){
            $this->db->where($where);
        }
       
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function add_user($datadb){
        $user = $datadb[0];
        $res = $this->db->insert('users',$user);
        $id = $this->db->insert_id();
        $added_data = array('id_user'=>$id);

        if(!empty($datadb[1])){
            $data_merge = array_merge($datadb[1], $added_data);
            $res2 = $this->db->insert('user_info',$data_merge);
        }
        if($res || $res2)
            return true;
        else
            return false;
        
    }
    function update_user($id=null,$data=null){
        $this->db->where('id',$id);
        $id = $this->db->update('users',$data);
        if($id)
            return TRUE;
        else
            return FALSE;
    }
    function activity($data){
        $this->db->insert('social_activity',$data);
    }
    function get_activity($where=null){
        $this->db->select('*');
        $this->db->from('social_activity');
        $this->db->join('products','social_activity.id_product = products.id_product');
        $this->db->join('product_media','products.id_product = product_media.id_product AND product_media.as_default = 1','left');
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function get_favorite_product($where=null){
   $this->db->select('*');
        $this->db->from('product_favorite');
        $this->db->join('products','product_favorite.id_product = products.id_product');
        $this->db->join('product_media','products.id_product = product_media.id_product AND product_media.as_default = 1','left');
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function search($keyword){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_info','users.id = user_info.id_user','left');
        $this->db->like('username',$keyword);
        $query = $this->db->get();
        return $query->result();
    }
}
