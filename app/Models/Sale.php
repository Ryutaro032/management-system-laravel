<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function product(){
        $products = $this->belongsTo('App\Models\Product');
       return $products;
    }

    public function insertProductId($data){
        DB::table('sales')->insert([
            'product_id' => $data->$product->id,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
    }
}
