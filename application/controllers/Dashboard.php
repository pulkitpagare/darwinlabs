<?php

require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

class Dashboard extends CI_Controller
{

    public $user ;
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('user')){
            redirect('/auth/login');
        }

    }

    public function index(){

        $data = [];
        if($this->input->server('REQUEST_METHOD') == 'POST'){
//            $_POST = json_decode(file_get_contents('php://input'),true);
            $connection = new TwitterOAuth('T8YNLOaGz9PbFeEukObYc6v7u', 'e8BRDZQQRkd9pvYAf31BpRSytoIK43knCeGjfYMpFXrcdYXotW', '1402478240-x0qrOT4nsium6oZ8fbzYzaqn3LtWVJ5ETlQmhd2', 'zezUYnxzHdO4ApEaQ7VQHCXnHwX2oRaqzvBJozIf75051');
            $statuses = $connection->get("search/tweets", ["q" => $this->input->post('search')]);
            $tweets= $statuses->statuses ;
            function cmp($a, $b)
            {
                if ($a->retweet_count == $b->retweet_count) {
                    return 0;
                }
                return ($a->retweet_count < $b->retweet_count) ? 1 : -1;
            }

            usort($tweets, "cmp");
            $data['tweets'] = $tweets;
        }
        $data['show'] = 1;
        $data['user'] = (array)$this->session->userdata('user');
        $this->load->view('dashboard/index',$data);

    }

    public function search(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $_POST = json_decode(file_get_contents('php://input'),true);
            $connection = new TwitterOAuth('T8YNLOaGz9PbFeEukObYc6v7u', 'e8BRDZQQRkd9pvYAf31BpRSytoIK43knCeGjfYMpFXrcdYXotW', '1402478240-x0qrOT4nsium6oZ8fbzYzaqn3LtWVJ5ETlQmhd2', 'zezUYnxzHdO4ApEaQ7VQHCXnHwX2oRaqzvBJozIf75051');
            $statuses = $connection->get("search/tweets", ["q" => $_POST['search']]);
            $data = $statuses->statuses ;
            function cmp($a, $b)
            {
                if ($a->retweet_count == $b->retweet_count) {
                    return 0;
                }
                return ($a->retweet_count < $b->retweet_count) ? 1 : -1;
            }

            usort($data, "cmp");
            exit(json_encode(array('data'=>$data)));
        }
    }

}