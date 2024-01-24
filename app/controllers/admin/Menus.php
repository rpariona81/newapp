<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menus extends CI_Controller
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
		$this->load->model('Menu_eloquent');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		$data['contenido'] = 'admin/menus/index';
		$data['menus'] = Menu_Eloquent::all();
		$data['opciones'] = Menu_Eloquent::getMenuOpciones();
		//$data['users'] = $this->User_model->get();
		/*print_r(json_encode($data));
		return;*/
		$this->load->view('admin/templateAdmin', $data);
	}
}
