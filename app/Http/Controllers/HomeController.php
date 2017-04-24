<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\GeneralPage;
use App\Trip;
use App\RequestCall;
use App\Voyage;
use App\Highlight;
use App\LoveCount;
use App\Excursion;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(); 
        $this->middleware('auth');
        //$this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
          
        $users=User::select(\DB::raw('count(*) as total, status'))->groupBy('status')->get();
         return view('admin.admin_home',compact('users'));
    }

    
}
