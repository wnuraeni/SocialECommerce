<?php
//Admin Controller
if(!defined('BASEPATH')) exit('No direct script allowed');

class Account extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('user_model','',TRUE);
    }
    function login(){
        
        //validasi form
//        if($this->input->post()){
            //checking user exist or not
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $res = $this->user_model->get_user(array('username'=>$username,'password'=>md5($password),'level'=>1));
            if(!empty($res)){
                $this->session->set_userdata('isAdmin',TRUE);
                echo json_encode(array("response"=>"success"));
//                redirect(base_url('admin/index'));
            }
            else{
                $this->session->set_flashdata('message','User not exist');
                 echo json_encode(array("response"=>"failed"));
//                redirect(base_url('admin/index'));
            }
//        }
        
//        $this->load->view('backend/login_form');
    }
   
   
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('admin/index'));
    }
}

