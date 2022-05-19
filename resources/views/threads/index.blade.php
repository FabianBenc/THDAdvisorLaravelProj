@extends('layouts.app')

@section('content')
<a href='/threads/create'> Create New Thread</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @foreach($threads as $thread)
                <div class="card">
                    <strong>{{$thread->title}}</strong>
                    <a href={{url('/threads',[$thread->thread_id])}}> View this thread</a>
                    <p>{{$thread->thread_text}}</p>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection