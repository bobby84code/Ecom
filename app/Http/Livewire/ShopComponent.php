<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;




class ShopComponent extends Component
{
    use WithPagination;
    public function render()
    {

        $categories=Category::get();

        //return view('livewire.shop-component',['categories'=>$categories]);
        //return view('livewire.shop-component')->layout('layouts.app');


        $categories=Category::get();

        $products=Product::get();

        $products=Product::paginate(10);

        $nproducts=Product::latest()->take(3)->get();

        return view('livewire.shop-component', ['categories' => $categories,'products'=>$products,'nproducts'=>$nproducts])
       ->layout('layouts.app');

    }
}
