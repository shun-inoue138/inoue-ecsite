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
                    <form action="/cart" method="post" class="form-inline">
                        @csrf
                        <select name="quantity" class="form-control">
                            <option selected>1</option>
                            @for($i=2;$i<10;$i++)
                                <option>{{$i}}</option>
                            @endfor
                        </select>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary ">カートに入れる</button>
                    </form>
                </div>
            </div>
            <div class="col-12">
                 <a href="/">商品一覧に戻る</a>
            </div>
        </div>
    </div>
@endsection
