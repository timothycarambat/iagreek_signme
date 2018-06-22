<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Storage;

use App\SignRequest;
use App\Document;
use App\Campaign;
use App\PDFGenerator;

class SignRequestController extends Controller
{
    //for when user is primary signer
    public static function sign($sign_request_id,$doc_id){
      $sign_request = SignRequest::where('id',(integer)$sign_request_id)->get()[0];
      $document = Document::where('id', (integer)$doc_id)->get()[0];
      //determine if this is final sig or not. If it is save file to S3, if not then send email to next signer.

      if( $sign_request->hasAdditionals() ){
        $sign_request->alertNextSigner( $sign_request->getNextAdditional() );
        $sign_request->update([
          'status' => true,
        ]);
      }else{
        $doc_props = PDFGenerator::makePDF($sign_request->campaign, $document);
        Storage::disk('local')->delete("/".$doc_props['doc_name']);
        //process is now complete, we can mark request
        $sign_request->update([
          'status' => true,
          'completed' => true,
          'file_link' => $doc_props['file_link'],
        ]);
      }

      Session::flash('success','Thank You For Your Signature!');
      return Redirect::to('/dashboard')->send();
    }
}
