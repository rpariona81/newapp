<?php

namespace Eloquent;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Eloquent\BaseModel;

class Role_Eloquent extends BaseModel{
    
    protected $table = 't_roles';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rolename',
        'guard_name', //lowercase
        'description', // optional
        'level' //optional, set to 1 by default
    ];


}
