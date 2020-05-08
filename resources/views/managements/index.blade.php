@extends('layouts.management')

@section('content')



    <div class="container">
        <div class="row">
            <h3>
                <a href="/management/new">新しく商品を登録する</a>
            </h3>
        </div>
        <div class="row">
            <div class="col-3" style="background-color:#ffffff ;">
                <div class="row justify-content-center align-items-center">

                    <form method="get" class="col-12">
                        <div class="form-group">
                            <label for="search">商品名検索</label>
                            <input id="search" type="text" size="20" name="search_keyword"　class="form-control">
                            <button type="submit" class="btn btn-info">GO</button>
                        </div>
                    </form>
                    <h5 class="col-11">{{ $message ?? 'ここに検索結果が表示されます' }}</h5>
                    <a class="col-11"　href="/management">商品をすべて表示する</a>
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
                                    <a href="/management/{{$product->id}}" class="btn btn-primary">内容確認</a>
                                    <a href="/management/{{$product->id}}/edit" class="btn btn-light">編集</a>
                                    <form action="/management/{{$product->id}}/delete" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
{{--                                        TODO：以下一文不要？--}}
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
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
