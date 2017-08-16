<?php
if(!defined('BASEPATH')) exit('No direct script');

class Order extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('order_model','',TRUE);
        $this->load->model('user_model','',TRUE);
    }
    function index(){
        
    }
    function checkout(){
        if($this->input->post()){
            
            $id_user = $this->session->userdata('idUser');
            $order = array(
                'id_user'=>$id_user,
                'date_ordered'=>date('Y-m-d H:i:s'),
                'total_price'=>$this->cart->total(),
                'total_item'=>$this->cart->total_items(),
                'order_status'=>'pending',
                'payment_status'=>'pending',
                'shipping_status'=>'pending'
            );
            $detail_order = $this->cart->contents();
            $id_order = $this->order_model->add_order($order,$detail_order);
            $shipment = array(
                'id_order'=>$id_order,
                'firstname'=>$this->input->post('firstname'),
                'lastname'=>$this->input->post('lastname'),
                'address'=>$this->input->post('address'),
                'city'=>$this->input->post('city'),
                'province'=>$this->input->post('province'),
                'phone'=>$this->input->post('phone')
            );
            $id_shipment = $this->order_model->add_shipment($shipment);
            $this->cart->destroy();
            redirect(base_url('order/confirmation/'.$id_order));
        }
        $id_user = $this->session->userdata('idUser');
        $data['user'] = $this->user_model->get_userinfo(array('id_user'=>$id_user));
        $data['content'] = 'frontend/checkout';
        $this->load->view('frontend/template',$data);
    }
    function confirmation($id_order=null){
        $data['order'] = $this->order_model->get_order(array('id_order'=>$id_order));
        $data['content'] = 'frontend/order_confirm';
        $this->load->view('frontend/template',$data);
    }
     function order_history($id_user=null){
        $data['order'] = $this->order_model->get_allorder(array('id_user'=>$id_user));
        $data['content'] = 'frontend/order_history';
        $this->load->view('frontend/template',$data);
    }
    function konfirmasi_pembayaran($id_order=null){
       if($this->input->post()){
          echo  $no_order = $this->input->post('no_order');

           $config['upload_path'] = './images/bukti_pembayaran';
           $config['allowed_types'] = 'gif|png|jpg|JPEG|jpeg|GIF|PNG';
           $config['overwrite'] = TRUE;

           $this->load->library('upload',$config);
           if($this->upload->do_upload('bukti_pembayaran')){
               $this->order_model->update_order($no_order,array(
                   'order_status'=>'processing',
                   'payment_status'=>'waiting confirmation',
                   'shipping_status'=>'waiting'));
               $id_user = $this->session->userdata('idUser');
               redirect('order/order_history/'.$id_user);
           }else{
              echo  $this->upload->display_errors();
           }
       }
        if(!empty($id_order)){
            $data['order'] = $this->order_model->get_order(array('id_order'=>$id_order));
        }else{
            $data['order']='';
        }

        $data['content']='frontend/konfirmasi_pembayaran';
        $this->load->view('frontend/template',$data);
    }
    function cancel_order($order_no=null){
            $this->order_model->update_order($order_no,array(
                   'order_status'=>'canceled',
                   'payment_status'=>'canceled',
                   'shipping_status'=>'canceled'
                   )
                );
             $id_user = $this->session->userdata('idUser');
             redirect('account/order_history/'.$id_user);
    }
}