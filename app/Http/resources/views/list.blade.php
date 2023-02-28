@extends('layouts.app')
@section('title','一覧画面')
@section('main-title','商品一覧')
@section('content')
<form action="{{ route('search') }}" method="get" class="search-from">
    @csrf
    <ul style="list-style:none;">
        <li>
            <input type="text" 
                    class="keyword"
                    id="keyword"
                    name="keyword"
                    placeholder="キーワードを入力"
            >
        </li>
        <li>
            <select id="company" class="company" name="company">
                <option></option>
                @foreach($company as $item)
                <option name="{{ $item->id }}" value="{{ $item->id }}">{{ $item->company_name }}</option>
                @endforeach
            </select>
        </li>
        価格
        <li> 
            <input type="text" placeholder="上限を入力" name="price_upper" id="price_upper">
            ～
            <input type="text" placeholder="下限を入力" name="price_lower" id="price_lower">
        </li>
        在庫数
        <li> 
            <input type="text" placeholder="上限を入力" name="stock_upper" id="stock_upper">
            ～
            <input type="text" placeholder="下限を入力" name="stock_lower" id="stock_lower">
        </li>
    </ul>
    <input type="button" class="search-btn" id="search-btn" value="検索">
</form>
@if (session('err_msg'))
    <p>
        {{ session('err_msg') }}
    </p>
@endif
<table class="table" id="sort_table">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th >商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="{{ asset('storage/image/' . $product->img_path) }}"></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company->company_name }}</td>
            <td>
                <a href="product/{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">詳細</button>
                </a>
                <form action="product/delete/{{$product->id }}" method="post">
                @csrf
                    <input  type="button" class="btn btn-danger" id="delete_btn" value="削除">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection