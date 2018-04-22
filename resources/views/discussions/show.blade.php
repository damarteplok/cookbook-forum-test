@extends('layouts.app-show__discussion')

@section('content')
    <h1>{{ $discussion->title }}</h1>
    <hr>

    <div class="card mb-4 clearfix">
        <div class="card-header ">
        
            <img src="{{ $discussion->user->avatar }}" alt="" class="img__forum rounded">

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
            
                <img src="{{ $r->user->avatar }}" alt="" class="img__forum rounded">

                <span>{{ $r->user->name }}&nbsp; <b>{{ $r->created_at->diffForHumans() }}</b></span>
                &nbsp;&nbsp;&nbsp;
                

            </div>

            <div class="card-body">
                
                <p class="card-text">
                    {{ $r->content }}
                </p>

                

            </div>

            <div class="card-footer">
                <p class="card-text">
                    LIKE
                </p>
            </div>

        </div>
    @endforeach

@endsection

@section('style')

<style type="text/css" media="screen">
    .img__forum {
        
        max-width :  1.5625rem;
    }    
</style>

@endsection