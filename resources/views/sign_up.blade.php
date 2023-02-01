@extends('layouts.app')
@section('title','登録フォーム')
@section('content')
<div class="header">
    <h2>@section('main-title','商品登録フォーム')</h2>
</div>
<div class="form">
    <form action="{{ route('productStore') }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
            <input type="text" name="product_name">商品名
            <select name="company">
                @foreach($company as $item)
                <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                @endforeach
            </select>
            <input type="text" name="price">価格
            <input type="text" name="stock">在庫数
            <input type="textarea" name="comment">コメント
            <input type="file" name="img_path">商品画像
            <input type="submit" value="登録">
        <a href="{{ route('list') }}"><input type="button" name="" id="" value="戻る"></a>
    </form>
</div>
@endsection