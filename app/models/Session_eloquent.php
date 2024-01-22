<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 't_sessions';
    //
    protected $appends = ['expires_at'];

    public function isExpired(){
        return $this->timestamp < Carbon::now()->subMinutes($this->config['sess_expiration'])->getTimestamp();
    }

    public function getExpiresAtAttribute(){
        return Carbon::createFromTimestamp($this->timestamp)->addMinutes($this->config['sess_expiration'])->toDateTimeString();
    }
}
