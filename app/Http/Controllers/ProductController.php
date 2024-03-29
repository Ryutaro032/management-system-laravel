<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
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
        $model = new Product();
        $products = $model->searchProduct($req);
        $company  = Company::all();
        $data = response()->json($products);
    
        return view('list',['products'=>$products,'company' => $company,'data'=>$data]);
    }
    
    /**
     * 削除機能
     * 
     */
    public function delete(Request $req,$id){
        $product_id = $req->product_id;

        $model      = new product();
        $product    = $model->getList()->find($product_id);
        $deleteData = $product->delete();

        return redirect()->route('list');
    }

    /** 
     * 
     * @param int $id
     * @return view
    */
    public function showDetail($id){
        $model   = new product();
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
        $model   = new product();
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
            $model   = new Product();
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
