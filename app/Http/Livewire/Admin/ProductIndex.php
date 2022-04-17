<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    protected $paginationTheme="bootstrap";

    public $search;

    public $open=true;
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
/*         $products=Product::where('user_id', auth()->user()->id) */
        $products=Product::where('name', 'like', '%' . $this->search . '%')
            ->latest('id')
            ->paginate();

        return view('livewire.admin.product-index', compact('products'));
    }
}
