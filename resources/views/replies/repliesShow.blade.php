@foreach($replies as $reply)
    <div class="display-comment">
        <strong>{{$reply->user->name}}</strong>
        <small>Created at: {{$reply->created_at}}</small>
        <p>{{ $reply->reply }}</p>
        @csrf
    </div>
@endforeach