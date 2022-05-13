@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @foreach($threads as $thread)
                <div class="card">
                    <strong>{{$thread->title}}</strong>
                    <p>{{$thread->thread_text}}</p>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection