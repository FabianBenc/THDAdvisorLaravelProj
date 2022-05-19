@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('replies.store')}}">
    @csrf
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <label for="reply" class="form-label">Reply</label>
            <input type="text" id="reply" name="reply" class="form-control">
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection