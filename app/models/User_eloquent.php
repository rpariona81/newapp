<?php

use Eloquent\BaseModel;
use \Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

	protected $appends = ['userflag', 'lock'];

	// Carbon instance fields
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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

		// $model = User_Eloquent::findOrFail($request['id']);
		// $model->fill($data);
		// $model->save($data);

		try {
			$model = User_Eloquent::findOrFail($request['id']);
			//$model->fill($data);
			//$model->save($data);

			$role = Role_Eloquent::findOrFail($request['role_id']);	//code...

			if($model){
				$model->fill($data);
				$model->save($data);	
			}
			
			if ($role) {
				$role_user = RoleUser_Eloquent::where('user_id',  $request['id'])->first();

				if ($role_user !== null) {
					$role_user->update(['role_id' => $request['role_id']]);
					return $role_user;
				} else {
					$user = RoleUser_Eloquent::create([
						'user_id' => $request['id'],
						'role_id' => $request['role_id']
					]);
					return $user;
				}
			} else {
				return FALSE;
			}
		} catch (ModelNotFoundException $e) {
			//throw $th;
			return FALSE;
		}


		// if ($role) {
		//     $role_user = RoleUser_Eloquent::where('user_id',  $request['id'])->first();

		//     if ($role_user !== null) {
		//         $role_user->update(['role_id' => $request['role_id']]);
		// 		return $role_user;
		//     } else {
		//         $user = RoleUser_Eloquent::create([
		//             'user_id' => $request['id'],
		//             'role_id' => $request['role_id']
		//         ]);
		// 		return $user;
		//     }
		// }else{
		// 	return FALSE;
		// }

		// if($role_user->save()){
		// 	return TRUE;
		// }else{
		// 	return FALSE;
		// }

	}

	public static function getUserBy($column, $value)
	{
		return User_Eloquent::leftjoin('t_role_user', 't_role_user.user_id', '=', 't_users.id')
			->leftjoin('t_roles', 't_role_user.role_id', '=', 't_roles.id')
			->select('t_users.*', 't_role_user.role_id', 't_roles.rolename')
			->where($column, '=', $value)->first();
	}

	public static function getLogin($user, $pass)
	{
		$userValidate = User_Eloquent::where('username', '=', $user)->first();
		if (is_null($userValidate)) {
			$arrayLogin = array(
				'error' => 'Usuario no registrado.',
				'isLogged' => FALSE,
			);
			return $arrayLogin;
		} else {
			if ($userValidate->status) {
				if (password_verify($pass, $userValidate['password'])) {
					$role_user = RoleUser_Eloquent::where('user_id',  $userValidate['id'])->first();
					//print_r($role_user);
					$role = Role_Eloquent::findOrFail($role_user['role_id']);
					if ($role) {
						if ($role->status) {
							$arrayLogin = array(
								'user_login' => $userValidate['username'],
								'user_nickname' => $userValidate['display_name'],
								'user_email' => $userValidate['email'],
								'user_id' => $userValidate['id'],
								'user_role' => $role['rolename'],
								'user_guard' => $role['guard_name'],
								'user_role_id' => $role['id'],
								'user_level' => $userValidate['user_type'],
								'isLogged' => TRUE,
							);
							//print_r($arrayLogin);
							return $arrayLogin;
						} else {
							$arrayLogin = array(
								'error' => 'Usuario no tiene rol autorizado',
								'isLogged' => FALSE,
							);
							return $arrayLogin;
						}
					} else {
						$arrayLogin = array(
							'error' => 'No tiene rol asignado',
							'isLogged' => FALSE,
						);
						return $arrayLogin;
					}
				} else {
					$arrayLogin = array(
						'error' => 'Error de contraseña',
						'isLogged' => FALSE,
					);
					return $arrayLogin;
				}
			} else {
				$arrayLogin = array(
					'error' => 'Usuario no autorizado.',
					'isLogged' => FALSE,
				);
				return $arrayLogin;
			}
			return;
		}
	}
}
