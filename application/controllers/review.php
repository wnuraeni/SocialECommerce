<?php
if(!defined('BASEPATH')) exit('No direct access');

class Review extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('review_model','',TRUE);
    }
    function add_review($id_product=null){
        $session1 = $this->session->userdata('isLogin');
        $session2 = $this->session->userdata('isFBLogin');
        if($session1 || $session2){
            $id_user = $this->session->userdata('idUser');
            $review = $this->input->post('review');
            $share = $this->input->post('share');
            $datadb=array(
                'id_product'=>$id_product,
                'id_user'=>$this->session->userdata('idUser'),
                'date_added'=>date('Y-m-d H:i:s'),
                'review'=>$review
            );
            $this->review_model->add_review($datadb);
            redirect(base_url('product/detail/'.$id_product));
        }
        else{
            $this->session->set_userdata('previous_location',base_url('product/detail/'.$id_product));
            redirect(base_url('account/login'));
        }
    }
    function edit_review($id_product=null){
        $id_product_review = $this->input->post('id_product_review');
        $review = $this->input->post('review');
        $datadb = array('review'=>$review);
        $this->review_model->update_review($id_product_review,$datadb);
        redirect(base_url('product/detail/'.$id_product));

    }
    function delete_review($id_product=null, $id_product_review=null){

        $this->review_model->delete_review(array('id_product_review'=>$id_product_review));
        redirect(base_url('product/detail/'.$id_product));
    }
}

?>
