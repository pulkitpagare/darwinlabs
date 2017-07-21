<?php

/**
 * Created by PhpStorm.
 * User: Pulkit
 * Date: 21/7/17
 * Time: 2:12 PM
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $dbconnect = $this->load->database();
    }

    public function authenticate($email, $password){
        $q = $this->db->where(['email'=>$email, 'password'=>md5($password)])->get('users');
        if($q->num_rows()){
            return $q->row();
        }else{
            return FALSE;
        }
    }

    public function check_exists_username($username){
        if($this->db->where(['username'=>$username])->get('users')->num_rows()){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function check_exists_email($email){
        if($this->db->where(['email'=>$email])->get('users')->num_rows()){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function add($data){
        if($this->db->insert('users',$data)){
            return true;
        }else{
            return false;
        };
    }

    public function update($id,$username,$email,$password) {
        $this->db->where('id', $id);
        $this->db->update('users', array('username' => $username,'email'=>$email,'password'=>md5($password)));
        return true;
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('users');
        return true;
    }

}