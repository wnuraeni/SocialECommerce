<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class User extends CI_Controller{

    function __construct(){
        parent::__construct();
            $this->load->model('usermodel','',TRUE);
    }
    function index($page=1){
        $limit = 1;
        $offset = ($page - 1) *$limit;
        $config['base_url'] = base_url('admin/user/index/');
        $config['total_rows']=$this->usermodel->getTotalUser();
        $config['uri_segment']=4;
        $config['per_page']=$limit;
        $config['use_page_numbers']=TRUE;
        $this->pagination->initialize($config);

        $user = $this->usermodel->getAll(null,$limit,$offset);
        $data['user'] = $user;
        $data['content'] = 'back_end/list_user';
        $this->load->view('back_end/template',$data);

    }
 function front($page=1){
       $limit = 10;
        $offset = ($page - 1) *$limit;
        $config['base_url'] = base_url('admin/user/front/');
       $config['total_rows']=$this->usermodel->getTotalUser(array('level'=>3));
        $config['uri_segment']=4;
        $config['per_page']=$limit;
        $config['use_page_numbers']=TRUE;
        $this->pagination->initialize($config);

        $user = $this->usermodel->getAll(array('level'=>3),$limit,$offset);
        $data['user'] = $user;
        $data['content'] = 'back_end/list_user';
        $this->load->view('back_end/template',$data);

    }
 function back($page=1){
       $limit = 10;
        $offset = ($page - 1) *$limit;
        $config['base_url'] = base_url('admin/user/back/');
        echo $config['total_rows']=$this->usermodel->getTotalUser(array('level'=>1));
        $config['uri_segment']=4;
        $config['per_page']=$limit;
        $config['use_page_numbers']=TRUE;
        $this->pagination->initialize($config);
        
        $user = $this->usermodel->getAll(array('level'=>1),$limit,$offset);
        $data['user'] = $user;
        $data['content'] = 'back_end/list_backuser';
        $this->load->view('back_end/template',$data);

    }

    function addUser(){
         $this->form_validation->set_rules('username','Username','required|xss_clean|trim');
         $this->form_validation->set_rules('email','Email','required|xss_clean|trim');
         $this->form_validation->set_rules('password','Password','required|xss_clean|trim');

        if($this->form_validation->run()==true){
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $datadb= array(
                'username'=>$username,
                'email'=>$email,
                'password'=>$password,
                'level'=>1
            );
            $this->usermodel->addUser($datadb);
            redirect(base_url('admin/user/back'));
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
        redirect(base_url('admin/user/back'));
    }
}
?>