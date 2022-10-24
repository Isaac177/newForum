<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ThreadController extends Controller
{

    public function index()
    {
        return view('pages.threads.index', [
            'threads' => Thread::with('authorRelation', 'category', 'tagsRelation')->paginate(10),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Thread $thread)
    {
        //
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
