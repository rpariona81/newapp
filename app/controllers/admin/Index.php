<?php

class Index extends Admin_Controller{

    /*public function index(){
        $this->data['saludo'] = 'Bienvenido(a) '.$this->session->userdata('user_login');
        $this->render(NULL,'json');
    }*/

    public function index(){
        $this->data['info'] = 'Bienvenido(a) '.$this->session->userdata('user_login');
        //$this->render('admin/dashboard','admin');
        $this->render('admin/dashboard');
    }

}

?>