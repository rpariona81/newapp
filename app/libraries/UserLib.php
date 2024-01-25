<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class UserLib
{

    private $ci;

    public function __construct()
    {
        $this->ci = & get_instance(); 
        // Esto para acceder a la instancia que carga la librería
        $this->ci->load->model('User_eloquent');
        $this->ci->load->model('Role_eloquent');
        $this->ci->load->model('Roleuser_eloquent');
        //$this->isLogged = FALSE;
    }

    public function login($user, $pass)
    {
        $query = User_eloquent::getLogin($user, $pass);
        //print_r($query);
        if ($query['isLogged']) {
            $this->ci->session->set_userdata($query);
            //print_r($query);
            return $query;
        } else {
            $this->ci->session->sess_destroy();
            $this->ci->session->set_flashdata($query['error']);
            return $query;
        }
        //return User_eloquent::getLogin($user, $pass);
        /*$userValidate = User_Eloquent::getUserBy('username', '=', $user)->first();
        if ($userValidate->status) {
            if (password_verify($pass, $userValidate['password'])) {
                $role = Role_Eloquent::findOrFail($userValidate['role_id']);
                if ($role) {
                    $arrayUser = array(
                        'user_login' => $userValidate['username'],
                        'user_nickname' => $userValidate['display_name'],
                        'user_email' => $userValidate['email'],
                        'user_id' => $userValidate['id'],
                        'user_rol' => $userValidate['rolename'],
                        'user_condicion' => $userValidate['graduated'],
                        'user_rol_id' => $userValidate['role_id'],
                        'user_level' => $userValidate['user_type']
                    );
                    $this->ci->session->set_userdata($arrayUser);
                    $this->isLogged = TRUE;
                    $this->ci->session->set_userdata('isLogged', $this->isLogged);
                } else {
                    $this->ci->session->set_flashdata('No tiene rol asignado.');
                    $this->isLogged = FALSE;
                }
            } else {
                $this->ci->session->set_flashdata('Error de contraseña.');
                $this->isLogged = FALSE;
            }
        } else {
            $this->ci->session->set_flashdata('Usuario no existe o no autorizado.');
            $this->isLogged = FALSE;
        }
        return $this->isLogged;*/
    }
}
