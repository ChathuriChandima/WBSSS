<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    public $fillable = ['code','name','type','availableStock','purchasedStock','soldStock','price'];
    protected $table = 'stocks';
    public $primaryKey = 'code';
    public $incrementing = false;
    public $timestamps = true;

}
