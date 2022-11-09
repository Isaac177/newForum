<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Thread;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        return view('pages.tags.index', [
            /*'tag' => $tag,
            'threads' => $tag->threads()->paginate(10),*/
            //'thread' => Thread::ForTag($tag->slug())->paginate(10),
            'tag' => $tag,
            'threads' => $tag->threads()->orderBy('id', 'desc')->paginate(10),
        ]);
    }
}
