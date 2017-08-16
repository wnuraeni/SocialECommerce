<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!defined('BASEPATH')) exit('No direct script allowed');

class index_controller extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
            $this->load->model('bannermodel','',TRUE);
            $this->load->model('productmodel','',TRUE);
            $this->load->model('categorymodel','',True);
            $this->load->model('usermodel','',TRUE);
        }
        
        function index(){
            $data['banner'] = $this->bannermodel->getAll(array('status'=>'Active'));
            $data['content'] = 'front_end/home';
            $data['new_product'] = $this->productmodel->getAll(null,array('date_added','desc'),4,0);
            $data['rating'] = $this->productmodel->getProductRating();
            $this->load->view('front_end/template', $data);
        }
        
        function category_menu(){
            $categories = $this->categorymodel->getAll();
            $menu = '';
            foreach($categories as $cat){
                $menu .= '<li><a href="'.base_url('product/category/'.$cat->category_name).'">'.$cat->category_name.'</a></li>';
            }
            echo json_encode(array('menu'=>$menu));
        }
        
        function search_user(){
            if($this->input->post()){
                $keyword = $this->input->post('search_user');
                $result = $this->usermodel->search($keyword);
                $data['result'] = $result;
                $data['content'] = 'front_end/search_result';
                $this->load->view('front_end/template',$data);
            }
        }
}

