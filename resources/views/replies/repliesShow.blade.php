@foreach($replies as $reply)
    <div class="display-comment">
        <strong>{{$reply->user->name}}</strong>
        <small>Created at: {{$reply->created_at}}</small>
        <p>{{ $reply->reply }}</p>
        @csrf
    </div>
    <form method="post" action="{{ route('replies.destroy', $reply, ['replies' => $reply->reply_id]) }}">
        @csrf

        @method('DELETE')
        <button type="submit"class="btn btn-danger">Delete</button>
    </form>
@endforeach
