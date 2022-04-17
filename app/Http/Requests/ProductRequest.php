<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {

        return true;
    }

    public function rules()
    {
        $product=$this->route()->parameter('product');

        $rules=[
            'name'=>'required',
            'slug'=>'required|unique:products',
            'status'=>'required|in:1,2,3,4',
            'file'=>'image'
        ];

        if($product){
            $rules['slug']='required|unique:products,slug,'. $product->id;
        }

        if($this->status==2){
            $rules=array_merge($rules, [
                'category_id'=>'required',
                'tags'=>'required',
                'description'=>'required',
                //'body'=>'required'
            ]);
        }

        return $rules;
    }
}
