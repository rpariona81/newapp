<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class MenuLib {

    private $ci;
    function __construct() {
        $this->ci = & get_instance(); // Esto para acceder a la instancia que carga la librería
        $this->ci->load->model('Menu_eloquent');
        $this->ci->load->model('Role_eloquent');
    }

    public function findByController($controller) {
        $query = Menu_eloquent::where('controller','=', $controller)->select('id')->get();
        
        return $query;
    }

}