<?php

if(!defined('BASEPATH')) exit('No direct script allowed');

class Category extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('category_model','',TRUE);
    }
    function index(){
        $data['categories']= $this->category_model->get_all();
        $data['content'] = 'backend/list_category';
        $this->load->view('backend/template',$data);
    }
    function add_category(){
        
        //get data post
        if($this->input->post()){
            $cat_name = $this->input->post('category');
            $datadb = array('category_name'=>$cat_name);
            $insert = $this->category_model->add_category($datadb);
            if($insert){
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/category'));
            }
            else{
                $this->session->set_flashdata('message','failed');
                redirect(base_url('admin/category'));
            }
        }
        $data['title'] = 'Add New Category';
        $data['btnlabel'] = 'Add';
        $data['action'] = base_url('admin/category/add_category');
        $data['content'] = 'backend/form_category';
        $this->load->view('backend/template',$data);
    }
    function update_category($id=null){
        if($this->input->post()){
            $id_category = $this->input->post('id_category');
            $cat_name = $this->input->post('category');
            $datadb = array('category_name'=>$cat_name);
            $update = $this->category_model->update_category($id_category,$datadb);
            if($update){
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/category'));
            }
            else{
                $this->session->set_flashdata('message','failed');
                redirect(base_url('admin/category'));
            }
        }
        $data['category'] = $this->category_model->get_category(array('id_category'=>$id));
        $data['title'] = 'Edit Category';
        $data['btnlabel'] = 'Update';
        $data['action'] = base_url('admin/category/update_category');
        $data['content'] = 'backend/form_category';
        $this->load->view('backend/template',$data);
    }
    function delete_category($id=null){
        $delete = $this->category_model->delete_category(array('id_category'=>$id));
        if($delete){
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/category'));
        }
        else{
            $this->session->set_flashdata('message','failed');
            redirect(base_url('admin/category'));
        }
    }
}

