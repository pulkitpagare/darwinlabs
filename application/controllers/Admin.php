<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 21/7/17
 * Time: 5:26 PM
 */
class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user')){
            redirect('/auth/login');
        }
        if(!$this->session->userdata('user')->role){
            exit(json_encode("you are not authorised."));
        }
        $this->load->database();
    }

    public function index(){
        $data = [];
        $data['user'] = (array)$this->session->userdata('user');
        $this->load->view('admin/index',$data);
    }

    public function getAllUsers(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $_POST = json_decode(file_get_contents('php://input'),true);
            $currentPage = isset($_POST['currentPage']) ? $_POST['currentPage'] : 0;
            $response['currentPage'] = $currentPage;
            $response['data'] = $this->db->from('users')->where("id !=",$this->session->userdata('user')->id)->limit(10,10*$currentPage)->get()->result_array();
            $response['total'] = $this->db->from('users')->where("id !=",$this->session->userdata('user')->id)->count_all_results();
            exit(json_encode($response));
        }
    }

    public function updateUser(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $_POST = json_decode(file_get_contents('php://input'),true);
            $response = [];
            $this->load->model('User_model');
            if($this->User_model->update($_POST['id'],$_POST['username'],$_POST['email'],$_POST['password'])){
                $response['status'] = TRUE;
            }else{
                $response['status'] = FALSE;
            }
            exit(json_encode($response));
        }
    }

    public function deleteUser(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $_POST = json_decode(file_get_contents('php://input'),true);
            $response = [];
            $this->load->model('User_model');
            if($this->User_model->delete($_POST['id'])){
                $response['status'] = TRUE;
            }else{
                $response['status'] = FALSE;
            }
            exit(json_encode($response));
        }
    }
}