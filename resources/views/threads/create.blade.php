@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('threads.store')}}">
    @csrf
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <label for="title" class="form-label">Thread title</label>
            <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="card">
            <label for="thread_text" class="form-label">Thread text</label>
            <input type="text" id="thread_text" name="thread_text" class="form-control">
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection