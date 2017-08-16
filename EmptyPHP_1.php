<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!defined('BASEPATH')) exit('No direct access');

class Product extends CI_Controller{
    var $limit = 9;
    function __construct(){
        parent::__construct();
        $this->load->model('productmodel','',TRUE);
        $this->load->library('pagination');
        $this->load->model('reviewmodel','',TRUE);
        $this->load->model('usermodel','',TRUE);
        $this->load->model('categorymodel','',TRUE);
    }
    function category($category=null,$page=1){
        $offset = ($page-1)*$this->limit;
        $products = $this->productmodel->getAll(array('category_name'=>$category),null,$this->limit,$offset);

        $config['base_url']= base_url('product/category/'.$category.'/');
        $config['total_rows'] = $this->productmodel->getTotalProduct(array('category_name'=>$category));
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;
        $config['per_page'] = $this->limit;
        $this->pagination->initialize($config);

        $data['category'] = $this->categorymodel->getAll();
        $data['selected'] = $category;
        $data['products'] = $products;
        $data['content'] = 'front_end/category';
        $this->load->view('front_end/template',$data);
    }
    function detail($id_product){
        $session = $this->session->userdata('previous_location');
        if(!empty($session)){
            $this->session->unset_userdata('previous_location');
        }
        $product = $this->productmodel->getProduct(array('product.id_product'=>$id_product));
        $data['meta_tag'] = ''
                . '<meta property="fb:app_id" content="263603350468346"/>'
                . '<meta property="og:type" content="social-commerce"/>'
                . '<meta property="og:url" content="http://kayitah.dmsn.web.id/product/detail/'.$id_product.'"/>'
                . '<meta property="og:title" content="'.$product->product_name.'"/>'
                . '<meta property="og:image" content="http://kayitah.dmsn.web.id/images/product/'.$product->url_product.'"/>';
        $data['rating'] = $this->productmodel->getRating($id_product);
        $data['product'] = $product;
        $data['default_media'] = $this->productmodel->getMedia(array('product_media.id_product'=>$id_product,'as_default'=>1));
        $data['all_media'] = $this->productmodel->getAllMedia(array('product_media.id_product'=>$id_product));
        $data['review'] = $this->reviewmodel->getAll(array('product.id_product'=>$id_product));
        $data['share'] = $this->usermodel->getActivity(array('product.id_product'=>$id_product,'type'=>'Share'));
        $data['like']= $this->usermodel->getActivity(array('product.id_product'=>$id_product,'type'=>'Like'));
//        $data['recommend'] = ;
        $data['content'] = 'front_end/product_detail';
        $this->load->view('front_end/template',$data);
    }

    function vote(){
       $id_product = $this->input->post('idBox');
       $session = $this->session->userdata('isLoggedin');

        $session2 = $this->session->userdata('isFBlogin');

        $id_user = $this->session->userdata('id_user');

        if(!empty($id_user)){
            $isVote = $this->productmodel->isVote($id_product,$id_user);
            if($isVote){
                $vote = $this->input->post('rate');
                $date = date('Y-m-d');
                $where = array(
                    'id_product' =>$id_product,
                    'id_user' =>$id_user
                );
                $datadb = array(
                    'rate' => $vote,
                    'tanggal_di_rate' => $date
                );
                $this->productmodel->updateRating($datadb,$where);
//                redirect(base_url('product/detail/'.$id_product));
            }
            else{
                $vote = $this->input->post('rate');
                $id_user = $this->session->userdata('id_user');
                $date = date('Y-m-d');
                $datadb = array(
                    'id_product'=>$id_product,
                    'id_user' => $id_user,
                    'rate' => $vote,
                    'tanggal_di_rate' => $date
            );
            $this->productmodel->addRating($datadb);
//            redirect(base_url('product/detail/'.$id_product));
        }
            }

        else{
            echo 'rate failed';
            $this->session->set_userdata('previous_location',  base_url('product/detail/'.$id_product));
//            redirect('account/login');
        }
    }

    function get_productjson($id_product){
        $data = $this->productmodel->getProduct(array('product.id_product'=>$id_product));
        echo json_encode($data);
    }

    function save_activity($id_product = NULL){
        $id_user = $this->session->userdata('id_user');
        $type = $this->input->post('type');
        $activity = $this->input->post('activity_user');
        $datadb = array(
            'id_product' => $id_product,
            'id_user' => $id_user,
            'type' => $type,
            'date' => date('Y-m-d H:i:s'),
            'activity_user' => $activity
        );
        $this->usermodel->userActivity($datadb);

    }

    function favorite($id_product = NULL){
        $datadb = array(
            'id_product' => $id_product,
            'id_user' => $this->session->userdata('id_user')
        );
        $this->productmodel->favorit($datadb);
    }
}