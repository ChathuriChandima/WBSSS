<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    public $primaryKey = 'Id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'address', 'email','contactNo',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function customer(){
        return $this->hasOne('App\vehicle');
    }
}
