<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class laporan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('product_model','',TRUE);
        $this->load->model('order_model','',TRUE);
    }
    function penjualan(){
        $start_date = date('Y').'-01-01';
        $end_date = date('Y').'-12-31';

        if($this->input->post()){
            $start_date = $this->input->post('dateStart');
            $end_date = $this->input->post('dateEnd');
        }
 
        $data_db = $this->product_model->get_penjualan_product("`date_ordered` BETWEEN '$start_date%' and '$end_date%'");
        $data['content'] = 'backend/laporan_penjualan';
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['data_laporan'] = $this->json_lap_penjualan($start_date,$end_date);
        $this->load->view('backend/template',$data);
    }
    function grafikpenjualan(){
        $start_date = date('Y').'-01-01';
        $end_date = date('Y').'-12-31';

        if($this->input->post()){
            $start = $this->input->post('dateStart');
            $start_date = date('Y-m-d',strtotime($start));

            $end = $this->input->post('dateEnd');
            $end_date = date('Y-m-d',strtotime($end));
        }
        $data['start'] = $start_date;
        $data['end'] = $end_date;
        $data['content'] = 'backend/graph_product';
        $data['datagrafik'] = $this->json_grafik_penjualanaktifitas($start_date,$end_date);
        $this->load->view('backend/template',$data);
    }

    function json_lap_penjualan($start_date=null,$end_date=null){
        $dat = $this->product_model-> get_penjualan_product("`date_ordered` BETWEEN '$start_date%' and '$end_date%'");
        return $dat;
    }

     function json_grafik_penjualanaktifitas($start_date=null,$end_date=null){
       $dat = $this->order_model->getsales_bymonth("BETWEEN '$start_date%' and '$end_date%'");
       return $dat;
    }
    function detailgrafik($type=null,$moth=null){
        if($type=="Sales"){
            $datadb = $this->order_model->();
            $data['content'] = 'backend/listsales';
        }
        else if($type=="Activity"){
            $datadb = $this->user_model->();
            $data['content'] = 'backend/listactivity';
        }
        $data['detail']=$datadb;
        $this->load->view('backend/template',$data);
    }
}

?>
