<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function index(){
        print_r($this->session->user_login);
    }
}
