@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">Edit a discussion</div>

        <div class="card-body">
            <form action="{{ route('discussions.update', ['id' => $discussion->id]) }}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="content">Ask question</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $discussion->content }}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success float-right" type="submit">Save discussion</button>
                </div>
            </form>
        </div>
    </div>
        
@endsection
