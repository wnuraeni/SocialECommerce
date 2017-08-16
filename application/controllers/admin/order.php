<?php
if(!defined('BASEPATH')) exit('No direct access');
class order extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('order_model','',TRUE);
    }
    function index(){
        $data['orders'] = $this->order_model->get_allorder();
        $data['content'] = 'backend/list_order';
        $this->load->view('backend/template',$data);
    }
    function confirm($no_order=null){
        $this->order_model->update_order($no_order,array(
                   'order_status'=>'ok',
                   'payment_status'=>'paid',
                   'shipping_status'=>'shipping'));
        redirect(base_url('admin/order/'));
    }
    function cancel($no_order=null){
         $this->order_model->update_order($no_order,array(
                   'order_status'=>'cancel',
                   'payment_status'=>'cancel',
                   'shipping_status'=>'cancel'));
        redirect(base_url('admin/order/'));
    }
    function detail($no_order=null){
        $data['order']=$this->order_model->get_detail($no_order);
        $data['content'] = 'backend/detail_order';
        $this->load->view('backend/template',$data);
    }
}