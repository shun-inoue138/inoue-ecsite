@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center align-item-around">
            <div class="card col-12">
                <img class="card-img-top" src="" alt="">
                <div class="card-header">商品名：{{ $product->name }}</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group">価格：{{ $product->price }}円</li>
                        <li class="list-group">在庫数：{{ $product->stock }}</li>
                        <li class="list-group">説明文：{{ $product->description }}</li>
                    </ul>
                    <a href="#" class="btn btn-primary">カートに入れる</a>
                </div>
            </div>
            <div class="col-12">
                 <a href="/">商品一覧に戻る</a>
            </div>
        </div>
    </div>
@endsection
