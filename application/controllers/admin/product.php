<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class product extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('product_model','',TRUE);
        $this->load->model('category_model','',TRUE);
        $this->load->model('brand_model','',TRUE);
        $this->load->model('review_model','',TRUE);
    }
    function index(){
        $data['product'] = $this->product_model->get_all();
        $data['content']='backend/list_product';
        $this->load->view('backend/template',$data);

    }
    function add_product(){
        if($this->input->post('add_prod')){
            $id_category = $this->input->post('id_category');
            $id_brand = $this->input->post('id_brand');
            $product_code = $this->input->post('product_code');
            $product_name = $this->input->post('product_name');
            $product_desc = $this->input->post('product_description');
            $product_price = $this->input->post('product_price');
            $product_qty = $this->input->post('product_qty');
            $datadb = array(
                'id_category'=>$id_category,
                'id_brand'=>$id_brand,
                'product_code'=>$product_code,
                'product_name'=>$product_name,
                'description'=>$product_desc,
                'price'=>$product_price,
                'stock'=>$product_qty,
                'date_added'=>date('Y-m-d H:i:s')
                );
            $id_prod = $this->product_model->add_product($datadb);
            if($id_prod){
                $this->session->set_flashdata('message',
                        '<div class="alert alert-success fade in">
                        <strong>Good!</strong> You can add product media!
                        </div>');
                redirect(base_url('admin/product/add_media/'.$id_prod));
            }

            $data['id_product'] = $id_prod;
        }

        $data['category'] = $this->category_model->get_all();
        $data['brand'] = $this->brand_model->get_all();
        $data['title'] = 'Add Product Info';
        $data['action'] = base_url('admin/product/add_product');
        $data['btnlabel'] = 'Add';
        $data['link_info'] = base_url('admin/product/add_product');
        $data['link_media']='#';
        $data['content'] ='backend/form_product';
        $this->load->view('backend/template_form',$data);
    }
    function update_product($id=null){
         if($this->input->post()){
            $id_product = $this->input->post('id_product');
            $id_category = $this->input->post('id_category');
            $id_brand = $this->input->post('id_brand');
            $product_code = $this->input->post('product_code');
            $product_name = $this->input->post('product_name');
            $product_desc = $this->input->post('product_description');
            $product_price = $this->input->post('product_price');
            $product_qty = $this->input->post('product_qty');
            $datadb = array(
                'id_category'=>$id_category,
                'id_brand'=>$id_brand,
                'product_code'=>$product_code,
                'product_name'=>$product_name,
                'description'=>trim($product_desc),
                'price'=>$product_price,
                'stock'=>$product_qty,
                'date_added'=>date('Y-m-d H:i:s')
                );
            $update = $this->product_model->update_product($id_product,$datadb);
            if($update){
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/product/update_product/'.$id_product));
            }
            else{
                $this->session->set_flashdata('message','failed');
                redirect(base_url('admin/product/update_product/'.$id_poduct));
            }
        }
        $data['category'] = $this->category_model->get_all();
        $data['brand'] = $this->brand_model->get_all();
        $data['product'] = $this->product_model->get_product(array('products.id_product'=>$id));
        $data['title'] = 'Edit Product';
        $data['action'] = base_url('admin/product/update_product');
        $data['btnlabel'] = 'Update';
        $data['link_info'] = base_url('admin/product/update_product');
        $data['link_media']=base_url('admin/product/add_media/'.$id);
        $data['content'] ='backend/form_product';
        $this->load->view('backend/template',$data);
    }
    function delete_product($id=null){
        $delete = $this->product_model->delete_product(array('id_product'=>$id));
            if($delete){
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/product'));
            }
            else{
                $this->session->set_flashdata('message','failed');
                redirect(base_url('admin/product'));
            }
    }
    function add_media($id_product=null){
       if($this->input->post('add_media')){
            $as_default = $this->input->post('as_default');
            $alt = $this->input->post('alt');

            $config['upload_path']='./images/product';
            $config['allowed_types']='gif|jpg|png';
            $config['overwrite']=TRUE;
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('media_url')){
                $this->session->set_flashdata('message','failed');
                echo $this->upload->display_errors();
//                redirect(base_url('admin/product/add_media/'.$id_product));
            }
            else{
                $upload = $this->upload->data();
                $filename = $upload['file_name'];
                $datadb = array(
                    'id_product'=>$id_product,
                    'media_url'=>$filename,
                    'alt'=> $alt,
                    'as_default'=>$as_default
                        );
                $this->product_model->add_media($datadb);
                
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/product/add_media/'.$id_product));
            }
        }
        $data['action'] = base_url('admin/product/add_media/'.$id_product);
        $data['link_info'] = base_url('admin/product/update_product/'.$id_product);
        $data['link_media']=base_url('admin/product/add_media/'.$id_product);
        $data['btnlabel'] = 'Add';
        $data['title'] = 'Product Media';
        $data['subtitle'] = 'Add Media';
        $data['id_product'] = $id_product;
        $data['medias'] = $this->product_model->get_all_media(array('id_product'=>$id_product));
        $data['content'] ='backend/form_product_media';
        $this->load->view('backend/template',$data);
    }
    function update_media($id_product=null,$id_media=null){
        if($this->input->post()){
            $config['upload_path']='./images/product';
            $config['allowed_types']='gif|jpg|png';
            $config['overwrite']=TRUE;
            $this->load->library('upload',$config);
            $alt = $this->input->post('alt');
            $as_default = $this->input->post('as_default');
            if(!$this->upload->do_upload('media_url')){
               $datadb = array(
                   'id_product'=>$id_product,
                   'alt'=>$alt,
                   'as_default'=>$as_default
                   );
            }
            else{
                $upload = $this->upload->data();
                $filename = $upload['file_name'];

                $datadb = array(
                    'id_product'=>$id_product,
                    'media_url'=>$filename,
                    'alt'=>$alt,
                    'as_default'=>$as_default
                        );
            }
            $id_media = $this->input->post('id_media');
            $update = $this->product_model->update_media($id_media,$datadb);
            if($update){
                $this->session->set_flashdata('message','success');
                redirect(base_url('admin/product/update_media/'.$id_product));
            }else{
                $this->session->set_flashdata('message','failed');
                redirect(base_url('admin/product/update_media/'.$id_product));
            }
        }
        $data['action'] = base_url('admin/product/update_media/'.$id_product);
        $data['link_info'] = base_url('admin/product/update_product/'.$id_product);
        $data['link_media']=base_url('admin/product/add_media/'.$id_product);
        $data['btnlabel'] = 'Update';
        $data['title'] = 'Product Media';
        $data['subtitle'] = 'Update Media';
        $data['id_product'] = $id_product;
        $data['id_media'] = $id_media;
        $data['medias'] = $this->product_model->get_all_media(array('id_product'=>$id_product));
        $data['media'] = $this->product_model->get_media(array('id_product_media'=>$id_media));
        $data['content'] ='backend/form_product_media';
        $this->load->view('backend/template',$data);
    }
    function delete_media($id_product=null,$id_media=null){
        $del = $this->product_model->delete_media(array('id_product_media'=>$id_media));
        if($del){
             $this->session->set_flashdata('message','success');
             redirect(base_url('admin/product/update_media/'.$id_product));
        }else{
             $this->session->set_flashdata('message','success');
             redirect(base_url('admin/product/update_media/'.$id_product));
        }
    }
    function review(){
        $data['review'] = $this->review_model->get_all();
        $data['content'] = 'backend/list_review';
        $this->load->view('backend/template',$data);
    }
    function rating(){
        $data['review'] = $this->product_model->get_rating();
        $data['content'] = 'backend/list_rating';
        $this->load->view('bakcend/template',$data);
    }
}
