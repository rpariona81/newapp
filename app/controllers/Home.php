<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	/*public function index()
	{
		//$this->ci->session->set_userdata("userID","test");
		$this->load->view('welcome_message');
		/*$this->load->model('User_model');
		$data['users'] = User_model::all();
		print_r(json_encode($data));
	}*/
	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_message('loginok', 'Usuario o clave incorrectos');
		$this->form_validation->set_message('Clave', 'Ingrese contraseña');
	}

	public function index()
	{
		if($this->session->user_login){
			redirect(site_url($this->session->user_guard).'/index');
		}
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
				redirect(site_url($this->session->user_guard).'/index');
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
		$this->load->library('UserLib');
		$util = new UserLib();
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
}
