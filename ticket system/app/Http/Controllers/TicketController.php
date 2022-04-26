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

    public function adminDashboard(){
        $tickets = Ticket::all();

        return view('admin.index',['tickets'=>$tickets]);
    }

    public function adminTicket($id){
        $ticket = Ticket::findorfail($id);

        $answers = DB::table('answers')
        ->join('users', 'answers.user_id', '=', 'users.id')
        ->select('answers.content','answers.is_admin', 'users.name' , 'users.id')
        ->where('ticket_id', '=', $id)
        ->get();

        return view('admin.ticket_answers',["ticket"=>$ticket, "answers"=>$answers]);
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

    public function ticket($id){
        $ticket = Ticket::findorfail($id);
        
        $answers = DB::table('answers')
            ->select('answers.*')
            ->where('ticket_id', '=', $id)
            // ->where('user_id', '=', Auth::user()->id) no need
            ->get();

        return view('user.ticket_answers',["ticket"=>$ticket, "answers"=>$answers]);

    }

    public function setToSolved($id){
        $ticket = Ticket::find($id);
        $ticket->status = 'solved';
        $ticket->save();

        return back();
    }

    public function setToClosed($id){

        $ticket = Ticket::find($id);
        $ticket->status = 'closed';
        $ticket->save();

        return back();
    }
}
