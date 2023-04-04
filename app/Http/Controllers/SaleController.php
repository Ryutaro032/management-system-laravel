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
        $products = $productModel->getList();
        $company = Company::all();

        return view('list',['products' => $products,'company' => $company]);
    }

    public function itemStock(Request $req){
        $model = new product();
        $products=$model->getList()->where('id',$req->id)->decrement('stock', 1);

        $company = Company::all();

        return view('list',['products' => $products,'company' => $company]);;
    }
}
