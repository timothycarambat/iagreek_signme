<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\SignRequest;
use App\Document;

class PagesController extends Controller
{
    public function home(){
      return view('app.login',
      [
        'title'=>'Greek Document Managment',
        'view'=>'login'
      ]);
    }

    public function forgot(){
      return view('auth.passwords.email',
      [
        'title'=>'Greek Document Managment',
        'view'=>'forgot'
      ]);
    }

    public function dashboard(){
      return view('app.dashboard',
      [
        'title'=>'Pending Signature Requests',
        'view'=>'dashboard',
        'sign_requests'=> Auth::user()->sign_requests->where('status', false),
        'approvals' => SignRequest::getRequestWhereUserIsAdditional(),
      ]);
    }

    public function history(){
      return view('app.history',
      [
        'title'=>'Past Signatures',
        'view'=>'history',
        'sign_requests'=> Auth::user()->sign_requests->where('status', true),
      ]);
    }

    public function sign($sign_request_id, $doc_id){
      $document = Document::where('id', (integer)$doc_id)->get()[0];
      return view('app.sign',
      [
        'title'=>'Sign Document :: '.$document->name,
        'view'=>'sign',
        'document' => $document,
        'sign_request' => SignRequest::where('id', (integer)$sign_request_id)->get()[0],
        'letterhead' => Auth::user()->org_admin->letterhead,
      ]);
    }

    public function approve($sign_request_id, $doc_id){
      $document = Document::where('id', (integer)$doc_id)->get()[0];
      return view('app.approve',
      [
        'title'=>'Approve Document :: '.$document->name,
        'view'=>'approve',
        'document' => $document,
        'sign_request' => SignRequest::where('id', (integer)$sign_request_id)->get()[0],
        'letterhead' => Auth::user()->org_admin->letterhead,
      ]);
    }

}
