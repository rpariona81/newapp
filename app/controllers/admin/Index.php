<?php

class Index extends MY_Controller{

    /*public function index(){
        $this->data['saludo'] = 'Bienvenido(a) '.$this->session->userdata('user_login');
        $this->render(NULL,'json');
    }*/

    public function index(){
        $this->data['info'] = 'Bienvenido(a) '.$this->session->userdata('user_login');
        $this->render('admin/dashboard');
        //$this->render('admin/dashboard','admin');

        /*$guard_name = $this->uri->segment(1);
        $controller = $this->uri->segment(2);
        $action = $this->uri->segment(3);
        $url = $guard_name . "/" . $controller . "/" . $action;
        header('Content-Type: Application/json');
        echo $guard_name.'<br>';
        echo $controller.'<br>';
        echo $action.'<br>';
        echo $url.'<br>';
		echo json_encode($this->session->all_userdata());*/
    }

}

?>
