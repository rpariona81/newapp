<?php

class Users extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//$this->load->helper('security');
		$this->load->model('User_eloquent');
		$this->load->model('Role_eloquent');
		$this->load->model('Roleuser_eloquent');
	}


	public function index()
	{
		$role_select = $this->input->post('role_select', true);
		$this->data['role_Value'] = isset($role_select) ? $role_select : null;

		$status_select = $this->input->post('status_select', true);
		$this->data['status_Value'] = isset($status_select) ? $status_select : null;

		$this->data['records'] = User_Eloquent::getUsersRoles($this->session->userdata('user_id'), $role_select, $status_select);

		//$this->data['records'] = User_Eloquent::DDgetUsersRoles($this->session->userdata('user_id'), $role_select, $status_select);

		

		//$this->data['info'] = 'Bienvenido(a) ' . $this->session->userdata('user_login');
		//$this->data['records'] = User_Eloquent::getUsersRoles($this->session->userdata('user_id'));
		$this->data['roles'] = Role_Eloquent::getRoleOpciones();
		$this->data['condiciones'] = User_Eloquent::getListStatusUsers();

		//print_r(json_encode($this->data));
		$this->render('admin/users/index');
	}

	public function show($id)
	{
		$model = User_Eloquent::getUser($id);
		if ($model) {
			try {
				$this->data['user'] = User_Eloquent::getUser($id);
				$this->data['roles'] = Role_Eloquent::getRoleOpciones();
				$this->render('admin/users/edit');
			} catch (\Throwable $th) {
				redirect('admin/users/index');
			}
		} else {
			redirect('admin/users/index');
		}
	}

	public function update()
	{
		$request = $this->security->xss_clean($this->input->post());
		$result = User_Eloquent::updateUser($request);
		//redirect('/admin/users');
		if ($result) {
			$this->session->set_flashdata('message', 'Actualización de '.$result['username'].' exitosa.');
			//return redirect()->back()->with('message', 'User status updated successfully!');
			return redirect_back();
		} else {
			$this->session->set_flashdata('error', 'Error en actualización.');
			return redirect_back();
		}
		//return redirect()->back()->with('error', 'User status update fail!');
	}

	public function newuser()
	{
		$this->data['roles'] = Role_Eloquent::getRoleOpciones();
		$this->render('admin/users/add');
	}

	public function create()
	{
		$request = $this->security->xss_clean($this->input->post());
		$request['user_type'] = $this->session->userdata('user_level') + 1;
		$request['created_by'] = $this->session->userdata('user_id');
		//$result = User_Eloquent::create($request);
		$result = User_Eloquent::createUser($request);
		if ($result) {
			$this->session->set_flashdata('message', 'Nuevo usuario '.$result['username'].' registrado.');
			//return redirect()->back()->with('message', 'User status updated successfully!');
			return redirect_back();
		} else {
			$this->session->set_flashdata('error', 'Error en registro.');
			return redirect_back();
		}
		//return redirect()->back()->with('error', 'User status update fail!');
	}

	public function activeUser()
	{
		$request = $this->security->xss_clean($this->input->post());
		$result = User_Eloquent::enableUser($request);
		//redirect('/admin/users');
		if ($result) {
			$this->session->set_flashdata('success', 'Usuario '.$result['username'].' activado.');
			//return redirect()->back()->with('message', 'User status updated successfully!');
			return redirect_back();
		} else {
			$this->session->set_flashdata('error', 'Error en activación.');
			return redirect_back();
		}
	}

	public function inactiveUser()
	{
		$request = $this->security->xss_clean($this->input->post());
		$result = User_Eloquent::disableUser($request);
		//redirect('/admin/users');
		if ($result) {
			$this->session->set_flashdata('success', 'Usuario '.$result['username'].' desactivado.');
			//return redirect()->back()->with('message', 'User status updated successfully!');
			return redirect_back();
		} else {
			$this->session->set_flashdata('error', 'Error en desactivación.');
			return redirect_back();
		}
		//return redirect()->back()->with('error', 'User status update fail!');
	}
}
