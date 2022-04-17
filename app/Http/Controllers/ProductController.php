<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Models\Tag;

class ProductController extends Controller
{

    public function index(){

/*         if(request()->page){
            $key='products' . request()->page;
        }else{
            $key='products';
        }

        if(Cache::has($key)){
            $products=Cache::get($key);
        }else{
            $products=Product::where('status', 2)->latest('id')->paginate(12);
            Cache::put($key, $products);
        } */
        $title='Bienvenido';
        $products=Product::where('status', 2)->latest('id')->paginate(12);
        return view('products.index', compact('products','title'));
    }

    public function show(Product $product){

        $this->authorize('published', $product);
        
        $similares=Product::where('category_id', $product->category_id)
                                ->where('status',1)
                                ->where('id','!=',$product->id)
                                ->latest('id')
                                ->take(4)
                                ->get();

        return view('products.show', compact('product', 'similares'));
    }

    public function category(Category $category){
        $products=Product::where('category_id', $category->id)
                    ->where('status', 1)
                    ->latest('id')
                    ->paginate(12);

        return view('products.category', compact('products','category'));
    }

    public function tag(Tag $tag){
        
        $products=$tag->products()->where('status', 2)
                    ->latest('id')
                    ->paginate(12);
$title='Sección de '.$tag->name;
        return view('products.index', compact('products','tag','title'));
      
    }
}
