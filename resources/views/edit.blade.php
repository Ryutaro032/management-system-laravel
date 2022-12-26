@extends('layouts.layout')
@section('title','編集画面')
@section('content')
<div class="header">
    <h2>@section('main-title','商品編集フォーム')</h2>
</div>
<div>
    <form action="{{route('update', ['id'=>$product->id])}}" enctype="multipart/form-data" method="post">
    @csrf
        <div>
            <input type="file" name="img_path" value="{{ old('img_path') ?:$product->img_path }}" class="form-control-file">
        </div>
        <div>
            <label>商品名</label>
            <input name="product_name" value="{{ old('product_name') ?:$product->product_name }}" type="text">
        </div>
        <div>
            <label>価格</label>
            <input name="price" value="{{ old('price') ?:$product->price }}" type="text">
        </div>
        <div>
            <label>在庫数</label>
            <input name="stock" value="{{ old('stock') ?:$product->stock }}"  type="text">
        </div>
        <div>
            <label>コメント</label>
            <textarea name="comment" value="comment"  cols="40" rows="5">
            {{$product->comment}}
            </textarea>
        </div>
        <div>
            {{ $product->company->company_name }}
            <select name="company" value="company">
                @foreach ($company as $item)
                    <option name="{{ $item->id }}" value="{{ $item->id }}">
                        {{ $item->company_name }}
                    </option>
                @endforeach
            </select>
        </div>
         <div>
            <input type="submit" class="btn-success"></input>
            <a href='{{ route("detail", ["id"=> $product->id]) }}'>
                <input type="button" value="戻る" class="btn-dark">
            </a>
        </div>
    </form>
</div>
@endsection