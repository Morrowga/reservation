<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    
    public function usercreate(Request $request){
        $users = User::where('role', '!=', 'hotel_manager')->paginate(10);
        return view('panel.user', compact('users'));
    }

    public function lists(){
        $reservations = Reservation::orderby('created_at', 'DESC')->paginate(10);
        return view('panel.reslist', compact('reservations'));
    }


    public function edit($id){
        $res = Reservation::findOrFail($id);
        return view('panel.edit', compact('res'));
    }

}
