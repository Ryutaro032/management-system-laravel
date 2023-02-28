<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CompanyRequest;
use App\Models\Product;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    
    /** 
     * 一覧画面
     * @return view
    */
    public function showList() {
        $model = new Product();
        $products = $model->getList();
        $company = Company::all();
        return view('list',['products' => $products,'company' => $company]);
    }

    /**
     * 検索機能
     *
     *
     */
    public function search(Request $req){
        $keyword      = $req->input('keyword');
        $company_name = $req->input('company');
        $price_upper  = $req->input('price_upper');
        $price_lower  = $req->input('price_lower');
        $stock_upper  = $req->input('stock_upper');
        $stock_lower  = $req->input('stock_lower');

        $model    = new Product();
        $products = $model->getList();
        $company  = Company::all();
        
        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('product_name', 'like', '%'.$keyword.'%')->get();
        }
        if (!empty($company_name)) {
            $query->where('company_id', $company_name)->get();
        }
        if ($price_upper && $price_lower) {
            $query->where('price', '<=',$price_upper)->where('price','>=',$price_lower)->get();
        }
        
        if ($stock_upper && $stock_lower) {
            $query->where('stock', '<=',$stock_upper)->where('stock','>=',$stock_lower)->get();
        }

        $products = $query->get();
        //dd($products);
        $data = response()->json($products);
    
        return view('list',['products'=>$products,'company' => $company]);
    }
    
    /**
     * 削除機能
     * @param int $id
     */
    public function delete(Request $req){
        $model   = new product();
        $product = $model->getList()->find($req->id);
        $product->delete();
        return redirect()->route('list');
    }
    // public function delete($id){
    //     $model   = new product();
    //     $product = $model->getList()->find($id);
    //     $product->delete($id);
    //     return redirect()->route('list');
    // }

    /** 
     * 
     * @param int $id
     * @return view
    */
    public function showDetail($id){
        $model = new product();
        $product = $model->getList()->find($id);
        return view('detail',['product' => $product]);
    }

    /** 
     * 登録画面の表示
     * 
     * @return view
    */
    public function showCreate(){
        $company = Company::all();
        return view('sign_up',['company' => $company]);
    }

    /** 
     * 商品の登録
     * 
    */
    public function productStore(Request $req){
        DB::beginTransaction();
        try{
            // 登録処理呼び出し
            $model = new Product();
            $model->insertNewProduct($req);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return back();
        }
    return redirect(route('list'));
    }
       
    /** 
     * 編集画面
     *@param int $id
     * @return view
    */
    public function showEdit($id){
        $model = new product();
        $product = $model->getList()->find($id);
        $company = Company::all();

        return view('edit',['company' => $company,'product' => $product]);
    }

    /**
     * 編集機能
     * @param int $id
     * 
     */
    public function updateStore(Request $req, $id){
        DB::beginTransaction();
        try{
            $model = new Product();
            $product = $model->getList()->find($id);
            $product->updateProduct($req);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return back();
        }
    return redirect(route('detail',['id' => $product->id]));
    }

}
