@extends('layouts.app')

@section('content')
    
    @foreach($discussions as $discussion)
    @if($discussion->hasBestAnswer())
        <div class="card border-success mb-4 clearfix">
            <div class="card-header ">
            
                <img src="{{ $discussion->user->avatar }}" alt="" class="img__forum rounded">

                <span>{{ $discussion->user->name }}&nbsp; <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
                &nbsp;&nbsp;&nbsp;
                <span class="btn btn-success float-right btn-sm ml-2">CLOSED</span>
                <a href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}" class="btn btn-outline-info btn-sm float-right">{{ $discussion->channel->title }}</a>

            </div>

            <div class="card-body text-success">
                <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}">
                
                    <h4 class="card-title">
                        {{ $discussion->title }}
                        <span class="badge badge-info float-right">
                            {{ $discussion->replies->count() }}
                        </span>
                    </h4>
                    <p class="card-text">
                        {{ str_limit($discussion->content, 100) }}
                    </p>
                    
                </a>

                

            </div>

            
        </div>
    @else
    <div class="card mb-4 clearfix">
        <div class="card-header ">
        
            <img src="{{ $discussion->user->avatar }}" alt="" class="img__forum rounded">

            <span>{{ $discussion->user->name }}&nbsp; <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
            &nbsp;&nbsp;&nbsp;
            <a href="{{-- {{ route('discussion', ['slug' => $discussion->slug]) }} --}}" class="btn btn-outline-info btn-sm float-right">{{ $discussion->channel->title }}</a>

        </div>

        <div class="card-body">
            <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}">
            
                <h4 class="card-title">
                    {{ $discussion->title }}
                    <span class="badge badge-info float-right">
                        {{ $discussion->replies->count() }}
                    </span>
                </h4>
                <p class="card-text">
                    {{ str_limit($discussion->content, 100) }}
                </p>
                
            </a>

            

        </div>

        
    </div>
    @endif
    @endforeach

    <div class="d-flex justify-content-center">
        {{ $discussions->links() }}
    </div>


    

@endsection

@section('style')

<style type="text/css" media="screen">
    .img__forum {
        
        max-width :  1.5625rem;
    }    
</style>

@endsection

{{-- @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in! --}}