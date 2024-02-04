<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_hooks
{

    private $ci;
    function __construct()
    {
        $this->ci = &get_instance(); // Esto para acceder a la instancia que carga la librería
        $this->ci->load->model('Menu_eloquent');
        $this->ci->load->model('Menurole_eloquent');
        $this->ci->load->model('Role_eloquent');
    }


    public function autentificar()
    {
        //$this->ci = & get_instance();
        /*$guard_name = $this->ci->uri->segment(1);
        $controller = $this->ci->uri->segment(2);
        $action = $this->ci->uri->segment(3);
        $url = $guard_name . "/" . $controller . "/" . $action;
        */

        $guard_name = $this->ci->uri->segment(1);
        $controller = $this->ci->uri->segment(2);
        $action = $this->ci->uri->segment(3);
        if (is_null($guard_name)) {
            $url = $this->ci->uri->segment(1);
        } elseif (is_null($controller)) {
            $url = $guard_name;
        } elseif (is_null($action)) {
            $url = $guard_name . "/" . $controller;
        } else {
            $url = $guard_name . "/" . $controller . "/" . $action;    # code...
        }

        $libres = array('/', 'home', 'home/index', 'home/acceso_denegado', 'home/ingreso', 'home/acerca_de', 'home/ingresar', 'home/salir', 'home/auth', 'home/logout');

        $nolibres = (array)Menu_eloquent::select('controller')->get();
        
        var_dump($url);
        if (in_array($url, $libres)) {
            //print_r($url);
            echo $this->ci->output->get_output();
        } elseif(in_array($controller, $nolibres)) {
            if (is_null($this->ci->session->userdata('user_guard'))) {
                redirect('/home');
                exit;
            } else {
                /*var_dump($this->ci->session->userdata('user_guard'));
                die();*/
                if ($this->ci->session->userdata('user_guard') == $guard_name) {
                    var_dump($this->autorizar());
                    if ($this->autorizar()) {
                        echo $this->ci->output->get_output();
                    } else {
                        //redirect('home/acceso_denegado');
                        redirect(site_url($guard_name) . '/index');
                        exit;
                    }
                    /*var_dump($this->ci->session->userdata('user_guard') == $guard_name);
                die();*/
                } else {
                    /*var_dump($this->ci->session->userdata('user_guard') == $guard_name);
                die();
                    /*print_r($guard_name);
                    //redirect('home/acceso_denegado');*/
                    redirect(base_url().$this->ci->session->userdata('user_guard') .'/index');
                    //exit;
                    /*var_dump(base_url().$this->ci->session->userdata('user_guard') .'/index');*/
                    exit;
                }
            }
        }else{
            redirect('/home');
        }
    }

    public function autorizar()
    {
        //$this->ci = & get_instance();
        // El perfil del usuario logueado
        $role_id = $this->ci->session->userdata('user_role_id');
        // Con el controlador, buscar la opcion en la tabla de menus
        //$this->ci->load->library('MenuLib');
        $controller = $this->ci->uri->segment(2);
        //$menu_id = $this->ci->menulib->findByController($controller);
        $guard_name = $this->ci->session->userdata('user_guard');

        $menu_id = Menu_eloquent::where('controller', '=', $controller)->where('guard_name', '=', $guard_name)->select('id')->get();

        if (is_null($menu_id)) {
            return FALSE;
        }

        if (is_null($role_id)) {
            return FALSE;
        }

        /*$data['rol'] = $role_id;
        $data['menu'] = $menu_id;
        print_r($data);*/
        // 
        //$this->ci->load->library('Menu_PerfilLib');
        //$controller = $this->ci->uri->segment(2);
        //$acceso = $this->ci->menu_perfillib->findByMenuAndPerfil($role_id, $menu_id)->id;
        $acceso = Menurole_eloquent::leftjoin('t_roles', 't_roles.id', '=', 't_menu_role.role_id')
            ->where('t_menu_role.menu_id', '=', $menu_id)
            ->where('t_menu_role.role_id', '=', $role_id)
            ->where('t_roles.status', '=', '1')
            ->get('t_roles.status');
        //->get(['t_menus.*', 't_roles.guard_name']);
        if (!$acceso) {
            return FALSE;
        }

        return TRUE;
    }
}
