@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="row justify-content-center align-items-center bg-white">
                    <form method="get" class="col-12">
                        <div class="form-group">
                            <label for="search">商品名検索</label>
                            <input id="search" type="text" size="20" name="search_keyword"　class="form-control">
                            <button type="submit" class="btn btn-info">GO</button>
                        </div>
                    </form>
                    <h5 class="col-11">{{ $message ?? 'ここに検索結果が表示されます' }}</h5>
                    <a class="col-11" href="/">商品をすべて表示する</a>
                </div>
            </div>
            <div class="col-9">
                <div class="row justify-content-start align-items-center">
                        @foreach($products as $product)
                            <div class="col-6 mb-2">
                                <div class="card">
                                    <div class="card-header">商品名：{{ $product->name }}</div>
                                    <div class="card-body">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-8">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group">価格：{{ $product->price }}円</li>
                                                    <li class="list-group">在庫数：{{ $product->stock }}</li>
                                                    <li class="list-group">カテゴリー：{{ $product->category->name }}</li>
                                                </ul>
                                                <a href="/{{ $product -> id }}" class="btn btn-primary">詳細</a>
                                                <form action="/cart" method="post" class="form-inline d-inline">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button type="submit" class="btn btn-dark text-white ">カートに入れる</button>
                                                    <select name="quantity" class="form-control">
                                                        <option selected>1</option>
                                                        @for($i=2;$i<10;$i++)
                                                            <option>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </form>
                                            </div>
                                            <div class="col-4">
                                                <img class="card-img" src="{{ $product->img_path }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            <div class="row justify-content-center">
                {{ $products->appends(['search_keyword' => Request::get('search_keyword')])->links() }}
            </div>
        </div>

@endsection
