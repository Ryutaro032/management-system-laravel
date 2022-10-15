<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = '_products';

    public function getList() {
        // _productsテーブルからデータを取得
        $products = DB::table('_products')->get();

        return $products;
    }

}
