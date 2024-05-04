<?php

use Eloquent\BaseModel;
use Illuminate\Support\Carbon;

class Session_Eloquent extends BaseModel
{
    protected $table = 't_sessions';
    //
    protected $appends = ['expires_at'];

	public $timestamps = FALSE;

    public function isExpired(){
        return $this->timestamp < Carbon::now()->subMinutes($this->config['sess_expiration'])->getTimestamp();
    }

    public function getExpiresAtAttribute(){
        return Carbon::createFromTimestamp($this->timestamp)->addMinutes($this->config['sess_expiration'])->toDateTimeString();
    }

	public static function insertSession($id)
    {

        $model = new Session_Eloquent();
        $model->id= $id;
        $model->save();

        return $model;
    }

}
