<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * 
     * @return view
     */
    public function showList(){
        $model = new Product();
        $products = $model -> getList();
        //dd($products);

        return view('product.list', ['products' => $products]);
    }
}
