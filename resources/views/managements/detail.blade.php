@extends('layouts.management')

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
                            <li class="list-group">登録日：{{ $product->created_at }}</li>
                            <li class="list-group">更新日：{{ $product->updated_at }}</li>
                        </ul>
                        <a href="/management/{{$product->id}}/edit" class="btn btn-light">編集</a>
                        <form action="/management/{{$product->id}}/delete" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            {{--                                        TODO：以下一文不要？--}}
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
                        </form>
                        <img class="card-img-bottom" src="{{ $product->img_path}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-6">
                <a href="/management">商品一覧に戻る</a>
            </div>
        </div>

    </div>
@endsection
