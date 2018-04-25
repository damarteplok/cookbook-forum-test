<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    //

    public function index()
    {
    	
    	switch (request('filter')) {
    		case 'me':
    			$results = Discussion::where('user_id', Auth::id())->paginate(3);
    			break;
    		case 'solved':
    			$answered = array();
    			foreach(Discussion::where('user_id', Auth::id())->get() as $d):
    				if($d->hasBestAnswer())
    				{
    				array_push($answered, $d);
    				}
    			endforeach;
    			$results = new Paginator($answered, 3);
    			break;
    		case 'unsolved':
    			$unanswered = array();
    			foreach(Discussion::where('user_id', Auth::id())->get() as $d):
    				if(!$d->hasBestAnswer())
    				{
    				array_push($unanswered, $d);
    				}
    			endforeach;
    			$results = new Paginator($unanswered, 3);
    			break;
    		
    		default:
    			
    		$results = Discussion::orderBy('created_at',
	    	'desc')->paginate(3);
    			break;
    	}

    	return view('forum', ['discussions' => $results]);
    }

    public function channel($slug)
    {
    	$channel = Channel::where('slug', $slug)->first();

    	return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
    public function forumrules()
    {
    	return view('readme.forum-rules');
    }
}
