<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $table = 'invoices';
    public $primaryKey = 'invoiceNo';
    public $timestamps = true;
}
