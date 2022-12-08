<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';

    public function getList(){
        $info=DB::table('products')
        ->leftjoin('companies','products.company_id','=','companies.id')
        ->get();
        return $info;
    }

    protected $primaryKey = 'id';

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

}
