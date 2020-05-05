@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-9">
                <div class="row justify-content-center align-items-center">
                        @foreach($products as $product)
                            <div class="col-6 mb-2">
                                <div class="card">
                                    <img class="card-img-top" src="" alt="">
                                    <div class="card-header">商品名：{{ $product->name }}</div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group">価格：{{ $product->price }}円</li>
                                            <li class="list-group">在庫数：{{ $product->stock }}</li>
                                        </ul>
                                        <a href="#" class="btn btn-primary">詳細</a>
                                        <a href="#" class="btn btn-primary">
                                            <div>abc</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

@endsection
