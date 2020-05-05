@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="row justify-content-center align-items-center">
                    <form method="get" class="col-12">
                        <div class="form-group">
                            <label>キーワード</label>
                            <input type="text" size="20" name="search_keyword"　class="form-control">
                            <button type="submit" class="btn btn-info">検索</button>
                        </div>
                    </form>
                    <div class="col-12">検索結果</div>
                    <h3>{{ $message ?? '' }}</h3>


                </div>

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
                                        <a href="#" class="btn btn-primary">カートに入れる</a>
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
