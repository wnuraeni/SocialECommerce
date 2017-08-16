<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

if(!defined('BASEPATH')) exit ('No direct script allowed');

   class usermodel extends CI_Model{

       function __construct() {
           parent::__construct();
       }


   function addUser($user){

       $res = $this->db->insert('user',$user);
       $id = $this->db->insert_id();
       return $id;
   }
//   function addUserInfo($datadb){
//       $this->db->insert('userinfo',$datadb);
//   }
   function updateUser($id=NULL,$data=NULL){
       $this->db->where('id_user',$id);
       $id = $this->db->update('user',$data);
           if($id){
               return TRUE;

           }
           else{
               return FALSE;
           }
       }

//   function updateUserInfo($id=NULL, $data=NULL){
//       $this->db->where('id_user',$id);
//       $id = $this->db->update('userinfo',$data);
//       if($id){
//           return TRUE;
//       }
//       else{
//           return FALSE;
//       }
//   }

   function deleteUser($where=NULL){
       if($this->db->delete('user',$where)){
           return true;
       }
       else{
           return false;
       }

   }

   function getAll($where=null){
   $this->db->select('*');
       $this->db->from('user');
       if(!empty($where)){
           $this->db->where($where);
       }
       $query = $this->db->get();
       $result = $query->result();
       return $result;
   }
   function getUser($where=null){
       $this->db->select('*');
       $this->db->from('user');
       $this->db->where($where);
       $query = $this->db->get();
       $result = $query->row();
       return $result;
   }

//   function getUserInfo($where=null){
//       $this->db->select('*');
//       $this->db->from('userinfo');
//       $this->db->where($where);
//       $query = $this->db->get();
//       $result = $query->row();
//       return $result;
//   }

   function userActivity($data){
       $this->db->insert('activity',$data);
   }


   function search($keyword){
       $this->db->select('*');
       $this->db->from('user');
//       $this->db->join('userinfo','user.id_user = userinfo.id_user','left');
       $this->db->like('username',$keyword);
       $query = $this->db->get();
       return $query->result();
   }

   function getActivity($where=null,$status=null){
       $this->db->select('*');
       $this->db->from('activity');
       $this->db->join('product','activity.id_product=product.id_product');
       $this->db->join('product_media','product.id_product=product_media.id_product AND product_media.as_default = 1','left');
       $this->db->join('user','activity.id_user=user.id_user');
//       $this->db->join('userinfo','user.id_user=userinfo.id_user');
       if(!empty($where)){
           $this->db->where($where);
       }
	  if($status=="homepage"){
		$this->db->group_by('activity.id_product');
		$this->db->order_by('activity.date','DESC');
	  }
       $query = $this->db->get();
      // echo $this->db->last_query();
       $result = $query->result();
       return $result;
   }

}