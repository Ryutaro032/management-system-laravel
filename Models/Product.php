<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';

    public function getList() {
        $products = DB::table('products')->get();

        return $products;
    }

    protected $fillable = [
        'company_id',
        'product_name',
        'company_name',
        'price',
        'stock',
        'comment',
        'img_path',
        'created_at',
        'updated_at'
    ];

    public function InsertProduct($request){
        
        return $this->create([
            'product_name' => $request->product_name,
            'company_name' => $request->company_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'comment' => $request->comment,
            'img_path'=> $request->image
        ]);
    }

}
