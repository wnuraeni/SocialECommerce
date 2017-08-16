<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class Index extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('banner_model','',TRUE);
        $this->load->model('product_model','',TRUE);
        $this->load->model('category_model','',TRUE);
        $this->load->model('user_model','',TRUE);
    }
    
    function index(){
        $data['banner'] = $this->banner_model->get_all(array('status'=>'Active'));
        $data['new_product'] = $this->product_model->get_all(null,array('date_added','desc'),4,0);
        $data['recommend'] = $this->product_model->get_recommend();
        $data['rating'] = $this->product_model->get_product_rating();
        $data['content'] = 'frontend/home';
        $this->load->view('frontend/template',$data);
    }
    function category_menu(){
        $categories = $this->category_model->get_all();
        $menu = '';
        foreach($categories as $cat){
             $menu .= '<li><a href="'.base_url('product/category/'.$cat->category_name).'">'.$cat->category_name.'</a></li>';
        }
        echo json_encode(array('menu'=>$menu));
    }
    function search_user(){
        if($this->input->post()){
            $keyword = $this->input->post('search_user');
            $result = $this->user_model->search($keyword);
            $data['result'] = $result;
            $data['content'] = 'frontend/search_result';
            $this->load->view('frontend/template',$data);
        }
    }
}

