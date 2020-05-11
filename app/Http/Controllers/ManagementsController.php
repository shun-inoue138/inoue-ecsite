<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManagementsController extends Controller
{
    public function index(Product $product,Request $request)
    {
        unset($message);
        if ($request->has('search_keyword')) {
            $products = Product::where('name', 'like', '%' . $request->get('search_keyword') . '%')->orderBy('created_at','desc')->paginate(6);
            //$productsはコレクション型のためisEmpty()で分岐
            if ($products->isEmpty()) {
                $message = '該当する商品はありませんでした。';
            } else {
                $message = '条件に合う商品を表示しました。';
            }
            return view('managements/index', ['products' => $products])->with('message',$message);

        }
        else {
            $products = $product->orderBy('created_at','desc')->paginate(6);
            return view('managements/index', ['products' => $products]);
        }
    }


    public function detail($id)
    {
        $product = Product::find($id);
        return view('managements/detail', ['product' => $product]);
    }

    public function editConfirm($id,Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
            'description' => 'string|max:300',
            'stock' => 'required|min:0',
            'photo' => 'required|image',

        ]);

        $data_except_photo = $request->except('photo');
        $posted_photo = $request->file('photo');

//todo        ＄requestで送られてきたカテゴリidをカテゴリ名に変換している。もっと簡潔な方法を探す。
        $category_array = config('category');
        $category_name = $category_array[$data_except_photo['category_id']];

//todo        ここでs3の指定バケットへ画像アップロードが完了するが、「確認画面」にて修正ボタン等が押下された場合は当ファイルを削除したい。
        $path = Storage::disk('s3')->putFile('product-photo', $posted_photo, 'public');

        // アップロードした画像のフルパスを取得
        $full_path = Storage::disk('s3')->url($path);

        $posted_data = array_merge($data_except_photo,['id' => $id,'category_name' => $category_name,'full_path' => $full_path  ]);

        return view('managements/confirm',['posted_data' => $posted_data]);
    }

    public function editComplete($id,Product $product,Request $request)
    {
        $product_to_edit = $product->find($id);
        $product_to_edit->fill($request->all());
        $product_to_edit->img_path = $request->post('full_path');
        $product_to_edit->save();

        return redirect('/management')->with('success_flash_message', '更新が完了しました');


    }

    public function editPage($id,Product $product)
    {
        $product_to_edit = $product->find($id);
        return view('managements/edit', ['product_to_edit' => $product_to_edit]);
    }

    public function delete($id,Product $product)
    {
        $product->find($id)->delete();
        return redirect('/management')->with('success_flash_message', '削除が完了しました');

    }

    public function newConfirm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
            'description' => 'string|max:300',
            'stock' => 'required|min:0',
            'photo' => 'required|image',

        ]);

        $data_except_photo = $request->except('photo');
        $posted_photo = $request->file('photo');

//todo        ＄requestで送られてきたカテゴリidをカテゴリ名に変換している。もっと簡潔な方法を探す。
        $category_array = config('category');
        $category_name = $category_array[$data_except_photo['category_id']];

//todo        ここでs3の指定バケットへ画像アップロードが完了するが、「確認画面」にて修正ボタン等が押下された場合は当ファイルを削除したい。
        $path = Storage::disk('s3')->putFile('product-photo', $posted_photo, 'public');

        // アップロードした画像のフルパスを取得
        $full_path = Storage::disk('s3')->url($path);

        $posted_data = array_merge($data_except_photo,['category_name' => $category_name,'full_path' => $full_path  ]);

        return view('managements/confirm',['posted_data' => $posted_data]);
    }

    public function newComplete(Product $product,Request $request)
    {

        $product->fill($request->all());
        $product->img_path = $request->post('full_path');
        $product->save();

        return redirect('/management')->with('success_flash_message', '登録が完了しました');
    }



    public function newPage()
    {
        return view('managements/new');
    }

}
