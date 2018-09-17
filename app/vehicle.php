<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $table = 'vehicles';
    public $primaryKey = 'vehicleNo';
    public $timestamps = true;
}
