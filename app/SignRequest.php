<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

use App\Campaign;

class SignRequest extends Model
{
  protected $fillable = [
    'campaign_id',
    'member_id',
    'status',
    'completed',
    'additional_required',
    'additionals',
    'file_link',
  ];

  public static function getRequestWhereUserIsAdditional(){
    $user = Auth::user()->id;
    $additional_requests = collect([]);
    $campaign_ids = Campaign::where('org_admin_id', Auth::user()->org_admin->id) //get campaigns owned by members admins org
    ->where('archived',false) //that are active
    ->pluck('id');
    $requests = SignRequest::whereIn('campaign_id',$campaign_ids) //get all signing reqs of active campaigns
    ->where('additional_required',true) //where they need addtionals
    ->where('status',true) //and the primary signer has signed
    ->where('completed', false) //and they are still incomplete
    ->get();

    foreach($requests as $req) {
      $additonals = (array)json_decode($req->additionals);
      $additonals = array_values($additonals);
      $completed = (array)array_pop($additonals);
      //is user is in additionals array and NOT in completed -> they need to sign
      if( in_array($user, $additonals) && !in_array($user, $completed) ){
        $additional_requests[] = $req;
      }
    }

    return $additional_requests;
  }

  public function member() {
       return $this->belongsTo('App\Member', 'member_id', 'id');
  }

  public function campaign() {
     return $this->belongsTo('App\Campaign', 'campaign_id', 'id');
  }
}
