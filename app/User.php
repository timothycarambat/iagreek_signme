<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'members';
    protected $fillable = [
      "name",
      "email" ,
      "password",
      "position",
      "status",
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sign_requests() {
      return $this->hasMany('App\SignRequest', 'member_id', 'id');
    }

    public function org_admin() {
       return $this->belongsTo('App\Admin', 'org_admin_id', 'id');
    }
}
