<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_message('loginok', 'Usuario o clave incorrectos');
		$this->form_validation->set_message('Clave', 'Ingrese contraseña');
	}

	public function index()
	{
		$this->load->view('test');
		//$datos[0]=$this->session->userdata('user_guard');
		//$this->login();
		//print_r($datos);
		
	}

	public function login()
	{
		if ($this->session->userdata('user_guard')) {
			//print_r($datos);
			//echo "si hay sesion";
			redirect(base_url() . $this->session->userdata('user_guard') . '/index');
		} else {
			//echo "no hay sesion";
			//$this->login();
			$this->load->view('auth/login');
		}
		//$this->load->view('auth/login');
	}

	public function error404()
	{
		$this->load->view('auth/login');
	}

	public function auth()
	{
		$login = $this->input->post('username');
		$password = $this->input->post('password');

		if ($login != NULL && $password != NULL) {

			$this->form_validation->set_rules('username', 'Usuario', 'required|callback_loginok');
			$this->form_validation->set_rules('password', 'Clave', 'required');
			//si el proceso falla mostramos errores
			if ($this->form_validation->run() == FALSE) {
				$this->index();
				//en otro caso procesamos los datos
			} else {
				//redirect('encuestacsc/index');
				redirect(site_url($this->session->user_guard) . '/index');
				//redirect('admin/users');
			}
		} else {
			//redirect('home/acceso_denegado');
			$this->session->set_flashdata('error', 'Ingrese su usuario y contraseña.');
			$this->index();
		}
	}

	public function loginok()
	{
		$login = $this->input->post('username');
		$password = $this->input->post('password');
		//return $this->Usuariolib->login($login, $password);
		$this->load->library('LoginLib');
		$util = new LoginLib();
		$checkUser = $util->login($login, $password);
		//print_r('checkUser'.$checkUser);
		$this->session->set_flashdata('error', $checkUser['error']);
		return $checkUser['isLogged'];
		/*if($checkUser->isLogged){
            redirect('/admin/users');
        }else{
            // Display error message
            $this->session->set_flashdata('flashError', 'Error de usuario y/o contraseña o usuario desactivado.');
            redirect('/home');
        }*/
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	/*public function acceso_denegado()
	{
		$guard_name = $this->uri->segment(1);
		$controller = $this->uri->segment(2);
		$action = $this->uri->segment(3);
		$url = $guard_name . "/" . $controller . "/" . $action;
		header('Content-Type: Application/json');
		echo $guard_name . '<br>';
		echo $controller . '<br>';
		echo $action . '<br>';
		echo $url . '<br>';
		echo json_encode($this->session->all_userdata());
	}*/
}
