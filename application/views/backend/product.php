<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!defined('BASEPATH')) exit ('No direct script allowed');

class product extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('productmodel');
        $this->load->model('brandmodel');
        $this->load->model('categorymodel');
        $this->load->model('reviewmodel');
    }

    function index($page=1){
            $limit = 10;
            $offset = ($page - 1) *$limit;
            $config['base_url'] = base_url('admin/product/index/');
            $config['total_rows']=$this->productmodel->getTotalProduct();
            $config['uri_segment']=4;
            $config['per_page']=$limit;
            $config['use_page_numbers']=TRUE;
            $this->pagination->initialize($config);
            $data['products'] = $this->productmodel->getAll(null, null, $limit, $offset);
            $data['content'] = 'back_end/list_product';
            $this->load->view('back_end/template',$data);
        }

    function add_product(){
        if($this->input->post()){
            $brand_id = $this->input->post('id_brand');
            $cat_id = $this->input->post('id_category');
            $product_code = $this->input->post('product_code');
            $pro_name= $this->input->post('product_name');
            $pro_description = $this->input->post('product_description');
            $price = $this->input->post('product_price');
            $stok = $this->input->post('product_qty');
            $weight = $this->input->post('weight');
            $datadb = array(
                'id_brand' => $brand_id,
                'id_category' => $cat_id,
                'product_code' => $product_code,
                'product_name' => $pro_name,
                'product_description' => $pro_description,
                'price' => $price,
                'stock' => $stok,
                'weight' => $weight,
                'date_added' => date('Y-m-d H:i:s')
            );
            $id_prod = $this->productmodel->addProduct($datadb);
            if($id_prod){
                $this->session->set_flashdata('message',
                        '<div class = "alert alert-success fade in">'
                        . '<strong>Good!</strong> You can add product media</div>');
               redirect(base_url('admin/product/update_product/'.$id_prod));
            }
//            else{
//                redirect(base_url('admin/product'));
//            }
            $data['id_product'] = $id_prod;
        }
        $data['products'] = $this->productmodel->getAll();
        $data['brand'] = $this->brandmodel->getAll();
        $data['category'] = $this->categorymodel->getAll();
        $data['title'] = 'Add new product';
        $data['action'] = base_url('admin/product/add_product');
        $data['btnlabel'] = 'Add';
        $data['link_info'] = base_url('admin/product/add_product');
        $data['link_media'] = '#';
        $data['content'] = 'back_end/form_product';
        $this->load->view('back_end/template',$data);
    }

    function update_product($id=null){
        if($this->input->post()){
            $id_product = $this->input->post('id_product');
            $brand_id = $this->input->post('id_brand');
            $cat_id = $this->input->post('id_category');
            $product_code = $this->input->post('product_code');
            $pro_name= $this->input->post('product_name');
            $pro_description = $this->input->post('product_description');
            $price = $this->input->post('product_price');
            $weight = $this->input->post('weight');
            $stok = $this->input->post('product_qty');
            $datadb = array(
                'id_brand' => $brand_id,
                'id_category' => $cat_id,
                'product_code' => $product_code,
                'product_name' => $pro_name,
                'product_description' => $pro_description,
                'price' => $price,
                'weight' => $weight,
                'stock' => $stok
            );
            $update = $this->productmodel->updateProduct($id_product,$datadb);
            if($update){
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/product/update_product/'.$id_product));
            }
            else{
                $this->session->set_flashdata('message','failed');
                redirect(base_url('admin/product/update_product/'.$id_product));
            }
        }
        $data['category'] = $this->categorymodel->getAll();
        $data['brand'] = $this->brandmodel->getAll();
        $data['product'] = $this->productmodel->getProduct(array('product.id_product' =>$id));
        $data['title'] = 'Edit product';
        $data['action'] = base_url('admin/product/update_product');
        $data['btnlabel'] = 'Update';
        $data['link_info'] = base_url('admin/product/add_product');
        $data['link_media'] = base_url('admin/product/add_media/'.$id);
        $data['content'] = 'back_end/form_product';
        $this->load->view('back_end/template',$data);
    }

    function delete_product($id=NULL){
        $delete = $this->productmodel->deleteProduct(array('id_product'=>$id));
            if($delete){
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/product'));
            }
            else{
                $this->session->set_flashdata('message','failed');
                redirect(base_url('admin/product'));
            }
        }

    function add_media($id_product){
        if($this->input->post('add_media')){
            $config['upload_path'] = './images/product';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite'] = TRUE;
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('media_url')){
                $this->session->set_flashdata('message','failed');
                echo $this->upload->display_errors();
            }
            else{
                $upload = $this->upload->data();
                $filename = $upload['file_name'];
                $datadb = array(
                    'id_product' => $id_product,
                    'url_product' => $filename,
                    'alternative' => $this->input->post('alternative'),
                    'as_default' => $this->input->post('as_default')
                );
                $this->productmodel->addMedia($datadb);
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/product/add_media/'.$id_product));
            }
        }

        $data['title'] = 'Add media';
        $data['action'] = base_url('admin/product/add_media/'.$id_product);
        $data['btnlabel'] = 'Add';
        $data['link_info'] = base_url('admin/product/update_product/'.$id_product);
        $data['link_media'] = base_url('admin/product/add_media/'.$id_product);
        $data['content'] = 'back_end/form_productMedia';
        $data['id_product'] = $id_product;
        $data['medias'] = $this->productmodel->getAllMedia(array('id_product'=>$id_product));
        $this->load->view('back_end/template',$data);
    }

    function update_media($id_product=null,$id_media=null){
        if($this->input->post()){
            $config['upload_path'] = './images/product';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite'] = TRUE;
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('media_url')){
                $datadb = array(
                    'id_product' => $id_product,
                    'alternative'=>  $this->input->post('alternative'),
                    'as_default' => $this->input->post('as_default')
                     );
            }
            else{
                $upload = $this->upload->data();
                $filename = $upload['file_name'];
                $datadb = array(
                    'id_product' => $id_product,
                    'url_product' => $filename,
                    'alternative' => $this->input->post('alternative'),
                    'as_default' => $this->input->post('as_default')
                );

            }
                $id_media = $this->input->post('id_media');
                $update = $this->productmodel->updateMedia($id_media,$datadb);
                if($update){
                    $this->session->set_flashdata('message','success');
                    redirect(base_url('admin/product/update_media/'.$id_product));
                }
                else{
                    $this->session->set_flashdata('message','failed');
                    redirect(base_url('admin/product/update_media/'.$id_product));
                }

        }

        $data['title'] = 'Update media';
        $data['action'] = base_url('admin/product/update_media/'.$id_product);
        $data['btnlabel'] = 'Update';
        $data['link_info'] = base_url('admin/product/update_product/'.$id_product);
        $data['link_media'] = base_url('admin/product/add_media/'.$id_product);
        $data['content'] = 'back_end/form_productMedia';
        $data['id_product'] = $id_product;
        $data['id_media'] = $id_media;
        $data['medias'] = $this->productmodel->getAllMedia(array('id_product'=>$id_product));
        $data['media'] = $this->productmodel->getMedia(array('id_media'=>$id_media));
        $this->load->view('back_end/template',$data);
    }

    function delete_media($id_product=NULL, $id_media=null){
        $delete = $this->productmodel->deleteMedia(array('id_media'=>$id_media));
            if($delete){
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/product/update_media/'.$id_product));
            }
            else{
                $this->session->set_flashdata('message','failed');
                redirect(base_url('admin/product/update_media/'.$id_product));
            }
        }

        function review($page=1){
        $limit = 10;
        $offset = ($page - 1) *$limit;
        $config['base_url'] = base_url('admin/product/review/');
        $config['total_rows']=$this->reviewmodel->getTotalReview();
        $config['uri_segment']=4;
        $config['per_page']=$limit;
        $config['use_page_numbers']=TRUE;
        $this->pagination->initialize($config);



            $data['review'] = $this->reviewmodel->getAll(null,$limit,$offset);
            $data['content'] = 'back_end/list_review';
            $this->load->view('back_end/template',$data);
        }

        function rating($page=1){
            $limit = 10;
            $offset = ($page - 1) *$limit;
            $config['base_url'] = base_url('admin/product/index/');
            $config['total_rows']=$this->productmodel->getTotalProduct();
            $config['uri_segment']=4;
            $config['per_page']=$limit;
            $config['use_page_numbers']=TRUE;
            $this->pagination->initialize($config);

            $data['product'] = $this->productmodel->getAll(null, null, $limit, $offset);
            $data['rating'] = $this->productmodel->getProductRating();
            $data['content'] = 'back_end/list_rating';
            $this->load->view('back_end/template',$data);
        }
 }