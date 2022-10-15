@extends('layouts.layout')
@section('content')
<div>
    <input type="search" name="search" placeholder="キーワードを入力">
    <input type="submit" name="submit" value="検索">
</div>
@if (session('err_msg'))
    <p>
        {{ session('err_msg') }}
    </p>
@endif
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->img_path }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company_name }}</td>
            <td>
            <a href="/product/{{ $product->id }}"><input type="button" value="詳細"></a>
                <input type="button" value="削除">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection