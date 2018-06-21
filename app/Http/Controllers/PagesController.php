<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\SignRequest;

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
        'sign_requests'=> Auth::user()->sign_requests,
        'approvals' => SignRequest::getRequestWhereUserIsAdditional(),
      ]);
    }

}
