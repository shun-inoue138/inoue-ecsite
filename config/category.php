<?php
//todo:カテゴリーテーブルから連想配列が成形されるようにする＆アプリ内にてカテゴリの登録編集削除が可能になるようにする。
/*use App\Category;

$categories = Category::all();
return compact($categories);*/

/*foreach ($categories as $key => $value ){
    $category_array = [
        $key => $value
    ];
}

return $category_array;*/

return [
    1 => 'ブレスレット',
    2 => 'ネックレス',
    3 => 'マフラー',
];
