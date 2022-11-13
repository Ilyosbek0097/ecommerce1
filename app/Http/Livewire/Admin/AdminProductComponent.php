<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $deleteID = '';
    public function delete_id($id)
    {
        $this->deleteID = $id;
    }
    public function deleteProduct()
    {
        $product = Product::find($this->deleteID)->delete();
        session()->flash('message', 'Product has been deleted successfully!');
    }
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-component', compact('products'))->layout('layouts.base');
    }
}
