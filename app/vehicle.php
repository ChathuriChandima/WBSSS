<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{

    public $fillable = ['vehicleNo','type','description','brand'];
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
