<?php
if(!defined('BASEPATH')) exit('No direct access');

class Product extends CI_Controller{
    var $limit = 1;
    function __construct(){
        parent::__construct();
        $this->load->model('product_model','',TRUE);
        $this->load->model('review_model','',TRUE);
        $this->load->model('user_model','',TRUE);
    }
    function category($category=null,$page=1){

        $offset = ($page-1)*$this->limit;
        $products = $this->product_model->get_all(array('category_name'=>$category),null,$this->limit,$offset);
        
        echo $this->product_model->get_totalproduct(array('category_name'=>$category));
        $config['base_url']= base_url('product/category/'.$category.'/');
        $config['total_rows'] = $this->product_model->get_totalproduct(array('category_name'=>$category));
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;
        $config['per_page'] = $this->limit;
        $this->pagination->initialize($config);
        
        $data['products'] = $products;
        $data['content'] = 'frontend/category';
        $this->load->view('frontend/template',$data);
    }
    function detail($id_product){
        $session = $this->session->userdata('previous_location');
        if(!empty($session)){
            $this->session->unset_userdata('previous_location');
        }
        $product = $this->product_model->get_product(array('products.id_product'=>$id_product));
        $data['meta_tag'] = '
            <meta property="fb:app_id" content="1429147820661503" />
            <meta property="og:type" content="social-commerce" />
            <meta property="og:url" content="http://kayitah.dmsn.web.id/product/detail/'.$id_product.'" />
            <meta property="og:title" content="'.$product->product_name.'" />
            <meta property="og:image" content="http://kayitah.dmsn.web.id/images/product/'.$product->media_url.'" />';
        $data['rating'] = $this->product_model->get_rating($id_product);
        $data['product'] = $product;
        $data['default_media'] = $this->product_model->get_media(array('id_product'=>$id_product,'as_default'=>1));
        $data['all_media'] = $this->product_model->get_all_media(array('id_product'=>$id_product));
        $data['reviews'] = $this->review_model->get_all(array('products.id_product'=>$id_product));
        $data['content'] = 'frontend/product_detail';
        $this->load->view('frontend/template',$data);
    }
    function vote(){
        $id_product = $this->input->post('idBox');
        $session = $this->session->userdata('isLogin');
        $session2 = $this->session->userdata('isFBLogin');
        $id_user = $this->session->userdata('idUser');
        if($session || $session2){
            $isVote = $this->product_model->isVote($id_product,$id_user);
            if($isVote){
                $this->session->set_flashdata('message','alert("You already voted this product")');
//                redirect(base_url('product/detail/'.$id_product));
            }else{
                $vote = $this->input->post('rate');
                $datadb = array(
                    'id_product'=>$id_product,
                    'id_user'=>$id_user,
                    'rating'=>$vote
                );
                $this->product_model->add_rating($datadb);
//                redirect(base_url('product/detail/'.$id_product));
            }
        }else{
            $this->session->set_userdata('previous_location',base_url('product/detail/'.$id_product));
//            redirect(base_url('account/login'));
        }
    }
    function get_productjson($id_product){
        $product = $this->product_model->get_product(array('products.id_product'=>$id_product));
        echo json_encode($product);
    }
    function save_activity($id_product=null){
         $share_id = $this->input->post('activity_id');
         $id_user = $this->session->userdata('idUser');
         $type = $this->input->post('type');
         
         $datadb = array(
            'id_product'=>$id_product,
            'id_user'=>$id_user,
            'type'=>$type,
            'date'=>date('Y-m-d H:i:s'),
            'activity_id'=>$share_id
            );
        $this->user_model->activity($datadb);
    }
    function favorite($id_product=null){
        $datadb =  array('id_product'=>$id_product,'id_user'=>$this->session->userdata('idUser'));
        $this->product_model->favorite($datadb);
    }
}
