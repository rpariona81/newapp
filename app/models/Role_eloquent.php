<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Eloquent\BaseModel;

class Role_Eloquent extends BaseModel
{

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

    protected $appends = ['roleflag'];

    public function getRoleflagAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->status) {
            return 'Activo';
        } else {
            return 'Suspendido';
        }
    }
}
