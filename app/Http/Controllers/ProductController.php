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
    //ProductController
    /** 
     * 一覧画面
     * @return view
    */
    public function showList() {
        $model = new Product();
        $products = $model->getList();
        return view('list',['products' => $products]);
    }

    /**
     * 検索機能
     * 
     */
    public function search(Request $request){
        $search1 = $request->get('keyword');
        $search2 = $request->get('company_name');
        $model = new Product();
        $query = $model->getList()->query();

        if(!empty($search1)){
            $query->where('product_name', 'like', '%'.$search1.'%');
        }
        if(!empty($search2)){
            $query->where('company_name', $search2);
        }
        $products = $query->get();
        return view('search', compact('products', 'search1', 'search2'));
    }

    /**
     * 削除機能
     * @param int $id
     */
    public function delete($id){
        $model = new product();
        $product = $model->getList()->find($id);
        $product->truncate($id);
        return redirect()->route('list');
    }

    /** 
     * 
     * @param int $id
     * @return view
    */
    public function showDetail($id) {
        $model = new product();
        $product = $model->getList()->find($id);
        return view('detail',['product' => $product]);
    }

    /** 
     * 登録画面の表示
     * 
     * @return view
    */
    public function showCreate() {
        $model = new Product();
        $products = $model->getList();
        //dd($products);
        return view('sign_up',['products' => $products]);
    }

    /** 
     * 商品の登録
     * 
    */
    public function productStore(Request $req) {
        $model = new Product();
        $products = $model->insertNewProduct($req);
        dd($products);
        return view('list',['products' => $products]);
    }

    /** 
     * 編集画面
     *@param int $id
     * @return view
    */
    public function showEdit($id) {
        $model = new product();
        $product = $model->getList()->find($id);
        $items = $model->getList();

        return view('edit',['items' => $items,'product' => $product]);
    }
    /**
     * 編集機能
     * @param int $id
     * 
     */
    public function update(Request $request, $id){
        //dd($request);
        $product = Product::with('company')->find($id);

        $product->product_name = $request->input('product_name');
        $product->company_name = $request->input('company_name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->comment = $request->input('comment');

        $image = $request->file('img_path');
        $path = $product->img_path;
        if(isset($image)){
            \Storage::disk('public')->delete($path);
            $path = $image->store('public/image');
            $filename = basename($path);
            $product->img_path = $filename;
        }
        $product->save();
        return redirect(route('detail',['id' => $product->id]));
    }

}
