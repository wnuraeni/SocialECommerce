<?php
if (defined('BASEPATH')) exit('No direct');

class pegawai_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    function get_all($where=null){
        $this->db->select('*');
        $this->db->from('pegawai');
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}

?>