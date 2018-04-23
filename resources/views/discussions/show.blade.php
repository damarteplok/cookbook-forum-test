@extends('layouts.app-show__discussion')

@section('content')
    <h1>{{ $discussion->title }}</h1>
    <hr>

    <div class="card mb-4 clearfix">
        <div class="card-header ">
        
            <img src="{{ $discussion->user->avatar }}" alt="" class="img__forum rounded">&nbsp;&nbsp;

            <span>{{ $discussion->user->name }}&nbsp; <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
            &nbsp;&nbsp;&nbsp;
            <a href="{{-- {{ route('discussion', ['slug' => $discussion->slug]) }} --}}" class="btn btn-outline-info btn-sm float-right">{{ $discussion->channel->title }}</a>

        </div>

        <div class="card-body">
            
            <p class="card-text">
                {{ $discussion->content }}
            </p>

            

        </div>

        
    </div>

    @foreach($discussion->replies as $r)
        <div class="card mb-4 clearfix">
            <div class="card-header ">
            
                <img src="{{ $r->user->avatar }}" alt="" class="img__forum rounded">&nbsp;&nbsp;

                <span>{{ $r->user->name }}&nbsp; <b>{{ $r->created_at->diffForHumans() }}</b></span>
                &nbsp;&nbsp;&nbsp;
                @guest
                @else
                <div class="float-right">
                    <a href="/" class="btn btn-sm btn-info"></a>
                    @if($r->is_liked_by_auth_user())
                        <a href="{{ route('reply.unlike', ['id' => $r->id]) }}" class="btn btn-outline-danger btn-sm">unlike</a>
                    @else
                        <a href="{{ route('reply.like', ['id' => $r->id]) }}" class="btn btn-outline-success btn-sm">like
                            <span class="badge">{{ $r->likes->count() }}</span></a>
                    @endif
                </div>
                @endguest

            </div>

            <div class="card-body">
                
                <p class="card-text">
                    {{ $r->content }}
                </p>

                

            </div>

            

        </div>
    @endforeach

    @guest
    <div class="alert alert-info text-center" role="alert">
      U need to <a href="{{ route('login') }}" class="alert-link">Sign in</a> for replies this  thread
    </div>
    @else
    <div class="alert alert-info text-center" role="alert">
      Please make sure you've read our <a href="" class="alert-link">Forum Rules</a> before replying to this thread.
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('discussions.reply', ['id' => $discussion->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="reply">Leave a reply..</label>
                    <textarea name="reply" id="reply" cols="30" rows="10" class="form-control">
                        
                    </textarea>

                </div>
                <div class="form-group">
                    <button class="btn btn-success float-right">
                        Leave a reply
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endguest    

@endsection

@section('style')

<style type="text/css" media="screen">
    .img__forum {
        
        max-width :  1.5625rem;
    }    
</style>

@endsection