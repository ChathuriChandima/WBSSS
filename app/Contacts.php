<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contacts extends Model
{
  // using the notifable trait to notify contact forms
  use Notifiable;

    protected $table = 'contacts';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'email', 'phone', 'subject','message','isResponded',
    ];

}
