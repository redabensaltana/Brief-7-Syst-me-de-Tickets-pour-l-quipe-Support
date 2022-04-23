<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
