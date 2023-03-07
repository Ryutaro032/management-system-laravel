<?php
//Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'price' => 'integer',
        'stock' => 'integer',
      ];

    public function company(){
        $companies = $this->belongsTo('App\Models\Company','company_id');
       return $companies;
    }

    public function getList(){
        $items = Product::with('company');
        $products = $items->get();
        
        return $products;
    }

    public function insertNewProduct($data) {
        $image = $data->file('img_path');
        $path  = $data->img_path;
        if(isset($image)){
            $path = $image->store('public/image');
            $filename = basename($path);
            $data->img_path = $filename;
        }

        DB::table('products')->insert([
            'company_id'    =>  $data->company,
            'product_name'  =>  $data->product_name,
            'price'         =>  $data->price,
            'stock'         =>  $data->stock,
            'comment'       =>  $data->comment,
            'img_path'      =>  $data->img_path,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function updateProduct($data) {
        $image = $data->file('img_path');
        $path  = $data->img_path;
        if(isset($image)){
            \Storage::disk('public')->delete($path);
            $path = $image->store('public/image');
            $filename = basename($path);
            $data->img_path = $filename;
        }
        DB::table('products')->where('id',$data->id)->update([
            'company_id'    =>  $data->company,
            'product_name'  =>  $data->product_name,
            'price'         =>  $data->price,
            'stock'         =>  $data->stock,
            'comment'       =>  $data->comment,
            'img_path'      =>  $data->img_path,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}