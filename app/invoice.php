<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    public $primaryKey = 'invoiceNo';
    public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        'supplierId', 'price', 'date',
    ];
}
