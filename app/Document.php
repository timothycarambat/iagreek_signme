<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function signPrimaryDocumentText($sign_request){
      $user = User::where('id', (integer)$sign_request->member_id )->get()[0];
      $content = htmlspecialchars_decode($this->content);
      $content = preg_replace("<<%NAME%>>", ucwords($user->name), $content);
      $content = preg_replace("<<%DATE%>>", \Carbon\Carbon::now()->toFormattedDateString(), $content);

      $user = User::where('id', (integer)$sign_request->member_id )->get()[0];
      $content .= "<br><br><p>Digitally Signed By: <u>".($user->name)."</u></p>";
      $content .= $this->appendApprovals($sign_request);
      return $content;
    }

    public function formatDocumentText($sign_request){
      $user = User::where('id', (integer)$sign_request->member_id )->get()[0];
      $content = htmlspecialchars_decode($this->content);
      $content = preg_replace("<<%NAME%>>", ucwords($user->name), $content);
      $content = preg_replace("<<%DATE%>>", \Carbon\Carbon::now()->toFormattedDateString(), $content);

      $content .= $this->appendMainSignature($sign_request);
      $content .= $this->appendApprovals($sign_request);

      return $content;
    }

    public function appendMainSignature($sign_request){
      if($sign_request->status){
        $user = User::where('id', (integer)$sign_request->member_id )->get()[0];
        return "<br><br><p>Digitally Signed By: <u>".($user->name)."</u></p>";
      }
    }

    public function appendApprovals($sign_request){
      $additonals = (array)json_decode($sign_request->additionals);
      $additonals = array_values($additonals);
      $completed = (array)array_pop($additonals);
      $approval_text = "";

      if( !empty($completed) ){
        foreach($completed as $user){
          $user = User::where('id', (integer)$user)->get()[0];
          $approval_text .= "
            <p>Digitally Approved and Signed By: <u>".($user->name)."</u></p>
          ";
        }
      }

      return $approval_text;
    }

}
