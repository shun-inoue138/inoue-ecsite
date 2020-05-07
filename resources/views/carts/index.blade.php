@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-start">
            <div class="col-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">商品名</th>
                        <th scope="col">金額</th>
                        <th scope="col">個数</th>
                        <th scope="col">変更</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products_in_cart as $product_in_cart)
                    <tr>
                        <td scope="row">{{ $product_in_cart->product->name }}</td>
                        <td>{{ $product_in_cart->product->price }}円</td>
                        <td>{{ $product_in_cart->quantity }}</td>
                        <td>
                            <form action="/cart" method="post" class="form-inline">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="product_id" value="{{ $product_in_cart->product_id }}">
                                <button type="submit" class="btn btn-dark ">カートからひとつ削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                    <form action="/cart/done" method="post">
                        @csrf
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">購入する</button>
                        </div>
                    </form>

                </div>
            </div>
        <div>
            <a href="/">商品一覧に戻る</a>
        </div>
    </div>

@endsection
