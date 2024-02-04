<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function index(){
        /*header('Content-Type: Application/json');
        print_r($this->session->all_userdata());*/

        $guard_name = $this->uri->segment(1);
        $controller = $this->uri->segment(2);
        $action = $this->uri->segment(3);
        $url = $guard_name . "/" . $controller . "/" . $action;
        header('Content-Type: Application/json');
        echo $url;
		echo json_encode($this->session->all_userdata());
    }
}
