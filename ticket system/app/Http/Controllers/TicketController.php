<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;

class TicketController extends Controller
{
    
    public function home(){
        // $user_id = Auth::user()->id;
        // $tickets = Auth::user()->tickets;
        $tickets = Ticket::all();
        return view('user.home',['tickets' => $tickets]);
        // return view('user.home');
    }

    public function create(Request $request){
        // Ticket::create([
        //     'user_id'=> auth()->user()->id,
        //     'title' => $request->title,
        //     'service_id' => $request->service_id,
        //     'description' => $request->description,
        // ]);
    }
}
