@foreach ($replies as $reply)
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
                        <div>by <a href="#">{{ $reply->user->name }}</a></div>
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
                        <p style="word-break: break-all">{{ $reply->reply }}</p>
                        @foreach($reply->files as $file)
                            <p><a href="{{route('files.download', $file->id)}}">{{ $file->name }}</a></p>
                        @endforeach
                        <form method="post"
                            action="{{ route('replies.destroy', $reply, ['replies' => $reply->reply_id]) }}">
                            @csrf
                            @method('DELETE')
                            @if (Auth::user()->id == $reply->user_reply_id || Auth::user()->is_admin)
                                <button type="submit" class="btn btn-danger">Delete</button>
                            @endif
                        </form>
                        <div>
                            <div class = "d-flex justify-content-end">
                                <div class = "col" style="flex:0;">
                                    <form method="post" action="{{ route('like', $reply, ['replies' => $reply->reply_id]) }}">
                                        @csrf
                                        <button type="submit" class="btn">
                                        @if ($reply->likes->pluck('pivot')->where('user_id', Auth::user()->id)->where('is_dislike', '0')->count() == 1)
                                        <i class="fa-solid fa-thumbs-up fa-2xl" style="color:green" title='unlike'></i>
                                            @else
                                            <i class="fa-regular fa-thumbs-up fa-2xl" title='like'></i>
                                            @endif
                                            <p>{{ $reply->likes->pluck('pivot')->where('is_dislike', '0')->count() }}</p>
                                        </button>
                                    </form>
                                </div>
                                    <div class = "col" style="flex:0;">
                                    <form method="post" action="{{ route('dislike', $reply, ['replies' => $reply->reply_id]) }}">
                                        @csrf
                                        <button type="submit" class="btn">
                                            @if ($reply->likes->pluck('pivot')->where('user_id', Auth::user()->id)->where('is_dislike', '1')->count() == 1)
                                                <i class="fa-solid fa-thumbs-down fa-2xl" style="color:red" title='undislike'></i>
                                            @else
                                                <i class="fa-regular fa-thumbs-down fa-2xl" title='dislike'></i>
                                            @endif
                                            <p>{{ $reply->likes->pluck('pivot')->where('is_dislike', '1')->count() }}</p>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
@endforeach
