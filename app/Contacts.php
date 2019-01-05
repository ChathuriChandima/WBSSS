<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'email', 'phone', 'subject','message','isResponded',
    ];

}
