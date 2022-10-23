<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pages\WelcomeController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\IsAdmin;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware([IsAdmin::class, Authenticate::class]);
    }

    public function index()
    {
        return view('admin.tags.index', [
            'tags' => Tag::all(),
        ]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:tags'],
        ]);

        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.tags.index')->with('success', 'Tag created successfully');
    }


    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }


    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:tags']
        ]);

        $tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.tags.index')->with('success', 'Tag updated successfully');
    }


    public function delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag deleted successfully');
    }
}
