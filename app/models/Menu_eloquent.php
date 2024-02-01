<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Eloquent\BaseModel;

class Menu_Eloquent extends BaseModel{
    
    protected $table = 't_menus';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'menu',
        'controller', //lowercase
        'action', // optional
        'orden', //optional, set to 1 by default
        'url', //optional, set to 1 by default
        'menu_type',
        'icono' //optional, set to 1 by default
    ];

    public static function getMenuOpciones()
    {
        $opcionesMenu = array();
        $opcionesMenu[0] = 'Seleccione menu';
        $lista = Menu_Eloquent::select('id', 'menu')->where('status','=',1)->get();
        foreach ($lista as $registro) {
            $opcionesMenu[$registro->id] = $registro->menu;
        }
        return $opcionesMenu;
    }
}
