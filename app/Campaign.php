<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
  protected $fillable = [
    "name" ,
    "data",
    "document_id",
    "expiry",
    "archived",
    "org_admin_id",
    "dir",
  ];
  public function sign_requests() {
    return $this->hasMany('App\SignRequest', 'campaign_id', 'id');
  }
}
