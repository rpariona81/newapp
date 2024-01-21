<?php

namespace Eloquent;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Eloquent\BaseModel;

class MenuRole_Eloquent extends BaseModel{
    
    protected $table = 't_menu_role';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'menu_id',
        'role_id', 
    ];


}
