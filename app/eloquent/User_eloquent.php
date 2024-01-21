<?php
namespace Eloquent;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Eloquent\BaseModel;
use \Illuminate\Database\Capsule\Manager as DB;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class User_Eloquent extends BaseModel
{
    protected $table = 't_users';


    protected $fillable = [
        'username',
        'display_name',
        'mobile',
        'role_id',
        'email',
        'password',
        'salt',
        'user_type', //rango 1=admin 2=others users
        'remember_token', //varchar
        'email_verified_at', //datetime
        'api_token',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'lock' => 'boolean',
        'status' => 'boolean'
    ];

    protected $appends = ['flag'];

    public function getFlagAttribute()
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
