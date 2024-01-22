<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
		$this->load->model('Role_eloquent');
	}

	public function index()
	{
		//$this->load->view('admin/templateAdmin');
		//$this->load->model('User_model');
		$data['contenido'] = 'admin/users/index';
		$data['users'] = User_Eloquent::getUsersRoles();
		/*$data['users'] = $this->User_model->get();
		print_r(json_encode($data));
		return;*/
		$this->load->view('admin/templateAdmin',$data);
	}

    public function show($id)
	{
		//$this->load->view('welcome_message');
		//$this->load->model('User_model');
        //$request = array('id'=>1);
		$data['user'] = User_Eloquent::getUser($id);
		//$data['users'] = $this->User_model->get();
		print_r(json_encode($data));
		return;
	}

	public function edit($id)
	{
		//$this->load->view('welcome_message');
		//$this->load->model('User_model');
        //$request = array('id'=>1);
		$data['user'] = User_Eloquent::getUser($id);
		//$data['users'] = $this->User_model->get();
		print_r(json_encode($data));
		return;
	}

	public function update($id)
	{
		//$this->load->view('welcome_message');
		//$this->load->model('User_model');
        //$request = array('id'=>1);
		$data['user'] = User_Eloquent::getUser($id);
		//$data['users'] = $this->User_model->get();
		print_r(json_encode($data));
		return;
	}

	public function inactive($id)
	{
		//$this->load->view('welcome_message');
		//$this->load->model('User_model');
        //$request = array('id'=>1);
		$data['user'] = User_Eloquent::getUser($id);
		//$data['users'] = $this->User_model->get();
		print_r(json_encode($data));
		return;
	}

	public function active($id)
	{
		//$this->load->view('welcome_message');
		//$this->load->model('User_model');
        //$request = array('id'=>1);
		$data['user'] = User_Eloquent::getUser($id);
		//$data['users'] = $this->User_model->get();
		print_r(json_encode($data));
		return;
	}

}
