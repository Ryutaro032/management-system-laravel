@extends('layouts.layout')
@section('title','登録フォーム')
@section('content')
<div>
    <h2>商品登録フォーム</h2>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="product_name">商品名</label>
            <input type="text" name="product_name" placeholder="商品名を入力">
        </div>
        <div class="form-group">
            <label for="company_name">メーカー名</label>
            <select name="company_name" id="company_name">
                @foreach($creates as $create)
                <option value="{{ $create->company_name }}">{{ $create->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">価格</label>
            <input type="text" name="price" placeholder="価格を入力">
        </div>
        <div class="form-group">
            <label for="stock">在庫数</label>
            <input type="text" name="stock" placeholder="在庫数を入力">
        </div>
        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea name="comment" id="comment" cols="40" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="image">画像選択</label>
            <input type="file" name="image">
        </div>
        <button type="submit">登録</button>
        <a href="product/"><input type="button" value="戻る"></a>
    </form>
</div>
@endsection