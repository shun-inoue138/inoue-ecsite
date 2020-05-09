@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center align-item-around">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">商品名：{{ $product->name }}</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group">価格：{{ $product->price }}円</li>
                            <li class="list-group">在庫数：{{ $product->stock }}</li>
                            <li class="list-group">カテゴリー：{{ $product->category->name }}</li>
                            <li class="list-group">説明文：{{ $product->description }}</li>
                        </ul>
                        <form action="/cart" method="post" class="form-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-dark ">カートに入れる</button>
                            <select name="quantity" class="form-control">
                                <option selected>1</option>
                                @for($i=2;$i<10;$i++)
                                    <option>{{$i}}</option>
                                @endfor
                            </select>
                        </form>
                        <img class="card-img-bottom" src="{{ $product->img_path}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-6">
                <a href="/">商品一覧に戻る</a>
            </div>
        </div>

@endsection
