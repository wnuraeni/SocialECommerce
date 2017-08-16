<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class Category_Model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_all($where=null){
        $this->db->select('*');
        $this->db->from('categories');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function get_category($where=null){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function add_category($data=null){
        if($this->db->insert('categories',$data))
            return TRUE;
        else
            return FALSE;
    }
    function update_category($id=null,$data=null){
        $this->db->where('id_category',$id);
        if($this->db->update('categories',$data))
            return TRUE;
        else
            return FALSE;
    }
    function delete_category($where=null){
        if($this->db->delete('categories',$where))
                return TRUE;
        else
                return FALSE;
    }
}