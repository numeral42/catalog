<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
        $products=Product::where('status', 2)->latest('id')->paginate(12);
        return view('products.index', compact('products'));

    }
}
