<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary extends Model
{
    protected $table = 'salary';
    public $primaryKey = 'refNo';
    public $timestamps = true;
}
