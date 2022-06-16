@extends('layouts.app')

@section('content')
<!-- <form method="POST" action="{{route('threads.store')}}">
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
</div> -->


<div class="container my-3" style="background-color: white;">
      <nav class="breadcrumb">
        <a href="index.html" class="breadcrumb-item">Board index</a>
        <a href="overview-forum-category.html" class="breadcrumb-item">Forum category</a>
        <a href="overview-topics.html" class="breadcrumb-item">Forum name</a>
        <span class="breadcrumb-item active">Create new topic</span>
      </nav>
      <div class="row">
        <div class="col-12">
          <h2 class="h4 text-white bg-info mb-3 p-4 rounded">Create new topic</h2>
          <form  class="mb-3" method="POST" action="{{route('threads.store')}}">
            @csrf
            <div class="form-group">
              <label for="title">Topic:</label>
              <input type="text" class="form-control" id="title" name="topic" placeholder="Give your topic a title.">
            </div>
            <div class="form-group">
              <label for="comment">Comment:</label>
              <textarea class="form-control" id="thread_text" name="comment" rows="10" placeholder="Write your comment here."></textarea>
            </div>

            <div class="form-group">
            Choose categories:
            @foreach($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$category->id}}" name="categoryList[]" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{$category->title}}
                    </label>
                </div>
            @endforeach
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
@endif
            <button type="submit" class="btn btn-primary">Create topic</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <a href='/threads' class="btn btn-warning text-white">Cancel</a>
          </form>
        </div>
      </div>
@endsection
