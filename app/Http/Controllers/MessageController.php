<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Team as ModelsTeam;
use Illuminate\Support\Facades\DB;
use App\Models\TeamUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Team;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = ModelsTeam::get();
        $teams =  DB::select('SELECT `user_id`,`team_id` FROM `team_user` WHERE `user_id`= "' . Auth::user()->id . '"');
        return view('messages.messages', compact('team', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ModelsTeam $id)
    {
        $msg = Message::get();
        return view('messages.messages_team', compact('id', 'msg'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (empty($request->msg)) {
        } else {
            Message::create([
                'user_id' => Auth::user()->id,
                'team_id' => $request->id,
                'message' => $request->msg
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
