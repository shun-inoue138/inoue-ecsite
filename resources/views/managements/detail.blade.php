@extends('layouts.management')

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
                        <li class="list-group">カテゴリ-：{{ $product->category->name }}</li>
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
                </div>
            </div>
            <div class="col-12">
                <a href="/management">商品一覧に戻る</a>
            </div>
        </div>
    </div>
@endsection
