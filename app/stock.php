<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $table = 'stocks';
    public $primaryKey = 'code';
    public $timestamps = true;
}
