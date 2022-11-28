<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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
     * 検索機能
     * 
     */
    public function search(Request $request){
        $search1 = $request->get('keyword');
        $search2 = $request->get('company_name');
        $query = Product::query();

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
     */
    public function delete($id){
        $product = Product::find($id);
        $product->destroy($id);
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
     * 登録画面の表示
     * 
     * @return view
    */
    public function showCreate() {
        $creates = Product::all();
        return view('sign_up',['creates' => $creates]);
    }

    /** 
     * 商品の登録
     * 
    */
    public function store(Request $request){
        //dd($request);
        $product = new Product();
        //dd($product);
        //値の登録
        $product->product_name = $request->input('product_name');
        $product->company_name = $request->input('company_name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->comment = $request->input('comment');

        //保存
        $path = $request->img_path->store('public/image');
        $filename = basename($path);
        $product->img_path = $filename;
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
        //dd($request);
        $product = Product::find($id);

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
        return redirect(route('list'));
    }

}
