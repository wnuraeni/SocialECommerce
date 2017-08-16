<?php
//User controller
if(!defined('BASEPATH')) exit('No direct script allowed');

class Account extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('user_model','',TRUE);
        $this->load->model('order_model','',TRUE);
    }
    function login(){ 
        //validasi form
        //$this->form_validation->set_rules('username','Username','required|xss_clean|callback_username_exist'); //cth callback untuk registrasi
        $this->form_validation->set_rules('email','Email','required|xss_clean|trim');
        $this->form_validation->set_rules('password','Password','required|trim|xss_clean');
        if($this->form_validation->run() == TRUE){
            //checking user exist or not
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $res = $this->user_model->get_user(array('email'=>$email,'password'=>md5($password),'level'=>3));
            if(!empty($res)){
                $this->session->set_userdata('isLogin',TRUE);
                $this->session->set_userdata('idUser',$res->id);
                $this->session->set_userdata('userName',$res->username);
                $session = $this->session->userdata('previous_location');
                if($session)
                    redirect($session);
                else
                    redirect(base_url());
            }
            else{
                $this->session->set_flashdata('message','User not exist');
                redirect(base_url('account/login'));
            }
        }
        $data['content'] = 'frontend/login_form';
        $this->load->view('frontend/template',$data);
    }
    function login_facebook(){
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
//        $firstname = $this->input->post('firstname');
//        $birthdate = $this->input->post('birthdate');
//        $city = $this->input->post('city');
        
        $fb_user = $this->user_model->get_user(array('username'=>$username,'email'=>$email,'isSocialLogin'=>1));

        if(!empty($fb_user)){
            $this->session->set_userdata('isFBLogin',TRUE);
            $this->session->set_userdata('idUser',$fb_user->id);
            $this->session->set_userdata('userName',$fb_user->username);
//            $fb_login = true;
        }else{
        $data_user = array(
            'username'=>$username,
            'email'=>$email,
            'password'=>md5($password),
            'level'=>3,
            'isSocialLogin'=>1,
            'date_registered'=>date('Y-m-d H:i:s')
            );
        $data_userinfo = array(
            'firstname'=>$firstname,
            'city'=>$city,
            'birthdate'=>$birthdate
        );
        $data_db=array($data_user,$data_userinfo);
        $fb_user = $this->user_model->add_user($data_db);
        $this->session->set_userdata('isFBLogin',TRUE);
        $this->session->set_userdata('idUser',$fb_user);
        $this->session->set_userdata('userName',$username);
        $fb_login = true;
        }
//        if($fb_login){
//            $this->session->set_userdata('isFBLogin',TRUE);
//            return true;
//        }
    }
    function registration(){
      
        $this->form_validation->set_rules('firstname','Firstname','required|trim|xss_clean');
        $this->form_validation->set_rules('lastname','Lastname','required|trim|xss_clean');
        $this->form_validation->set_rules('birthdate','Birthdate','required|trim|xss_clean');
        $this->form_validation->set_rules('address','Address','required|trim|xss_clean');
        $this->form_validation->set_rules('city','City','required|trim|xss_clean');
        $this->form_validation->set_rules('province','Province','required|trim|xss_clean');
        $this->form_validation->set_rules('phone','Phone','required|trim|xss_clean');

        $this->form_validation->set_rules('email','Email','required|trim|xss_clean');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_username_exist');
        $this->form_validation->set_rules('password','Password','required|trim|xss_clean');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|trim|xss_clean|matches[password]');
        if($this->form_validation->run()==TRUE){
              $firstname = $this->input->post('firstname');
              $lastname = $this->input->post('lastname');
              $birthdate = $this->input->post('birthdate');
              $address = $this->input->post('address');
              $phone = $this->input->post('phone');

              $email = $this->input->post('email');
              $username = $this->input->post('username');
              $password = $this->input->post('password');

              $data_user = array(
                  'username'=>$username,
                  'email'=>$email,
                  'password'=>md5($password),
                  'level'=>'3',
                  'isSocialLogin'=>0,
                  'date_registered'=>date('Y-m-d H:i:s')
                  );
              $data_userinfo = array(
                  'firstname'=>$firstname,
                  'lastname'=>$lastname,
                  'birthdate'=>$birthdate,
                  'phone'=>$phone,
                  'address'=>$address,
              );
              $datadb = array($data_user,$data_userinfo);
              $res = $this->user_model->add_user($datadb);
              if($res){
//                  $this->session->set_flashdata('message','Welcome');
                          redirect('account/registration_confirm');
              }else{
                   $this->session->set_flashdata('message','Something wrong');
                          redirect('account/registration');
              }
          }
        
        $data['content'] = 'frontend/registration_form';
        $this->load->view('frontend/template',$data);
    }
    function registration_confirm(){
        $data['content'] = 'frontend/reg_confirm';
        $this->load->view('frontend/template',$data);
    }
    function username_exist($username){ 
        $result = $this->user_model->get_user(array("username"=>$username));
        if(!empty($result)){
            $this->form_validation->set_message('username_exist','Username already taken');
            return false;
        }
        else
            return true;
        
    }
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    function view_profile($id_profile=null,$status=null){
        $id_user = null;
        if(!empty($id_profile)){
            $id_user = $id_profile;
        }else{
           $id_user = $this->session->userdata('idUser');
        }
        
        $result = $this->user_model->get_userinfo(array("id_user"=>$id_user));
        $share = $this->user_model->get_activity(array("id_user"=>$id_user,"type"=>"Share"));
        $favorite = $this->user_model->get_favorite_product(array("product_favorite.id_user"=>$id_user));
        $data['user'] = $result;
        $data['share'] = $share;
        $data['favorite']=$favorite;
        $data['status'] = $status;
        $data['content'] = 'frontend/user_profile';
        $this->load->view('frontend/template',$data);
    }
    function edit_profile($id_user=null){
         if($this->input->post('edit_basic')){
             $username = $this->input->post('username');
             $email = $this->input->post('email');
             $datadb = array(
                 'username'=>$username,
                 'email'=>$email
             );
             $this->user_model->update_user($id_user,$datadb);
         }
        else if($this->input->post('edit_personal')){
             echo 'Edit Personal';
         }
         else if($this->input->post('edit_pass')){
             echo 'Edit Pass';
         }
         $user = $this->user_model->get_user(array("id"=>$id_user));
         $info = $this->user_model->get_userinfo(array("id_user"=>$id_user));
         $data['id_user'] = $id_user;
         $data['user'] = $user;
         $data['info'] = $info;
         $data['content'] = 'frontend/edit_profile';
         $this->load->view('frontend/template',$data);
    }
   
}

