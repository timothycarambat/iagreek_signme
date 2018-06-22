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

}
