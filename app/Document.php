<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function formatDocumentText($user){
      $content = htmlspecialchars_decode($this->content);
      $content = preg_replace("<<%NAME%>>", ucwords($user->name), $content);
      $content = preg_replace("<<%DATE%>>", \Carbon\Carbon::now()->toFormattedDateString(), $content);
      return $content;
    }

    public function finishDocument($user, $sign_request){
      $content = $this->formatDocumentText($user);
      $content .= "<div>";
      $content .= "
        <p>Digitally Signed By: <u>".($user->name)."</u></p>
      ";

      $additonals = (array)json_decode($sign_request->additionals);
      $additonals = array_values($additonals);
      $completed = (array)array_pop($additonals);

      if( !empty($completed) ){
        foreach($completed as $user){
          $user = User::where('id', (integer)$user)->get()[0];
          $content .= "
            <p>Digitally Approved and Signed By: <u>".($user->name)."</u></p>
          ";
        }
      }
      $content .= "</div>";

      return $content;
    }

}
