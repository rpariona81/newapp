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
		$this->load->model('Roleuser_eloquent');
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
		$this->load->view('admin/templateAdmin', $data);
	}

	public function show($id)
	{
		//$this->load->view('welcome_message');
		//$this->load->model('User_model');
		$data['contenido'] = 'admin/users/edit';
		$data['user'] = User_Eloquent::getUser($id);
		/*$opciones = array();
		$lista = Role_Eloquent::select('id','rolename')->get();
		foreach ($lista as $registro) {
            $opciones[$registro->id] = $registro->rolename;
        }*/
		$data['roles'] = Role_Eloquent::getRoleOpciones();
		$this->load->view('admin/templateAdmin', $data);
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

	public function update()
	{
		$request = $this->security->xss_clean($this->input->post()); //$request = array('id'=>1);
		/*$data = array(
			'display_name' => $request['display_name'],
			'mobile' => $request['mobile'],
			'email' => $request['email']
		);

		$role_user = array(
			'user_id' => $request['id'],
			'role_id' => $request['role_id']
		);

		$model = User_Eloquent::findOrFail($request['id']);
		$model->fill($data);
		$model->save($data);

		$role = Role_Eloquent::findOrFail($request['role_id']);

		if ($role) {
			$model = new RoleUser_Eloquent();
			$model->fill($role_user);
			$model->save($role_user);
		}*/

		/*return;
		$model = User_Eloquent::findOrFail($request['id']);
		/*$model->fill($data);
            $model->save($data);*/
		$result = User_Eloquent::updateUser($request);
		redirect('/admin/users');
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
