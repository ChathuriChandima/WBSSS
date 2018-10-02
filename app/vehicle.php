<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $table = 'vehicles';
    public $primaryKey = 'vehicleNo';
    public $timestamps = true;

    public function customerer(){
        return $this->belongsTo('App\Customer');
    }
    public function account(){
        return $this->belongsTo('App\Staff');
    }
}
