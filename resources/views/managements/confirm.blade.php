@extends('layouts.management')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">入力内容の確認</div>

                    <div class="card-body">
{{--                        本画面の遷移元画面が「新規登録」か「更新」かによって分岐--}}
                        <form method="POST" action="@if($posted_data['confirm_type'] ==='new') /management/new/complete @elseif($posted_data['confirm_type'] ==='edit') /management/{{$posted_data['id']}}/edit/complete @else /management @endif" >
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-2">商品名</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $posted_data['name'] }}</p>
                                    <input id="name" type="hidden" name="name" value="{{ $posted_data['name'] }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-2 ">カテゴリー名</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $posted_data['category_name'] }}</p>
                                    <input id="category_id" type="hidden" name="category_id" value="{{ $posted_data['category_id'] }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="price" class="col-2 ">価格</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $posted_data['price'] }}</p>
                                    <input id="price" type="hidden" name="price" value="{{ $posted_data['price'] }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stock" class="col-2 ">在庫数</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $posted_data['stock'] }}</p>
                                    <input id="stock" type="hidden" name="stock" value="{{ $posted_data['stock'] }}">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-2 ">説明文</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $posted_data['description'] }}</p>
                                    <input id="description" type="hidden" name="description" value="{{ $posted_data['description'] }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tmp_img_path" class="col-2 ">写真</label>

                                <div class="col-10">
                                    <img class="form-control-static" width="300" height="300" src=" {{ $posted_data['full_path'] }} ">
                                    <input id="full_path" type="hidden" name="full_path" value="{{ $posted_data['full_path'] }}">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="offset-10 " >
                                    <button type="submit" class="btn btn-primary">
                                        確定する
                                    </button>
                                    {{--<a href="@if($posted_data['confirm_type'] ==='new') /management/new @elseif($posted_data['confirm_type'] ==='edit') /management/{{$posted_data['id']}}/edit @else /management @endif">
                                        <button class="btn btn-light">修正する</button>
                                    </a>--}}
                                </div>
                            </div>
                        </form>
                            <div class="row">
                                <a class=" offset-10" href="@if($posted_data['confirm_type'] ==='new') /management/new @elseif($posted_data['confirm_type'] ==='edit') /management/{{$posted_data['id']}}/edit @else /management @endif">
                                    <button class="btn btn-light">修正する</button>
                                </a>
                            </div>
                    </div>
                </div>
                </div>
                <div class="col-6">
                    <a href="/management">商品一覧に戻る</a>
                </div>
            </div>

        </div>
@endsection
