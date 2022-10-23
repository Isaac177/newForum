<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\IsAdmin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\ControllerMiddlewareOptions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __contruct(): ControllerMiddlewareOptions
    {
        return $this->middleware([IsAdmin::class, Authenticate::class]);
    }

    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'image' => 'required',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $url = $request->file('image')->store('image');
            $input['image'] = $url;
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $input['image'],
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category Created');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:categories']
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        $input = $request->all();

        $category->update($input);

        return redirect()->route('admin.categories.index')->with('success', 'Category Updated');
    }

    public function delete(Category $category)
    {
        Storage::delete('images/' . $category->image);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category Deleted');
    }
}
