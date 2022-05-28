@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-primary">THDADVISOR</h3>
                    <hr />
                    <br/>
                    <h3>{{ $threads->title }}</h3>
                    <p>
                        {{ $threads->thread_text }}
                    </p>
                    <hr />
                    <form method="post" action="{{ route('threads.destroy', ['thread' => $threads->thread_id]) }}">
                        @csrf

                        @method('DELETE')
                        <button type="submit"class="btn btn-danger">Delete</button>
                    </form>
                    <h4>Display Replies</h4>

                    <hr />
                    @include('replies.repliesShow', ['replies' => $threads->replies, 'thread_id' => $threads->thread_id])

                    <h4>Reply</h4>
                    <form method="post" action="{{ route('replies.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="reply"></textarea>
                            <input type="hidden" name="thread_id" value="{{ $threads->thread_id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="reply" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
