<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    public function creating(Product $product)
    {
        if(!app()->runningInConsole()){
            $product->user_id = auth()->user()->id;
        }

    }

    public function created(Product $product)
    {
        //
    }

    public function updated(Product $product)
    {
        //
    }

    public function deleting(Product $product)
    {
        if($product->image){
            Storage::delete($product->image->url);
        }
    }

    public function deleted(Product $product)
    {
        //
    }

    public function restored(Product $product)
    {
        //
    }

    public function forceDeleted(Product $product)
    {
        //
    }
}
