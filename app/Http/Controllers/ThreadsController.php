<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Thread;
use App\Models\TopicFile;
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
        $page = [];
        $threads = Thread::simplePaginate(1);
        $categories = Category::get();
        foreach($categories as $category)
        {
            $page[Str::replace(' ','_',$category->title.'page')] = request()->query(Str::replace(' ','_',$category->title.'page'));
        }
        return view('threads.index',compact('threads','categories','page'));
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
            'topic' => 'required',
            'comment' => 'required',
            'categoryList' => 'required',
            'Topicfile.*' => 'mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800'
        ],
         $messages = [
            'mimes' => 'Please upload ppt,pptx,doc,docx,pdf,xls,xlsx files.',
        ]);

        $thread = new Thread();

        $thread->title = $request->input("topic");
        $thread->thread_text = $request->input("comment");
        $thread->user_id = auth()->id();
        $thread->pinned = False;

        $thread->save();

        $category = Category::find($request->categoryList);
        $thread->categories()->attach($category);

        if(isset($request->allFiles()['Topicfile']))
        {
            foreach($request->allFiles()['Topicfile'] as $uploadedFile)
            {
                $TopicFile = new TopicFile();
                $path = $uploadedFile->store('TopicFiles');
                $TopicFile->thread_id = $thread->getKey();
                $TopicFile->name = $uploadedFile->getClientOriginalName();
                $TopicFile->file_path = $path;
                $TopicFile->save();
            }
        }

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
        $user = auth()->user();
        if($user->is_admin)
        {
            $threads = Thread::where('thread_id', $id)->delete();
        }
        else
        {
            $user_id = auth()->id();
            $threads = Thread::where('thread_id', $id)->where('user_id', $user_id)->delete();
        }
        return redirect()->route('threads.index');
    }

    public function TopicFileDownload($TopicFile_id)
    {
        $TopicFile = TopicFIle::where('id', $TopicFile_id)->firstOrFail();
        $path = storage_path('app/' . $TopicFile->file_path);
        return response()->download($path, $TopicFile->name);
    }
}
