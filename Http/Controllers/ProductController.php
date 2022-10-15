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
    public function showList() {
        $model = new Product();
        $products = $model->getList();
        //$products = Product::all();

        return view('list',['products' => $products]);
    }

    /** 
     * 
     * @param int $id
     * @return view
    */
    public function showDetail($id) {
        $product = Product::find($id);

        return view('detail',['product' => $product]);
    }

}
