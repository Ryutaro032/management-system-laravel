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
            <label for="">商品画像</label>
            <div>
                <input type="file" name="img_path" class="form-control-file">
            </div>
            <img src="{{ asset('storage/image/' . $product->img_path) }}" alt="$product->img_path" width="25%">
        </div>
        <div>
            <label for="">商品名</label>
            <div>
                <input 
                    id="product_name"
                    name="product_name"
                    value="{{ old('product_name') ?:$product->product_name }}"
                    type="text"
                >
            </div>
        </div>
        <div>
            <label for="">価格</label>
            <div>
                <input 
                    id="price"
                    name="price"
                    value="{{ old('price') ?:$product->price }}"
                    type="text"
                >
            </div>
        </div>
        <div>
            <label for="">在庫数</label>
            <div>
                <input 
                    id="stock"
                    name="stock"
                    value="{{ old('stock') ?:$product->stock }}"
                    type="text"
                >
            </div>
        </div>
        <div>
            <label for="">コメント</label>
            <div>
                <textarea 
                    name="comment" 
                    id="comment" 
                    cols="40" 
                    rows="5"
                >
                {{$product->comment}}
                </textarea>
            </div>
        </div>
        <div>
            <select name="company_name" id="company_name">
                @foreach ($items as $key => $item)
                    <option>
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