<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class banner extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('banner_model','',TRUE);
    }
    function index(){
        $data['banner'] = $this->banner_model->get_all();
        $data['content'] = 'backend/list_banner';
        $this->load->view('backend/template',$data);
    }
    function add_banner(){
        $this->form_validation->set_rules('title','Title','required|xss_clean');
        $this->form_validation->set_rules('url','URL','required|xss_clean');
        $this->form_validation->set_rules('status','Status','required|xss_clean');
        if($this->form_validation->run()==TRUE){
            $title = $this->input->post('title');
            $url = $this->input->post('url');
            $status = $this->input->post('status');
            //upload config
            $config['upload_path']='./images/banner';
            $config['allowed_types']='gif|jpg|png';
            $config['overwrite']=TRUE;
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('media_url')){
                $error = $this->upload->display_errors();
                $data['upload_status'] = $error;
            }
            else{
                $upload = $this->upload->data();
                $filename = $upload['file_name'];
                $datadb = array(
                    'title'=>$title,
                    'media_url'=>$filename,
                    'url'=>$url,
                    'status'=>$status
                );
                $id = $this->banner_model->add_banner($datadb);
                if($id){
                    $this->session->set_flashdata('message','success');
                    redirect('admin/banner');
                }
                else{
                    $this->session->set_flashdata('message','Something Wrong');
                    redirect('admin/banner/add_banner');
                }
            }
        }
        $data['title'] = 'Add Banner';
        $data['action'] = base_url('admin/banner/add_banner');
        $data['content'] = 'backend/form_banner';
        $data['btnlabel'] = 'Add';
        $this->load->view('backend/template',$data);
    }
    function update_banner($id=null){
        $this->form_validation->set_rules('title','Title','required|xss_clean');
        $this->form_validation->set_rules('url','URL','required|xss_clean');
        $this->form_validation->set_rules('status','Status','required|xss_clean');
        if($this->form_validation->run()==TRUE){
            $title = $this->input->post('title');
            $url = $this->input->post('url');
            $status = $this->input->post('status');
            $id = $this->input->post('id_banner');
            //upload config
            $config['upload_path']='./images/banner';
            $config['allowed_types']='gif|jpg|png';
            $config['overwrite']=TRUE;
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('media_url')){
                $datadb = array(
                    'title'=>$title,
                    'url'=>$url,
                    'status'=>$status,
                );
                $idx = $this->banner_model->update_banner($id,$datadb);
                if($idx){
                    $this->session->set_flashdata('message','success');
                    redirect('admin/banner');
                }
                else{
                    $this->session->set_flashdata('message','Something Wrong');
                    redirect('admin/banner/update_banner');
                }
            }
            else{
                $upload = $this->upload->data();
                $filename = $upload['file_name'];
                $datadb = array(
                    'title'=>$title,
                    'media_url'=>$filename,
                    'url'=>$url,
                    'status'=>$status,
                );
                $idx = $this->banner_model->update_banner($id,$datadb);
                if($idx){
                    $this->session->set_flashdata('message','success');
                    redirect('admin/banner');
                }
                else{
                    $this->session->set_flashdata('message','Something Wrong');
                    redirect('admin/banner/update_banner');
                }
            }
        }
        $data['title'] = 'Edit Banner';
        $data['content'] = 'backend/form_banner';
        $data['btnlabel'] = 'Update';

        
        $data['action'] = base_url('admin/banner/update_banner');
        $data['banner'] = $this->banner_model->get_banner(array('id_banner'=>$id));
        $this->load->view('backend/template',$data);
    }
    function delete_banner($id=null){
        $id = $this->banner_model->delete_banner(array('id_banner'=>$id));
        if($id){
            $this->session->set_flashdata('message','success');
            redirect('admin/banner');
        }
        else{
            $this->session->set_flashdata('message','Something Wrong');
            redirect('admin/banner/banner');
        }
    }
}
