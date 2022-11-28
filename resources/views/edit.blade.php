@extends('layouts.layout')
@section('title','編集画面')
@section('content')
<div>
    <h2>商品編集フォーム</h2>
    <form action="{{route('update', $product->id)}}" enctype="multipart/form-data" method="post">
    @csrf
    <div>
        <label for="">商品画像</label>
            <div>
                <input type="file" name="img_path">
            </div>
            <img src="{{ asset('storage/image/' . $product->img_path) }}" alt="$product->img_path" width="25%">
    </div>
    <div>
        <label for="">商品名</label>
        <input 
            id="product_name"
            name="product_name"
            value="{{ old('product_name') ?:$product->product_name }}"
            type="text"
        >
    </div>
    <div>
        <select name="company_name" id="company_name">
        @foreach ($products as $product)
            <option value="{{ old('company_name') ?:$product->company_name }}">{{ $product->company_name }}</option>
        @endforeach 
        </select>
    </div>
    <div>
        <label for="">価格</label>
        <input 
            id="price"
            name="price"
            value="{{ old('price') ?:$product->price }}"
            type="text"
        >
    </div>
    <div>
    <label for="">在庫数</label>
        <input 
            id="stock"
            name="stock"
            value="{{ old('stock') ?:$product->stock }}"
            type="text"
        >
    </div>
    <div>
    <label for="">コメント</label>
        <textarea 
            name="comment" 
            id="comment" 
            cols="40" 
            rows="5"
            value="{{ old('comment') ?:$product->comment }}"
        >

        </textarea>
    </div>
    <div>
        <button type="submit">更新する</button>
            <a href="{{ route('detail', $product->id) }}">
                <input type="button" value="戻る">
            </a>
    </div>
    </form>
</div>
@endsection