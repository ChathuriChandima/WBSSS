<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    public $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'address', 'email',
    ];
}
