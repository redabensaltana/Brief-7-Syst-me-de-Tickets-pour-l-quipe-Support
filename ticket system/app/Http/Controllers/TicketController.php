<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;

class TicketController extends Controller
{
    
    public function home(){
        $user_id = Auth::user()->id;
        $tickets = User::find($user_id)->tickets;
        // $tickets = Ticket::all();
        return view('user.home',['tickets' => $tickets]);
    }

    public function addTicket(){
        return view('user.add_ticket');
    }

    public function addTicketDB(Request $request){
        // $title = $request->title;
        // $content = $request->content;
        // $service = $request->service;

        Ticket::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'service' => $request['service'],
            'user_id' => Auth::user()->id,
            
        ]);
        
        return redirect()->route('user.home');
    }
}
