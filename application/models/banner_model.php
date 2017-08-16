<?php
if(!defined('BASEPATH')) exit('No direc script');

class Banner_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    function get_all($where=null){
        $this->db->select('*');
        $this->db->from('banners');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function get_banner($where=null){
        $this->db->select('*');
        $this->db->from('banners');
        if(!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function add_banner($data=null){
        $this->db->insert('banners',$data);
        $id=$this->db->insert_id();
        if($id)
            return $id;
        else
            return FALSE;
    }
    function update_banner($id=null,$data=null){
        $this->db->where('id_banner',$id);
        if($this->db->update('banners',$data))
                return true;
        else
                return false;
    }
    function delete_banner($where=null){
        if($this->db->delete('banners',$where))
            return true;
        else
            return false;
    }
}
