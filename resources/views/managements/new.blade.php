@extends('layouts.management')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">商品登録</div>

                    <div class="card-body">
                        <form method="POST" action="/management/new/confirm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-2">商品名</label>

                                <div class="col-10">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>

                                    @error('name')
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
                                        <option @if(old('category_id') === $key) selected @endif value="{{$key}}">{{ $value }}</option>
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
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price')}}"  autofocus>

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
                                    <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock')}}"  autofocus>

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
                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autofocus>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo" class="col-2 ">写真</label>

                                    {{-- TODO:写真の選択が保持されるようにする。--}}
                                    <div class="col-10">
                                        <input id="photo" type="file" class=" @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}"  autofocus>

                                        @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="form-group row ">
                                <div class="col-6 offset-8" >
                                    <button type="submit" class="btn btn-primary"　name="confirm_type" value="new">
                                        入力内容を確認する
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

