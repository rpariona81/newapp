<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function index(){
        header('Content-Type: Application/json');
        print_r($this->session->all_userdata());
        
    }
}
