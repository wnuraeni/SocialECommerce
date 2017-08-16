<?php
if(!defined('BASEPATH')) exit('No Script Allowed');

class account extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('usermodel','',TRUE);
        $this->load->model('ordermodel','',TRUE);
        $this->load->model('productmodel','',TRUE);
    }
    
    function index(){
        
    }
    
    function login(){
        $this->form_validation->set_rules('username','username','required|xss_clean|trim');
        $this->form_validation->set_rules('password','password','required|xss_clean|trim');
        if($this->form_validation->run() == TRUE){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $set = $this->usermodel->getUser(array('username'=>$username, 'password'=>md5($password),'level'=>'3'));
            if(!empty($set)){
                $this->session->set_userdata('isLoggedin', TRUE);
                $this->session->set_userdata('id_user',$set->id_user);
                $this->session->set_userdata('username',$set->username);
                $session = $this->session->userdata('previous_location');
                if($session){
                    redirect($session);
                }
                else{
                    redirect(base_url());                   
                }
            }
            else{
                $this->session->set_flashdata('message','User not exist');
                redirect(base_url('account/login'));
            }
        }
        $data['content'] = 'front_end/login_form';
        $this->load->view('front_end/template',$data);
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
    function login_facebook(){
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $firstname = $this->input->post('firstname');
        $birthdate = $this->input->post('birthdate');
        $city = $this->input->post('city');
        
        $fb_user = $this->usermodel->getUser(array(
                    'username' => $username,
                    'password' => $password,
                    'email'    => $email
                    )
                );
        if(!empty($fb_user)){
            $this->session->set_userdata('isFBLogin',TRUE);
            $this->session->set_userdata('id_user',$fb_user->id_user);
            $this->session->set_userdata('username',$fb_user->username);
//            $fb_login = true;
        }
        else{
            $data_user = array(
                'username' => $username,
                'email'     => $email,
                'password'  => $password,
                'level'     => 3,
                'isSocialLoggedin' => 1,
                'date_registered' => date('Y-m-d H:i:s')
            );
            $data_userinfo = array(
                'firstname' => $firstname,
                'birthdate' => $birthdate,
                'city' => $city
            );
            $datadb = array($data_user, $data_userinfo);
            $fb_user = $this->usermodel->addUser($datadb);
            $this->session->set_userdata('isFBLogin',TRUE);
            $this->session->set_userdata('id_user',$fb_user);
            $this->session->set_userdata('username',$username);
            $fb_login = true;
        }
//        if($fb_login){
//            $this->session->set_userdata('isFBLogin',TRUE);
//            return true;
//        }
    }
    
    function register(){
        $this->form_validation->set_rules('firstname','Firstname','required|trim|xss_clean');
        $this->form_validation->set_rules('lastname','Lastname','required|trim|xss_clean');
        $this->form_validation->set_rules('email','Email Address','required|trim|xss_clean');
        $this->form_validation->set_rules('password','Password','required|trim|xss_clean');
        $this->form_validation->set_rules('confpassword','Confirm Password','required|trim|xss_clean|matches[password]');
        $this->form_validation->set_rules('birthdate','Birthdate','required|trim|xss_clean');
        $this->form_validation->set_rules('phone_number','Phone Number','required|trim|xss_clean');
        $this->form_validation->set_rules('address','Address','required|trim|xss_clean');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_username_exist');
        
        if($this->form_validation->run()==TRUE){
//            $id_us = $this->input->post('id_user');
            $user_name = $this->input->post('username');
            $email= $this->input->post('email');
            $password = $this->input->post('password');
            
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $birthdate = $this->input->post('birthdate');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone_number');
            $province = $this->input->post('province');
            $city = $this->input->post('city');
                $data_user = array(
//                'id_user' => $id_us,
                'username' => $user_name,
                'email' => $email,
                'password' => md5($password),
                'level' => 3,
                'isSocialLoggedin' =>0,
                'date_registered' => date('Y-m-d H:i:s')
            );
                $data_userinfo = array(
                 'firstname' => $firstname,  
                 'lastname' => $lastname,
                 'birthdate' => $birthdate,
                 'address' => $address,
                 'phone_number' => $phone,
                 'province' => $province,
                 'city' => $city
             );
            $datadb = array($data_user,$data_userinfo);
            $insert = $this->usermodel->addUser($datadb);
            if($insert){
                redirect(base_url('account/registeration_confirm'));
            }
            else{
                redirect(base_url('account/registeration_confirm'));
            }
        }
        $data['content'] = 'front_end/registeration_form';
        $this->load->view('front_end/template',$data);
    }
    
    function registeration_confirm(){
        $data['content'] = 'front_end/reg_confirm';
        $this->load->view('front_end/template',$data);
    }
    
    function username_exist($username){
        $result = $this->usermodel->getUser(array("username"=>$username));
        if(!empty($result)){
            $this->form_validation->set_message('username_exist','Username already taken');
            return false;
        }
        else{
            return true;
        }
    }
    
    function view_profile($id_profile=null, $status=null){
        $id_user = NULL;
        if(!empty($id_profile)){
            $id_user = $id_profile;
        }
        else{
            $id_user = $this->session->userdata('id_user');
        }
        //$result = $this->usermodel->getUserInfo(array("id_user"=>$id_user));
        $share = $this->usermodel->getActivity(array("id_user"=>$id_user,"type"=>"Share"));
        $like = $this->usermodel->getActivity(array("id_user"=>$id_user,"type"=>"Like"));
        $user = $this->usermodel->getUser(array("id_user"=>$id_user));
        $info = $this->usermodel->getUserInfo(array("id_user"=>$id_user));
        $data['user'] = $user;
        $data['id_user'] = $id_user;
        $data['info'] = $info;
        $data['share'] = $share;
        $data['like'] = $like;
        $data['favorite'] = $this->productmodel->getFavoriteProduct(array("id_user"=>$id_user));
        //$activity = $this->usermodel->get_activity(array("id_user" => $id_user));
        $data['status'] = $status;
        $data['content'] = 'front_end/user_profile';
        $this->load->view('front_end/template',$data);
    }
    
    function edit_profile($id_user = NULL){
        if($this->input->post('edit_basic')){
            $username = $this->input->post('username');
            $email= $this->input->post('email');
                $data_user = array(
//                'id_user' => $id_us,
                'username' => $username,
                'email' => $email

            );
                
            $update = $this->usermodel->updateUser($id_user,$data_user);
            if($update){
                redirect(base_url('account/view_profile'));
            }
            else{
                redirect(base_url('account/view_profile'));
            }
        }
        else if($this->input->post('edit_personal')){
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $birthdate = $this->input->post('birthdate');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone_number');
            $province = $this->input->post('province');
            $city = $this->input->post('city');
            $data_userinfo = array(
                 'firstname' => $firstname,  
                 'lastname' => $lastname,
                 'birthdate' => $birthdate,
                 'address' => $address,
                 'phone_number' => $phone,
                 'province' => $province,
                 'city' => $city
             );
            $update = $this->usermodel->updateUserInfo($id_user,$data_userinfo);
            if($update){
                redirect(base_url('account/view_profile'));
            }
            else{
                redirect(base_url('account/view_profile'));
            }
        }
        else if($this->input->post('edit_pass')){
            $password = $this->input->post('password');
            $data_pass = array('password' => md5($password));
            $update = $this->usermodel->updateUser($id_user,$data_pass);
            if($update){
                redirect(base_url('account/view_profile'));
            }
            else{
                redirect(base_url('account/view_profile'));
            }
        }
        $user = $this->usermodel->getUser(array("id_user"=>$id_user));
        $info = $this->usermodel->getUserInfo(array("id_user"=>$id_user));
        $data['user'] = $user;
        $data['id_user'] = $id_user;
        $data['info'] = $info;
        $data['content'] = 'front_end/edit_profile';
        $this->load->view('front_end/template',$data);
    }
    
    
}