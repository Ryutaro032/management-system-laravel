<?php
//Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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

    public function company()
    {
       return $this->belongsTo('App\Models\Company','company_id');
    }

    public function getList(){
        $products = Product::with('company')->get();
        return $products;
    }

    public function insertNewProduct($data){
        DB::beginTransaction();
        try {
            $data = DB::table('product')->with('company')
            ->insert([
                'company_id'    =>  $req->company_id,
                'company_name'  =>  $req->company->company_name,
                'product_name'  =>  $req->product_name,
                'price'         =>  $req->price,
                'stock'         =>  $req->stock,
                'comment'       =>  $req->comment,
                'img_path'      =>  $req->img_path,
                'created_at'    =>  Carbon::now()
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $sessionflashmessage = $e;//エラー文
            return back();
        }
        return;
    }
}