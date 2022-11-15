@extends('layouts.layout')
@section('title','編集画面')
@section('content')
<div>
    <h2>商品編集フォーム</h2>
    <form action="{{route('update', ['id' => $product->id])}}" method="post">
    @csrf
    <div>
        <label for="">商品画像</label>
            <input 
                id="img"
                name="img"
                value="{{ old('img_path') ?:$product->img_path }}"
                type="file"
        >
    </div>
    <div>
        <label for="">商品名</label>
        <input 
            id="product_name"
            name="product_name"
            value="{{ old('product_name') ?:$product->name }}"
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
        <button type="submit">更新する</button>
        <a href="#">
            <input type="button" value="戻る">
        </a>
    </form>
</div>
@endsection