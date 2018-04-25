@extends('layouts.app-login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Forum Rules') }}</div>

                <div class="card-body">
                    
                    <p>By posting to the forum and replying to threads you agree to:</p>
                    <ul>
                        <li>Not Sara</li>
                        <li>Not Spam</li>
                        <li>Not Hate Speach</li>
                        <li>Not hmmm whatever</li>
                    </ul>
                    <p>Not following these rules may result in the banning or deletion of your profile and/or content. XD</p>
                    <p>Moderators and admins may remove or modify your content at any time they seem necessary without notice. XD</p>
                    <p>These rules may be changed at any given moment without prior notice. XD</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
