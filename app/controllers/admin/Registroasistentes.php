<?php

class Registroasistentes extends MY_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Registroasistentes_eloquent');
	}


    public function index(){
        $this->data['info'] = 'Bienvenido(a) '.$this->session->userdata('user_login');
        $this->data['users'] = Registroasistentes_eloquent::all();
        $this->render('admin/registroasistentes/index');

    }

}
