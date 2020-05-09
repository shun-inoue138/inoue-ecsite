@extends('layouts.management')

@section('content')
    @php    var_dump($confirmed_data);    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">入力内容の確認</div>

                    <div class="card-body">
{{--                        本画面の遷移元画面が「新規登録」か「更新」かによって分岐--}}
                        <form method="POST" action="{{--@if(session('new_confirm')) --}}/management/new/complete"{{-- @elseif(session('edit_confirm'))/management/{{$confirmed_data['id']}}/edit/complete " @endif--}}>
{{--                            TODO:なぜか出力されてしまう--}}
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-2">商品名</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $confirmed_data['name'] }}</p>
                                    <input id="name" type="hidden" name="name" value="{{ $confirmed_data['name'] }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-2 ">カテゴリー名</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $confirmed_data['category_name'] }}</p>
                                    <input id="category_id" type="hidden" name="category_id" value="{{ $confirmed_data['category_id'] }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="price" class="col-2 ">価格</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $confirmed_data['price'] }}</p>
                                    <input id="price" type="hidden" name="price" value="{{ $confirmed_data['price'] }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stock" class="col-2 ">在庫数</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $confirmed_data['stock'] }}</p>
                                    <input id="stock" type="hidden" name="stock" value="{{ $confirmed_data['stock'] }}">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-2 ">説明文</label>

                                <div class="col-10">
                                    <p class="form-control-static">{{ $confirmed_data['description'] }}</p>
                                    <input id="description" type="hidden" name="description" value="{{ $confirmed_data['description'] }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tmp_img_path" class="col-2 ">写真</label>

                                <div class="col-10">
                                    <img class="form-control-static" width="200" height="130" src=" {{ $confirmed_data['read_tmp_img_path'] }} ">
{{--                                    <input id="tmp_img_path" type="hidden" name="tmp_img_path" value="{{ $confirmed_data['read_tmp_img_path'] }}">--}}
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-6 offset-10" >
                                    <button type="submit" class="btn btn-primary">
                                        確定する
                                    </button>
                                </div>
                            </div>
                        </form>
{{--                        <a href="@if(session('new_confirm'))/management/new @else /management/{{$confirmed_data['id']}}/edit @endif">--}}
{{--                            <button class="btn btn-light">修正する</button>--}}
{{--                        </a>--}}
                    </div>
                </div>
                </div>
                <div class="col-8">
                    <a href="/management">商品一覧に戻る</a>
                </div>
            </div>

        </div>
@endsection


