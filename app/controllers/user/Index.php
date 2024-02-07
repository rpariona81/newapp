<?php

class Index extends MY_Controller{

    public function index(){
        //$this->render(NULL,'json');
        $this->data['info'] = 'Bienvenido(a) '.$this->session->userdata('user_login');
        //$this->render('admin/dashboard','admin');
        $this->render('admin/dashboard');
    }

}

?>