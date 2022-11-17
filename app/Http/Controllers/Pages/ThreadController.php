<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\ThreadStoreRequest;
use App\Jobs\CreateThread;
use App\Jobs\UpdateThread;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Thread;
use App\Policies\ThreadPolicy;
use Illuminate\Auth\Access\AuthorizationException;
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
        $this->dispatchSync(CreateThread::fromRequest($request));

        return redirect()->route('threads.index')->with('success', 'Thread created successfully');
    }

    public function show(Category $category, Thread $thread)
    {
        return view('pages.threads.show', [
            'category' => $category,
            'thread' => $thread,
        ]);
    }


    /**
     * @throws AuthorizationException
     */
    public function edit(Thread $thread)
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);
        $oldTags = $thread->tagsRelation->pluck('id')->toArray();

        //$oldTags = $thread->tags()->pluck('id')->toArray();

        $selectedCategory = $thread->category;

        return view('pages.threads.edit', [
            'thread' => $thread,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'oldTags' => $oldTags,
            'selectedCategory' => $selectedCategory,
        ]);
    }


    public function update(ThreadStoreRequest $request, Thread $thread)
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);

        $this->dispatchSync(UpdateThread::fromRequest($thread, $request));

        return redirect()->route('threads.index')->with('success', 'Thread updated successfully');
    }


    public function destroy(Thread $thread)
    {
        //
    }
}
