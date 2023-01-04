@extends('layouts.layout')
@section('title','一覧画面')
@section('main-title','商品一覧')
@section('header')
<div class="top-right">
    @if (Route::has('login'))
        <div class="nav btn-group">
            <a href="{{ route('create') }}" class="btn-outline-primary">商品登録</a>
            @auth
                <!--<a href="{{ url('/home') }}" class="btn-outline-primary">Home</a>-->
               
                    <a class="btn-outline-primary"href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
              

            @else
                <a href="{{ route('login') }}" class="btn-outline-primary">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-outline-primary">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
@endsection
@section('search')
<form action="{{ route('search') }}" method="get">
    @csrf
    <input 
        type="text" 
        name="keyword" 
        placeholder="キーワードを入力"
        value="@if (isset( $keyword )) {{ $keyword }}@endif"
    >
    <select name="company" value="company">
        <option value="">選択してください</option>
        @foreach($company as $item)
        <option name="{{ $item->id }} company_name" value="{{ $item->id }}">{{ $item->company_name }}</option>
        @endforeach
    </select>
    <button type="submit">検索</button>
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