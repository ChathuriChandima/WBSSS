<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    public $fillable = ['vehicleNo','cId','type','lastServiceDay','brand'];

    protected $table = 'vehicles';
    public $primaryKey = 'vehicleNo';
    public $timestamps = true;
    public $incrementing = false;

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

}
