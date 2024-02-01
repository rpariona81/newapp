<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_hooks
{

    private $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }


    public function autentificar()
    {
        
        if ($this->ci->session->has_userdata("user_login")) {
            /*$this->ci->load->model('User_model');
            $data['users'] = User_model::all();
            print_r(json_encode($data));*/
            //print_r(json_encode($this->ci->session->userdata("username")));
            echo $this->ci->output->get_output();
            //return redirect('admincontroller');
            /*if($this->session->user_login){
                redirect(site_url($this->session->user_guard).'/index');
            }
            $this->load->view('auth/login');*/
            exit;
        } else {
            //redirect(site_url($this->ci->session->user_guard).'/index');
            $this->load->view('auth/login');
            return;
        }
        
    }
}
