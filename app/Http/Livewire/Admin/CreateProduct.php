<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $open = false;
    public $slug, $product, $name, $description, $image, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'name' => 'required',
        'slug'=>'required|unique:products',
        /* 'description' => 'required',
        'image' => 'required|image|max:2048' */
    ];

    public function save()
    {
        $this->validate();

        $product=Product::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status'=>'1',
            'description' => $this->description,
            'category_id' => '1',
        ]);

         if (isset($this->image)) {
            $image = $this->image->store('public/products');
            $url = Storage::put('public/products', $this->image);
            $product->image()->create([
                'url' => $url
            ]);
        } 

        $this->reset(['open', 'name', 'description', 'image']);

        $this->identificador = rand();

        $this->emitTo('admin.show-products', 'render');
        $this->emit('alert', 'El producto se creó satisfactoriamente');
    }

    public function render(){
        return view('livewire.admin.create-product');
    }

    public function updated(){
        $this->slugFuntion();
    }

    function slugFuntion(){
        $this->slug = trim($this->name); // trim the string
        $this->slug= preg_replace('/[^a-zA-Z0-9 -]/','',$this->slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
        $this->slug= str_replace(' ','-', $this->slug); // replace spaces by dashes
        $this->slug= strtolower($this->slug);  // make it lowercase

        return $this->slug;
    }

    public function updatingOpen(){
        if($this->open==false){
            $this->reset(['name','image','description']);
            $this->identificador = rand();
        }

    } 
}
