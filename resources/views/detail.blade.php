@extends('layouts.layout')
@section('title','詳細表示')
@section('content')
<table class="table">
    <thead class="thead-light">
        <tr>
            <th hidden>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>メーカー名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>コメント</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td hidden>{{ $product->id }}</td>
            <td><img src="{{ asset('storage/image/' . $product->img_path) }}" alt="{{ $product->img_path }}"></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->company->company_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->comment }}</td>
            <td>
                <button 
                    type="submit" 
                    class="btn-light"
                >
                    <a href="{{route('edit', $product->id )}}">
                        編集
                    </a>
                </button>
                <a href="product">
                    <input type="button" value="戻る" class="btn-dark">
                </a>
            </td>
        </tr>
    </tbody>
</table>
@endsection