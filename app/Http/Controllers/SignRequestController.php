<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

use App\SignRequest;
use App\Document;
use App\Campaign;
use App\PDFGenerator;

class SignRequestController extends Controller
{
    public static function sign($sign_request_id,$doc_id){
      return PDFGenerator::makePDF();
    }


}
