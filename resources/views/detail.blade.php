@extends('layouts.layout')
@section('content')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
            <th>コメント</th>
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
            <td>{{ $product->comment }}</td>
            <td>
                <a href="#"><input type="button" value="編集"></a>
                <input type="button" value="戻る">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection