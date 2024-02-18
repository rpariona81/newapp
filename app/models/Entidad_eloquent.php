<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

use Eloquent\BaseModel;
use \Illuminate\Database\Capsule\Manager as DB;

class Entidad_Eloquent extends BaseModel
{

	protected $table = 't_entidades';
	//protected $dateFormat = 'Ymd H:i:s';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'codregion',
		'region', //lowercase
		'codentidad', // optional
		'entidad', //optional, set to 1 by default
		'titulo_entidad', //optional, set to 1 by default
		'codtipo_entidad',
		'tipo_entidad', //optional, set to 1 by default
		'codgestion_entidad',
		'gestion_entidad'
	];

	public static function getEntidades($region, $tipo)
	{
		$entidades = array();
		$entidades[0] = 'Seleccione entidad';
		$lista = Entidad_Eloquent::select('codentidad', 'titulo_entidad')
			->where('codregion', $region)
			->where('codtipo_entidad', $tipo)
			->where('estado', '=', 1)->get();
		foreach ($lista as $registro) {
			$entidades[$registro->codentidad] = $registro->titulo_entidad;
		}
		$entidades['GOBNAMINEDU'] = 'MINEDU';
		$entidades['OTROS'] = 'OTRA INSTITUCIÓN';
		/*$minedu = ['GOBNAMINEDU'=>'MINEDU'];
		$otros = ['OTROS'=>'OTRA INSTITUCIÓN'];
		array_push($entidades,$minedu);
		array_push($entidades,$otros);
		/*array_push($entidades,$minedu);
		array_push($entidades,$otros);*/
		return $entidades;
	}

	public static function all_by_name($rolename)
	{
		$model = Menu_Eloquent::where('menu', 'LIKE', "%{$rolename}%")->get();
		return $model;
	}

	public static function all_filter($field, $value)
	{
		$model = Menu_Eloquent::where($field, 'LIKE', "%{$value}%")->get();
		return $model;
	}

	public static function findRecord($id)
	{
		$model = Menu_Eloquent::findOrFail('id', $id);
		return $model;
	}

	public static function insertRecord($registro)
	{

		$model = new Menu_Eloquent();
		$model->fill($registro);
		$model->save($registro);

		return $model;
	}

	public static function updateRecord($registro)
	{
		$model = Menu_Eloquent::findOrFail('id', $registro['id']);
		$model->fill($registro);
		$model->save($registro);
		return $model;
	}

	public static function menu_usuario($role_id)
	{
		//$query = $this->db->query('select * from menus where id in (select menu_id from menu_perfil where perfil_id=' . $role_id . ')');
		//return $query->result();

		//return DB::select('SELECT * FROM t_menus t1 WHERE id IN (SELECT menu_id FROM t_menu_role WHERE role_id = ?');
		return Menu_Eloquent::leftjoin('t_menu_role', 't_menu_role.menu_id', '=', 't_menus.id')
			->leftjoin('t_roles', 't_menu_role.role_id', '=', 't_roles.id')
			->where('t_menu_role.role_id', '=', $role_id)
			->where('t_roles.status', '=', 1)
			->get(['t_menus.*', 't_roles.guard_name']);

		/*$roles_menus = DB::table('t_postulatejob')
            ->selectRaw('count(id) as cant_postulantes, offer_id')
            ->groupBy('offer_id');

        $data = Menu_Eloquent::leftjoin('t_menu_role', 't_careers.id', '=', 't_offersjob.career_id')
            ->leftjoinSub($cantPostulates, 'cantPostulates', function ($join) {
                $join->on('t_offersjob.id', '=', 'cantPostulates.offer_id');
            })
            ->orderBy('t_offersjob.updated_at', 'desc')
            ->get(['t_offersjob.*', 't_careers.career_title', 'cantPostulates.cant_postulantes']);

        return $data;*/

		//$model = Menu_Eloquent::leftjoin('t_menu_role', ('id', $registro['id']);
	}
}
