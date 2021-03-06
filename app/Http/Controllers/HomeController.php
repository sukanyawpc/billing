<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Textlocal\Textlocal;
use App\Detail;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$company=Company::where('user_id',Auth::user()->id)->first();

        $user_id = Auth::user()->id;
        // dd($user_id);
        $company=Detail::where('user_id',$user_id)->get();
        //dd($company);
        return view('Company.index')->withCompany($company);
    }

    public function sendsms()
    {

    $Textlocal = new Textlocal(false, false,'0fCaaLSB9mU-EgX1Vx2JmiChxCm1xfgOLbEjuFzPWp');
 
    $numbers = array();
    $sender = 'TXTLCL';
    $message = 'Hello lady.. looking sweet today.';
 
    $response = $Textlocal->sendSms($numbers, $message, $sender);
    dd($response);

    }
}
