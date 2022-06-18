@extends('layouts.app')

@section('content')
<div class="container my-3" style="background-color: white;">
      <nav class="breadcrumb">
        <a href="index.html" class="breadcrumb-item">Board index</a>
        <a href="overview-forum-category.html" class="breadcrumb-item">Forum category</a>
        <a href='/threads' class="breadcrumb-item">THDAdvisor</a>
        <span class="breadcrumb-item active">{{ $threads->title }}</span>
      </nav>
    <div class="row">
        <div class="col-12">
          <h2 class="h4 text-white bg-info mb-0 p-4 rounded-top">{{ $threads->title }}
            <form method="post" action="{{ route('threads.destroy', ['thread' => $threads->thread_id]) }}">
                @csrf
                @method('DELETE')
                @if((Auth::user()->id == $threads->user_id) || (Auth::user()->is_admin))
                <button type="submit"class="btn btn-danger">Delete</button>
                @endif
            </form>

          </h2>
          <table class="table table-striped table-bordered table-responsive-lg">
            <thead class="thead-light">
              <tr>
                <th scope="col">Author</th>
                <th scope="col">Message</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="author-col">
                  <div>by <a href="#">{{$threads->user->name}}</a></div>
                </td>
                <td class="post-col d-lg-flex justify-content-lg-between">
                  <div><span class="font-weight-bold">Post subject: </span><strong>{{ $threads->title }}</strong></div>
                  <div><span class="font-weight-bold">Posted:</span> {{ $threads->created_at }}</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div><span class="font-weight-bold">Joined:</span><br>03 Apr 2017, 13:46</div>
                  <div><span class="font-weight-bold">Posts:</span><br>123</div>
                </td>
                <td>
                  <p>{{ $threads->thread_text }}</p>
                  @foreach($threads->topicFiles as $TopicFile)
                        <p><a href="{{route('TopicFiles.download', $TopicFile->id)}}">{{ $TopicFile->name }}</a></p>
                  @endforeach
                </td>
              </tr>
            </tbody>
          </table>
          <form method="post" class="mb-3" action="{{ route('replies.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="reply">Reply to this post:</label>
                <textarea class="form-control" name="reply"  rows="5" placeholder="Write your comment here."></textarea>
                <input type="hidden" name="thread_id" value="{{ $threads->thread_id }}"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Reply" />
                <button type="reset" class="btn btn-danger">Reset</button>
                <input type="file" name="file[]" class="custom-file-input" id="chooseFile" multiple>
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
           </form>
          <h3>Replies</h3>
          @include('replies.repliesShow', ['replies' => $threads->replies, 'thread_id' => $threads->thread_id])
        </div>
    </div>
</div>
@endsection
