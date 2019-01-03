<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $table = 'bills';
    public $primaryKey = 'billNo';
    public $timestamps = true;
    public $incrementing = false;
}
