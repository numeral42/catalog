<?php

namespace App\Http\Livewire\Admin;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $product,  $identificador,  $imageUpLoad,   $idProduct;
    public $name, $slug, $description, $image,  $stock, $status, $price, $category, $user,$provider;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;
    public $open_show = false;
    public $open_edit = false;

    protected $listeners = ['render', 'delete', 'show', 'edit'];

    protected function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    public function mount()
    {
        $this->identificador = rand();
        $this->product = new Product();
        $this->image = new Image();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected function rules()
    {

        if ($this->name == $this->product->name) {
            $rules = [
                'name' => 'required',
                'slug' => 'required',
                'status' => 'required|in:1,2,3,4',
                'image' => 'max:1024',
                'price' => '',
                'stock' => '',
            ];
        } else {
            $rules = [
                'name' => 'required',
                'slug' => 'required|unique:products',
                'status' => 'required|in:1,2,3,4',
                'image' => 'max:1024',
                'price' => '',
                'stock' => '',
            ];
        }

        return $rules;
    }

    public function render()
    {      
          $cantArray =[
            '10'=>'10',
            '25'=>'25',
            '50'=>'50',
            '100'=>'100',
            
        ];

        if ($this->readyToLoad) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $products = [];
        }

        return view('livewire.admin.show-products', compact('products','cantArray'));
    }

    public function loadProducts()
    {
        $this->readyToLoad = true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(Product $product, Image $image)
    {
        $this->product = $product;

        $this->imageUpLoad = null;
        $this->name = $this->product->name;
        $this->slug = $this->product->slug;
        $this->price = $this->product->price;
        $this->stock = $this->product->stock;
        $this->user = $this->product->user->name;
        
        if(isset($this->product->provider->name))$this->provider =$this->product->provider->name;
        else $this->provider="";
        $this->category = $this->product->category->name;
        $this->status = $this->product->status;

        $this->description = $this->product->description;

        $this->open_edit = true;
    }

    public function show(Product $product)
    {
        $this->open_show = true;

        $this->product = $product;

        $this->idProduct = $this->product->id;
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->stock = $this->product->stock;
        $this->category = $this->product->category->name;
        $this->description = $this->product->description;
    }

    public function update()
    {
        $this->validate();

        if (isset($this->imageUpLoad)) {
            if (isset($this->product->image->url)) {
                Storage::delete([$this->product->image->url]);
                $url = Storage::put('public/products', $this->imageUpLoad);
                $this->product->image()->update([
                    'url' => $url
                ]);
            } else {
                $url = Storage::put('public/products', $this->imageUpLoad);
                $this->product->image()->create([
                    'url' => $url
                ]);
            }
        }

        $product = $this->product->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'category_id' => '1',
            'price' => $this->price,
            'stock' => $this->stock,
        ]);

        $this->reset(['open_edit', 'image','search']);

        $this->identificador = rand();

        $this->emit('alert', 'El producto se actualizo satisfactoriamente');
    }

    public function updated()
    {
        $this->slugFuntion();
    }

    function slugFuntion()
    {
        $this->slug = trim($this->name); // trim the string
        $this->slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $this->slug); // only take alphanumerical characters, but keep the spaces and dashes too...
        $this->slug = str_replace(' ', '-', $this->slug); // replace spaces by dashes
        $this->slug = strtolower($this->slug);  // make it lowercase

        return $this->slug;
    }

    public function delete(Product $product)
    {

        $product->delete();
        $this->mount();
    }
}
