<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Like;
use Auth;
use Session;

class RepliesController extends Controller
{
    //
    public function like($id)
    {
    	$reply =  Reply::find($id);

    	Like::create([

    		'reply_id' => $id,
    		'user_id' => Auth::id()

    	]);

    	Session::flash('success', 'U liked the reply');

    	return redirect()->back();
    }

    public function unlike($id)
    {
    	$like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

    	$like->delete();

    	Session::flash('success', 'U success unliked ');

    	return redirect()->back();
    }

    public function best_answer($id)
    
    {
    	$reply = Reply::find($id);

    	$reply->best_answer = 1;
    	$reply->save();

    	$reply->user->points += 35;
    	$reply->user->save();

    	Session::flash('success', 'Reply has been mark as the best answer');

    	return redirect()->back();

    }

    public function edit($id)
    {
    	return view('discussions.edit-reply', ['reply' => Reply::find($id)]);
    }
    public function update($id)
    {
    	$this->validate(request(), [
    		'content' => 'required'

    	]);
    	$reply =Reply::find($id);
    	$reply->content = request()->content;
    	$reply->save();
    	Session::flash('success', 'Reply updated');
    	return redirect()->route('discussion', ['slug' => $reply->discussion->slug]);
    }
}
