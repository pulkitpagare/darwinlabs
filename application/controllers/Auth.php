<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Pulkit
 * Date: 20/7/17
 * Time: 9:02 PM
 */
class Auth extends CI_Controller
{
   public function login(){
       $this->load->library('form_validation');
       if($this->input->server('REQUEST_METHOD') == 'POST'){
           $_POST = json_decode(file_get_contents('php://input'),true);
           $this->load->helper('security');
           $this->form_validation->set_rules( 'email','E-Mail Address' ,'trim|required|min_length[10]|valid_email');
           $this->form_validation->set_rules('password','Password' ,'trim|required');
           if ($this->form_validation->run()){
               $this->load->model('User_model');
               if($this->User_model->authenticate($_POST['email'],$_POST['password'])){
                    $user = $this->User_model->authenticate($_POST['email'],$_POST['password']);
                    $this->session->set_userdata('user',$user);
                    $response['status'] = TRUE;
                    if($user->role){
                        $response['data'] = "admin/index/";
                    }else{
                        $response['data'] = "dashboard/index/";
                    }
               }else{
                   $error = array('data'=>"Incorrect Credentials");
                   $response['status'] = FALSE;
                   $response['errors'] = $error;
               }
           }else{
               $errors = array();
               foreach ($_POST as $key => $value)
               {
                   $errors[$key] = form_error($key);
               }
               $response['errors'] = array_filter($errors);
               $response['status'] = FALSE;
           }
           header('Content-type: application/json');
           exit(json_encode($response));
       }else{

           $this->load->view('auth/login');

       }
   }

   public function register()
   {
       $this->load->library('form_validation');
       if($this->input->server('REQUEST_METHOD') == 'POST'){

           $this->load->helper('security');
           $json = array();
           $config['upload_path']          = APPPATH . 'uploads/';
           $config['allowed_types']        = '*';
           $config['max_size']             = 1024;
           $config['encrypt_name']         = TRUE;
           $this->load->library('upload', $config);
           $this->upload->initialize($config);
           $this->load->helper('security');
           $this->load->database();
           $q = $this->db->get('users');
           $this->form_validation->set_rules( 'username','Username' ,'trim|required|min_length[5]');
           $this->form_validation->set_rules( 'email','E-Mail Address' ,'trim|required|min_length[10]');
           $this->form_validation->set_rules('password','Password' ,'trim|required');
           $this->form_validation->set_rules('confirmPassword','Confirm Password' ,'trim|required|matches[password]');
           if($this->form_validation->run() == FALSE){
               $errors = array();
               foreach ($_POST as $key => $value)
               {
                   $errors[$key] = form_error($key);
               }
               $response['errors'] = array_filter($errors);
               $response['status'] = FALSE;
           }elseif ( ! $this->upload->do_upload('file') ){
               $error = array('error' => $this->upload->display_errors());
               $response['status'] = FALSE;
               $response['error'] = $error;
           }else {
               $this->load->model('User_model');
               if($this->User_model->check_exists_username($_POST['username'])) {
                   $error = array('username'=>"Username Already Exists!");
                   $response['status'] = FALSE;
                   $response['errors'] = $error;
               }elseif($this->User_model->check_exists_email($_POST['email'])){
                   $error = array('email'=>"E-Mail Address already exists!");
                   $response['status'] = FALSE;
                   $response['errors'] = $error;
               }else{
                   $image = $this->upload->data();
                   $data = array(
                       'username' => $_POST['username'],
                       'email' => $_POST['email'],
                       'password' => md5($_POST['password']),
                       'image' => $image['file_name']
                   );
                   if($this->User_model->add($data)){
                       $response['status'] = TRUE;
                       $response['message'] = 'Registration Complete';
                   }else{
                       $response['status'] = FALSE;
                       $response['message'] = 'Please try Again After sometime';
                   };
               }
           }
               exit(json_encode($response));

       }else{

           $this->load->view('auth/register');

       }
   }

   public function logout(){
       if($this->input->server('REQUEST_METHOD') == 'POST'){
           $this->session->unset_userdata('user');
           redirect('/auth/login');
       }
   }


}