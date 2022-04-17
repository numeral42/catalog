<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\ProductRequest;
use App\Models\Provider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.edit')->only('edit');
        $this->middleware('can:admin.products.create')->only('create');
        $this->middleware('can:admin.products.destroy')->only('destroy');
    }
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $providers = Provider::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.products.create', compact('categories','providers', 'tags'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/products', $request->file('file'));
            $product->image()->create([
                'url' => $url
            ]);
        }

        if ($request->tags) {
            $product->tags()->attach($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.products.edit', $product)
            ->with('info', 'El producto se registro con éxito');
    }

    public function edit(Product $product)
    {
        $this->authorize('author', $product);
        $providers = Provider::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.products.edit', compact('product','providers', 'categories', 'tags'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('author', $product);
        $product->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/products', $request->file('file'));

            if ($product->image) {
                Storage::delete($product->image->url);
                $product->image->update([
                    'url' => $url
                ]);
            } else {
                $product->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $product->tags()->sync($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.products.edit', $product)
            ->with('info', 'El producto de actualizó con éxito');
    }

    public function destroy(Product $product)
    {
        $this->authorize('author', $product);
        $product->delete();

        Cache::flush();

        return redirect()->route('admin.products.index')
            ->with('info', 'El producto se eliminó con éxito');
    }
}
