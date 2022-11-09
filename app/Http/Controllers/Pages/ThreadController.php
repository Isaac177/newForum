<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\ThreadStoreRequest;
use App\Jobs\CreateThread;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Thread;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class ThreadController extends Controller
{

    public function __construct()
    {
        return $this->middleware([Authenticate::class, EnsureEmailIsVerified::class])->except(['index', 'show']);
    }

    public function index()
    {
        return view('pages.threads.index', [
            /*'threads' => Thread::with('authorRelation', 'category', 'tagsRelation')->paginate(10),*/
            //threads order by id
            'threads' => Thread::with('authorRelation', 'category', 'tagsRelation')->orderBy('id', 'desc')->paginate(10),
        ]);
    }


    public function create()
    {
        return view('pages.threads.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(ThreadStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        /*$thread = new Thread;
        $thread->title = $request->title;
        $thread->slug = Str::slug($request->title);
        $thread->body = Purifier::clean($request->body);
        $thread->category_id = $request->category;
        $thread->author_id = Auth::id();
        $thread->save();*/
//        $thread->sync($request->tags);

        $this->dispatchSync(CreateThread::fromRequest($request));

        return redirect()->route('threads.index')->with('success', 'Thread created successfully');
    }

    public function show(Category $category, Thread $thread)
    {
        //return view('pages.threads.show', compact('thread', 'category'));
        //return thread:lug, category:slug
        return view('pages.threads.show', [
            'category' => $category,
            'thread' => $thread,
        ]);
    }


    public function edit(Thread $thread)
    {
        //
    }


    public function update(Request $request, Thread $thread)
    {
        //
    }


    public function destroy(Thread $thread)
    {
        //
    }
}
