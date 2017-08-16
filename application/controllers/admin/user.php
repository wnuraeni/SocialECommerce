<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class User extends CI_Controller{

    function __construct(){
        parent::__construct();
            $this->load->model('usermodel','',TRUE);
    }
    function index(){
        $user = $this->usermodel->getAll();
        $data['user'] = $user;
        $data['content'] = 'back_end/list_user';
        $this->load->view('back_end/template',$data);

    }
    function addUser(){
        if($this->input->post()){

        }
        $data['content'] = 'back_end/form_user';
        $this->load->view('back_end/template',$data);
    }
    function updateUser($iduser){
        if($this->input->post()){

        }
        $user = $this->usermodel->getUser(array("id_user"=>$iduser));
        $data['user'] = $user;
        $data['content'] = 'back_end/form_user';
        $this->load->view('back_end/template',$data);
    }
    function removeUser($iduser){
        $this->usermodel->deleteUser(array("id_user"=>$iduser));
        redirect(base_url('admin/user'));
    }
}
?>
