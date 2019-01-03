<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    public $primaryKey = 'sid';
    public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        'name', 'price', 'discount',
    ];
}
