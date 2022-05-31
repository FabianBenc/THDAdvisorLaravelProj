<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Reply;
use App\Models\Category;
use App\Http\Controllers\Auth;
use Symfony\Component\Console\Output\ConsoleOutput;
class ThreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {
        //
        $threads = Thread::get();
        $categories = Category::get();
        return view('threads.index',compact('threads'),compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view('threads.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate ($request, [
            'title' => 'required',
            'thread_text' => 'required'
        ]);

        $thread = new Thread();

        $thread->title = $request->input("title");
        $thread->thread_text = $request->input("thread_text");
        $thread->user_id = auth()->id();
        $thread->likes = value(1);
        $thread->pinned = False;

        $thread->save();

        $category = Category::find($request->cigomigo);
        $thread->categories()->attach($category);

        return redirect()->route('threads.index');
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
        /*
        $threads = DB::table('threads')->where('thread_id', $id)->get();
        return view('threads.show',['threads'=>$threads[0]]);*/

        $threads = Thread::where('thread_id', $id)->get();
        return view('threads.show',['threads'=>$threads[0]]);
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
        $user_id = auth()->id();
        $threads = Thread::where('thread_id', $id)->where('user_id', $user_id)->delete();
        return redirect()->route('threads.index');
    }
}
