<?php

class Users extends MY_Controller{

    public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//$this->load->helper('security');
		$this->load->model('User_eloquent');
		$this->load->model('Role_eloquent');
		$this->load->model('Roleuser_eloquent');
	}


    public function index(){
        $this->data['info'] = 'Bienvenido(a) '.$this->session->userdata('user_login');
        $this->data['records'] = User_Eloquent::getUsersRoles();
        $this->render('admin/users/index');

    }

	public function show($id)
	{
		$this->data['user'] = User_Eloquent::getUser($id);
		$this->data['roles'] = Role_Eloquent::getRoleOpciones();
		$this->render('admin/users/edit');

	}

	public function update()
	{
		$request = $this->security->xss_clean($this->input->post());
		$result = User_Eloquent::updateUser($request);
		//redirect('/admin/users');
		if ($result){
			$this->session->set_flashdata('message', 'Actualización exitosa.');
			//return redirect()->back()->with('message', 'User status updated successfully!');
			return redirect_back();
		}else{
			$this->session->set_flashdata('error', 'Error en actualización.');
			return redirect_back();
		}
		//return redirect()->back()->with('error', 'User status update fail!');
	}

}
