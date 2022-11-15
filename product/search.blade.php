@extends('layouts.layout')
@section('title','検索結果')
@section('sign_up')
<div class="top-right links">
    <a href="{{ route('create') }}">商品登録</a>
</div>
@endsection
@section('search')
<form action="{{ route('list') }}" method="get">
    <input 
        type="search" 
        name="search" 
        placeholder="キーワードを入力"
        value=""
    >
    <select name="company_name" id="company_name">
    @foreach ($products as $product)
        <option value="{{ $product->company_name }}">{{ $product->company_name }}</option>
    @endforeach
    </select>
    <button type="submit">検索</button>
</form>
@endsection
@section('content')
<h1>検索結果</h1>
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
            <td><img src="{{ asset('image/' . $product->img_path) }}" alt="{{ $product->product_name }}"></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company_name }}</td>
            <td>
                <a href="product/{{ $product->id }}">
                    <button type="submit">詳細</button>
                </a>
            </td>
            <td>
                <form action="{{ route('delete', ['id'=>$product->id]) }}" method="post">
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection