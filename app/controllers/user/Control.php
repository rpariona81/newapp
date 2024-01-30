<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends CI_Controller
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

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
        $this->load->model('User_eloquent');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		
		/*$data['users'] = User_model::all();
		print_r(json_encode($data));
		exit;*/
		//$this->session->set_userdata("username","Jhon Doe");
		//print_r(json_encode($this->session->userdata("user_login")));
        print_r(json_encode($this->session->userdata()));
		return;
	}
}
