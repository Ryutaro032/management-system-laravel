<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\SaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function productIdStore(Request $req){
        $saleModel = new Sale();
        $saleModel->insertProductId($req);

        $productModel = new Product();
        $products = $productModel->where('id',$data->id)->decrement('stock', 1);
        $products = $products->getList();
        $company = Company::all();

        return view('list',['products' => $products,'company' => $company]);
    }
}
