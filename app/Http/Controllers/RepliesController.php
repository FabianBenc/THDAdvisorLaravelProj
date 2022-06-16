<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\User;
use App\Models\File;
use App\Http\Controllers\Auth;
class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('replies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate ($request, [
            'reply' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $reply = new Reply();

        $reply->reply = $request->input("reply");
        $reply->user_reply_id = auth()->id();
        $reply->thread_id = $request->input("thread_id");
        $reply->save();
        //dd($request->allFiles());
        //dd($reply);
        foreach($request->allFiles()['file'] as $uploadedFile)
        {
            $file = new File();
            $path = $uploadedFile->store('files');
            //dd($uploadedFile);
            $file->reply_id = $reply->getKey();
            $file->name = $uploadedFile->getClientOriginalName();
            $file->file_path = $path;
            $file->save();
        }



        return back();


        /*$reply = $thread->addReply(['reply' => request('reply'), 'user_reply_id' => auth()->id()]);

        return back();*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = auth()->user();
        if($user->is_admin)
        {
            $reply = Reply::where('reply_id', $id)->delete();
        }
        else
        {
            $user_id = auth()->id();
            $reply = Reply::where('reply_id', $id)->where('user_reply_id', $user_id)->delete();
        }
        return back();
    }

    public function liker($reply_id)
    {
        //dd($reply_id);
        $user_id = auth()->user()->id;
        $user = User::findorFail(auth()->user()->id);
        //dd($user->likedReplies, $user->likedReplies());
        $checkUser = $user->likedReplies()->where('likes.reply_id', $reply_id)->get();
        //dd($checkUser->pluck('pivot'));

        if($checkUser->count() > 0)
        // ako je checkUSer dislajkovani onda lajkuj inace moras da obrises bre
        {
            if($checkUser->pluck('pivot')->where('is_dislike', '1')->count() > 0)
            {
                $user->likedReplies()->where('reply_id', $reply_id)->detach($reply_id,$user_id);
                $user->likedReplies()->attach($reply_id);
            }
            else
            {
            $user->likedReplies()->where('reply_id', $reply_id)->detach($reply_id,$user_id);
            }
        }
        else
        {
            $user->likedReplies()->attach($reply_id);
        }
        return redirect()->back();
    }

    public function disliker($reply_id)
    {
        //dd($reply_id);
        $user_id = auth()->user()->id;
        $user = User::findorFail(auth()->user()->id);
        //dd($user->likedReplies, $user->likedReplies());
        $checkUser = $user->likedReplies()->where('likes.reply_id', $reply_id)->get();
        //dd($checkUser->pluck('pivot'));

        if($checkUser->count() > 0)
        // ako je checkUSer dislajkovani onda lajkuj inace moras da obrises bre
        {
            //dd($checkUser->pluck('pivot')->where('is_dislike', '0'));
            if($checkUser->pluck('pivot')->where('is_dislike', '0')->count() > 0)
            {
                $user->likedReplies()->where('reply_id', $reply_id)->detach($reply_id,$user_id);
                $user->likedReplies()->attach($reply_id,['is_dislike'=> 1]);
            }
            else
            {
            $user->likedReplies()->where('reply_id', $reply_id)->detach($reply_id,$user_id);
            }
        }
        else
        {
            $user->likedReplies()->attach($reply_id,['is_dislike'=> 1]);
        }
        return redirect()->back();
    }
}
