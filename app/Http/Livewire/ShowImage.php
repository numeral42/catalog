<?php

namespace App\Http\Livewire;
 
use Livewire\Component;

class ShowImage extends Component
{
public $open=false;
public $product;

public function mount()
{


}
public function loadProducts()
{
    $this->mount();
}
    public function render()
    {
        return view('livewire.show-image');
    }
}
