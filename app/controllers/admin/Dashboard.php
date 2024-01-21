<?php

use Eloquent\User_Eloquent;

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

	use Eloquent\User_Eloquent;

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

	}

	public function index()
	{
		//$this->load->view('welcome_message');
		//$this->load->model('User_model');

		$data['users'] = User_Eloquent::all();
		print_r(json_encode($data));
		return;
	}
}
