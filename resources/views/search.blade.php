@extends('layouts.app')
@section('title','検索結果')
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
            <td><img src="{{ asset('storage/image/' . $product->img_path) }}"></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company->company_name }}</td>
            <td>
                <a href="{{ $product->id }}">
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
<a href="{{ route('list') }}"><input type="button" name="" id="" value="一覧表示に戻る"></a>
@endsection