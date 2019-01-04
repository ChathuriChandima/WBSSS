<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    public $primaryKey = 'supplierId';
    public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        'supplierName', 'address', 'contactNo','email',
    ];
}
