<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot extends Model
{
    protected $table = 'ots';
    public $primaryKey = 'date';
    public $timestamps = true;
}
