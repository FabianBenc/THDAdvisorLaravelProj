@foreach($replies as $reply)
    <!-- <div class="display-comment">
        <strong>{{$reply->user->name}}</strong>
        <small>Created at: {{$reply->created_at}}</small>
        <p>{{ $reply->reply }}</p>
        @csrf
    </div>
    <form method="post" action="{{ route('replies.destroy', $reply, ['replies' => $reply->reply_id]) }}">
        @csrf

        @method('DELETE')
        <button type="submit"class="btn btn-danger">Delete</button>
    </form> -->
<div>
    <table class="table table-striped table-bordered table-responsive-lg">
    @csrf
            <thead class="thead-light">
              <tr>
                <th scope="col">Author</th>
                <th scope="col">Message</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="author-col">
                  <div>by <a href="#">{{$reply->user->name}}</a></div>
                </td>
                <td class="post-col d-lg-flex justify-content-lg-between">
                  <div><span class="font-weight-bold">Post subject: </span><strong>{{ $threads->title }}</strong></div>
                  <div><span class="font-weight-bold">Posted:</span> {{ $reply->created_at }}</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div><span class="font-weight-bold">Joined:</span><br>03 Apr 2017, 13:46</div>
                </td>
                <td>
                    <p>{{ $reply->reply }}</p>
                    <form method="post" action="{{ route('replies.destroy', $reply, ['replies' => $reply->reply_id]) }}">
                    @csrf

                    @method('DELETE')
                    @if((Auth::user()->id == $reply->user_reply_id) || (Auth::user()->is_admin))
                    <button type="submit"class="btn btn-danger">Delete</button>
                    @endif
                    </form>
                </td>
              </tr>
            </tbody>
          </table>
</div>
@endforeach
