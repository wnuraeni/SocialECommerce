<?php

if(defined('BASEPATH')) exit('no direct access');

class test extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('pegawai_model','',TRUE);
    }

    function index(){
        $pegawai = $this->pegawai_model->get_all();
        $data['pegawai'] = $pegawai;
        $this->load->view('backend/table',$data);

    }
    function add_pegawai(){
        $data['action'] = base_url('admin/test/add_pegawai');
        $this->load->view('backend/form_pegawai',$data);
    }
    function update_pegawai(){

    }
    function delete_pegawai(){
        
    }
}