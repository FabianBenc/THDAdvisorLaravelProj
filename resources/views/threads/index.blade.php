@extends('layouts.app')

@section('content')
<!-- <a href='/threads/create'> Create New Thread</a>
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
</div> -->


<a href='/threads/create' class="btn btn-lg btn-primary">New Topic</a>
<div class="container my-3">
      <nav class="breadcrumb">
        <a href="index.html" class="breadcrumb-item">Board index</a>
        <a href="overview-forum-category.html" class="breadcrumb-item">Forum category</a>
        <span class="breadcrumb-item active">Forum name</span>
      </nav>
      <div class="row">
        <div class="col-12" style="background-color: white;">
        @php
            $colors = ["bg-info","bg-warning","bg-primary","bg-danger","bg-secondary","bg-light","bg-dark","bg-white"];
            $i=0;
        @endphp
        @foreach($categories as $category)
            <h2 class="h4 text-white {{$colors[$i++%8]}} mb-0 p-4 rounded-top">{{$category->title}}</h2>
            @if(isset($thread))
          <table class="table table-striped table-bordered table-responsive-lg">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="topic-col">Topic</th>
                <th scope="col" class="created-col">Created</th>
                <th scope="col">Statistics</th>
                <th scope="col" class="last-post-col">Latest post</th>
                @if((Auth::user()->id == $thread->user_id) || (Auth::user()->is_admin))
                <th scope="col">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
            @foreach($category->threads as $thread)
              <tr>
                <td>
                  <!--<span class="badge badge-primary">7 unread</span>-->
                  <h3 class="h6"><a href="{{url('/threads',[$thread->thread_id])}}">{{$thread->title}}</a></h3>
                  <!--<div class="small">Go to page: <a href="#0">1</a>, <a href="#0">2</a>, <a href="#0">3</a> &hellip; <a href="#0">7</a>, <a href="#0">8</a>, <a href="#0">9</a></div>-->
                 @if($thread->categories->count() > 0)
                  Categories:
                    @foreach($thread->categories as $category)
                        <div>{{$category->title}}</div>
                    @endforeach
                  @else
                  No Categories
                  @endif
                </td>
                <td>
                  <div>by <a href="#">{{$thread->user->name}}</a></div>
                  <div>Created at: {{$thread->created_at}}</div>
                </td>
                <td>
                  <div>Replies: {{ $thread->replies->count()}}</div>
                  <!--<div>179 views</div>-->
                </td>
                <td>
                @if($thread->replies->count() > 0)
                    <div>by: {{$thread->replies->last()->user->name}}</a></div>
                    <div>Posted at: {{$thread->replies->last()->created_at}}</div>
                @else
                    <div>by: {{$thread->user->name}}</div>
                    <div>Posted at: {{$thread->created_at}}</div>
                @endif
                </td>
                @if((Auth::user()->id == $thread->user_id) || (Auth::user()->is_admin))
                <td>
                <form method="post" action="{{ route('threads.destroy', ['thread' => $thread->thread_id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit"class="btn btn-danger">Delete</button>
                </td>
                </form>
                @endif
              </tr>
            @endforeach
            @else
            No threads yet. If you would like, create a new thread
            @endif
            </tbody>
          </table>
        @endforeach
        </div>
      </div>
@endsection
