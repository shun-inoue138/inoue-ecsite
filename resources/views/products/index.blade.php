@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3" style="background-color:#ffffff ;">
                <div class="row justify-content-center align-items-center">
                    <form method="get" class="col-12">
                        <div class="form-group">
                            <label>キーワード</label>
                            <input type="text" size="20" name="search_keyword"　class="form-control">
                            <button type="submit" class="btn btn-info">検索</button>
                        </div>
                    </form>
                    <div class="col-12">検索結果</div>
                    <h5>{{ $message ?? '' }}</h5>
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
                                            <li class="list-group">カテゴリー：{{ $product->category->name }}</li>
                                        </ul>
                                        <a href="/{{ $product -> id }}" class="btn btn-primary">詳細</a>
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
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            {{ $products->appends(['search_keyword' => Request::get('search_keyword')])->links() }}
        </div>
    </div>

@endsection
