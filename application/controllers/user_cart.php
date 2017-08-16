<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class User_cart extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('product_model','',TRUE);
    }
    function index(){
        $data['content'] = 'frontend/cart';
        $this->load->view('frontend/template',$data);
    }
    function add_to_cart($id_product=null){
        $product = $this->product_model->get_product(array('products.id_product'=>$id_product));
        $qty = 1;
        if($this->input->post()){
            $qty = $this->input->post('qty');
        }
        $data  = array(
            'id'=>$product->id_product,
            'qty'=>$qty,
            'price'=>$product->price,
            'name'=>$product->product_name,
            'options'=>array('image'=>$product->media_url,'code'=>$product->product_code)
        );
        $this->cart->insert($data);
        if($this->input->post()){
            redirect(base_url('product/detail/'.$id_product));
        }
    }
    function update_cart(){
        $rowid = $this->input->post('item_rowid');//array('12345','454578','45thhgyj')
        $qty = $this->input->post('item_qty');//array(2,3,6,7);

        $datacart = array();
        $i=0;
        foreach($rowid as $row){
            array_push($datacart,array('rowid'=>$row,'qty'=>$qty[$i]));
            $i++;
        }
        $this->cart->update($datacart);
        redirect(base_url('user_cart/index'));
    }
    function remove_item($rowid=null){
        $data= array('rowid'=>$rowid,'qty'=>0);
        $this->cart->update($data);
    }
}