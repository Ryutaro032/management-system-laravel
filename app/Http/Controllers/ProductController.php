<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /** 
     * 
     * @return view
    */
    public function showList() {
        $model = new Product();
        $products = $model->getList();

        return view('list',['products' => $products]);
    }

    /**
     * 削除機能
     */
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('list');
    }

    /** 
     * 
     * @param int $id
     * @return view
    */
    public function showDetail($id) {
        $product = Product::find($id);

        if(is_null($product)){
            \Session::flash('err_msg','データがありません');
            return redirect(route('list'));
        }
        return view('detail',['product' => $product]);
    }

    /**
     * 検索機能
     */
    public function search(Request $request){
        $keyword = $request->input('keyword','');
        $products = Product::query();
        if(!empty($keyword)){
            $products->where('product_name', 'LIKE',"%{$keyword}%")->get();
        }
        return view('list',['products' => $products])->with('keyword',$keyword);
    }   


    /** 
     * 登録画面の表示
     * @return view
    */
    public function showCreate(Request $request) {
        $creates = Product::all();
        return view('sign_up',['creates' => $creates]);
    }

    /** 
     * 商品の登録
     * 
    */
    public function exeStore(Request $request) {
        $product = new Product();
        dd($request);
        $img = $request->file('image');
        //dd($img);
        $path = $img->store('image','public');
        //dd($path);

        //値の登録
        $product->product_name = $request->product_name;
        $product->company_name = $request->company_name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->img_path = $request->img_path;
        $product->comment = $request->comment;
        //保存
        $product->save();
        \Session::flash('err_msg','商品を登録しました');
        return redirect(route('list'));
    }

    /** 
     * 編集画面
     *@param int $id
     * @return view
    */
    public function showEdit($id) {
        $product = Product::findOrFail($id);
        $products = Product::all();

        if(is_null($product)){
            \Session::flash('err_msg','データがありません');
            return redirect(route('list'));
        }
        return view('edit',['product' => $product,'products' => $products]);
    }
    /**
     * 編集機能
     * @param int $id
     * 
     */
    public function update(Request $request, $id){
        $product = Product::find($id);

        $product->img_path = $request->input('img_path');
        $product->product_name = $request->input('product_name');
        $product->company_name = $request->input('company_name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->comment = $request->input('comment');
        $product->img_path = $request->input('img_path');
        $product->save();

        return redirect(route('list'));
    }

}
