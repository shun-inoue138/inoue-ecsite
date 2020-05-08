@extends('layouts.management')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">商品編集</div>

                    <div class="card-body">
                        <form method="POST" action="/management/{{$product_to_edit->id}}/edit">
                            @csrf
                            @method('put')

                            <div class="form-group row">
                                <label for="name" class="col-2">商品名</label>

                                <div class="col-10">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product_to_edit->name }}" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-2 ">カテゴリー名</label>

                                <div class="col-10">
                                    <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id" autofocus>
                                        @foreach(config('category') as $key => $value)
                                            <option @if($product_to_edit->category_id === $key) selected @endif value="{{$key}}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="price" class="col-2 ">価格</label>

                                <div class="col-10">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product_to_edit->price}}"  autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stock" class="col-2 ">在庫数</label>

                                <div class="col-10">
                                    <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $product_to_edit->stock}}"  autofocus>

                                    @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-2 ">説明文</label>

                                <div class="col-10">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $product_to_edit->description }}"  autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-6 offset-10" >
                                    <button type="submit" class="btn btn-light">
                                        更新する
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-8">
                    <a href="/management">商品一覧に戻る</a>
                </div>
            </div>

        </div>
    </div>
@endsection


