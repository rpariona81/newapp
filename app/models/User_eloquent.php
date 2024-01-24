<?php

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
        'salt',
        'user_type'
    ];

    protected $casts = [
        'lock' => 'boolean',
        'status' => 'boolean'
    ];

    protected $appends = ['userflag','lock'];

    public function getUserflagAttribute()
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

    public function getLockAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->user_type == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    //protected $with = 'getRoles';

    public static function getUsersRoles()
    {
        return User_Eloquent::leftjoin('t_role_user', 't_role_user.user_id', '=', 't_users.id')
            ->leftjoin('t_roles', 't_role_user.role_id', '=', 't_roles.id')
            ->get(['t_users.*', 't_role_user.role_id', 't_roles.rolename']);
    }

    public static function getUser($id)
    {
        return User_Eloquent::leftjoin('t_role_user', 't_role_user.user_id', '=', 't_users.id')
            ->leftjoin('t_roles', 't_role_user.role_id', '=', 't_roles.id')
            ->where('t_users.id', '=', $id)
            ->select('t_users.*', 't_role_user.role_id', 't_roles.rolename')
            ->first();
    }

    public static function getUserAccesos($id)
    {
        return User_Eloquent::leftjoin('t_role_user', 't_role_user.user_id', '=', 't_users.id')
            ->leftjoin('t_roles', 't_role_user.role_id', '=', 't_roles.id')
            ->where('t_users.id', '=', $id)
            ->select('t_users.*', 't_role_user.role_id', 't_roles.rolename')
            ->first();
    }

    public static function updateUser($request)
    {
        $data = array(
            'display_name' => $request['display_name'],
            'mobile' => $request['mobile'],
            'email' => $request['email']
        );

        /*$role_user = new RoleUser_Eloquent();
        $role_user = array(
            'user_id' => $request['id'],
            'role_id' => $request['role_id']
        );*/

        $model = User_Eloquent::findOrFail($request['id']);
        $model->fill($data);
        $model->save($data);

        $role = Role_Eloquent::findOrFail($request['role_id']);

        if ($role) {
            $role_user = RoleUser_Eloquent::where('user_id',  $request['id'])->first();

            if ($role_user !== null) {
                $role_user->update(['role_id' => $request['role_id']]);
            } else {
                $user = RoleUser_Eloquent::create([
                    'user_id' => $request['id'],
                    'role_id' => $request['role_id']
                ]);
            }
        }

        /*if ($role) {
            print_r($role_user);
            $model = RoleUser_Eloquent::updateOrCreate($role_user);
        }*/

        return;
    }
}
