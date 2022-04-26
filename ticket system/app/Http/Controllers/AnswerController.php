<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class AnswerController extends Controller
{
    public function addAnswerDB(Request $request){
        $user_id = Auth::user()->id;
        Answer::create([
         'content' => $request['content'],
         'ticket_id' => $request['ticket_id'],
         'user_id' => $user_id
        ]);

        return back();
    }

    public function adminAddAnswerDB(Request $request){

        Answer::create([
         'content' => $request['content'],
         'ticket_id' => $request['ticket_id'],
         'user_id' => $request['user_id'],
         'is_admin' => true
        ]);

        $ticket = Ticket::find($request['ticket_id']);
        if($ticket->status == 'not answered') $ticket->status = 'answered';
        
        $ticket->save();

        return back();
    }
}
