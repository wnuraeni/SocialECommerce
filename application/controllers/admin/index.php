<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class Index extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('product_model','',TRUE);
    }

    function index(){
        //cek apakah admin sdh login
        $isAdmin = $this->session->userdata('isAdmin');
        
        if($isAdmin){
            $this->dashboard();
        }else{
            $this->load->view('backend/login_form');
        }
    }
    function dashboard(){
        $data['share'] = $this->product_model->get_mostActivity('Share');
        $data['like'] = $this->product_model->get_mostActivity('Like');
        $data['prating'] = $this->product_model->get_all_rating_product();
        $data['rating'] = $this->product_model->get_product_rating();
        $data['useractivity'] = $this->product_model->get_mostActiveUser();
        $data['content'] = 'backend/dashboard';
        $this->load->view('backend/template',$data);
    }

   

}