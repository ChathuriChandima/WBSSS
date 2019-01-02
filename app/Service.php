<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    public $primaryKey = 'sid';
    public $timestamps = true;

    protected $fillable = [
        'name', 'price', 'discount',
    ];
}
