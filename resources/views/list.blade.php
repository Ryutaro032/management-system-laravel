@extends('layouts.app')
@section('title','一覧画面')
@section('main-title','商品一覧')
@section('search')
<form action="{{ route('search') }}" method="post" class="search-from">
    @csrf
    <input 
        type="text" 
        class="keyword"
        id="keyword"
        name="keyword"
        placeholder="キーワードを入力"
        value="@if (isset( $keyword )) {{ $keyword }}@endif"
    >
    <select id="company" class="company" value="@if (isset( $company )) {{ $company }}@endif" name="company">
        <option></option>
        @foreach($company as $item)
        <option name="{{ $item->id }}" value="{{ $item->id }}">{{ $item->company_name }}</option>
        @endforeach
    </select>
    <input type="button" class="search-btn" id="search-btn" value="検索">
</form>
@endsection
@section('content')
@if (session('err_msg'))
    <p>
        {{ session('err_msg') }}
    </p>
@endif
<table class="table">
    <thead class="thead-light">
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
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection