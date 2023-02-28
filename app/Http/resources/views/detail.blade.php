@extends('layouts.app')
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
            <td><img src="{{ asset('storage/image/' . $product->img_path) }}" alt="{{ $product->img_path }}" name="img_path"></td>
            <td name="product_name">{{ $product->product_name }}</td>
            <td name="company">
                <p>{{ $product->company->company_name }}</p>
            </td>
            <td name="price">{{ $product->price }}</td>
            <td name="stock">{{ $product->stock }}</td>
            <td name="comment">{{ $product->comment }}</td>
            <td>
                <button 
                    type="submit" 
                    class="btn-light"
                >
                    <a href="{{route('edit', $product->id )}}">
                        編集
                    </a>
                </button>
                <a href="{{ route('list') }}"><input type="button" name="" id="" value="戻る"></a>
            </td>
        </tr>
    </tbody>
</table>
@endsection