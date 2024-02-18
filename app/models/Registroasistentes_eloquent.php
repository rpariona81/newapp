<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

use Eloquent\BaseModel;
use \Illuminate\Database\Capsule\Manager as DB;

class Registroasistentes_Eloquent extends BaseModel
{

	protected $table = 't_registroasistentes';
	//protected $dateFormat = 'Ymd H:i:s';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'time',
		'region', //lowercase
		'codentidad', // optional
		'titulo_entidad', //optional, set to 1 by default
		'dni', //optional, set to 1 by default
		'nombres',
		'apellidos', //optional, set to 1 by default
		'correo',
		'telf_celular',
		'cargo',
		'programa_cargo_especifico',
		'reunion',
		'dirigido_a',
		'hora_inicio',
		'hora_fin',
		'responsable',
		''
	];

	

	
}
