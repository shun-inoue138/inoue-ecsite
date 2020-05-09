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
            $products = Product::where('name', 'like', '%' . $request->get('search_keyword') . '%')->orderBy('updated_at','desc')->paginate(6);
            //$productsはコレクション型のためisEmpty()で分岐
            if ($products->isEmpty()) {
                $message = '該当する商品はありませんでした。';
            } else {
                $message = '条件に合う商品を表示しました。';
            }
            return view('managements/index', ['products' => $products])->with('message',$message);

        }
        else {
            $products = $product->orderBy('updated_at','desc')->paginate(6);
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
        $photo = $request->file('photo');

        $category_array = config('category');
        $category_name = $category_array[$data_except_photo['category_id']];

        $tmp_img_path = $photo->store('public/tmp');
        $read_tmp_img_path = str_replace('public/', '/storage/', $tmp_img_path);

        $confirmed_data = array_merge($data_except_photo,['id' => $id, 'category_name' => $category_name, 'tmp_img_path' => $tmp_img_path ,'read_tmp_img_path' => $read_tmp_img_path ]);

        $request->session()->put('confirmed_data',$confirmed_data);

        return view('managements/confirm',['confirmed_data' => $confirmed_data]);
    }

    public function editComplete($id,Product $product,Request $request)
    {
        $confirmed_data = $request->session()->get('confirmed_data');

        $tmp_img_path = $confirmed_data['tmp_img_path'];
        $read_tmp_img_path = $confirmed_data['read_tmp_img_path'];
        $file_name = str_replace('public/tmp/', '', $tmp_img_path);
        $storage_path = 'public/product_image/'.$file_name;

        $request->session()->forget('confirmed_data');

        Storage::move($tmp_img_path, $storage_path);
        $read_img_path = str_replace('public/', '/storage/', $storage_path);

        $product_to_edit = $product->find($id);
        $product_to_edit->img_path = $read_img_path;
        $product_to_edit->fill($request->all())->save();

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
        $photo = $request->file('photo');

        $category_array = config('category');
        $category_name = $category_array[$data_except_photo['category_id']];

        $tmp_img_path = $photo->store('public/tmp');
        $read_tmp_img_path = str_replace('public/', '/storage/', $tmp_img_path);

        $confirmed_data = array_merge($data_except_photo,['category_name' => $category_name, 'tmp_img_path' => $tmp_img_path ,'read_tmp_img_path' => $read_tmp_img_path ]);

        $request->session()->put('confirmed_data',$confirmed_data);

        return view('managements/confirm',['confirmed_data' => $confirmed_data]);
    }

    public function newComplete(Product $product,Request $request)
    {
        $confirmed_data = $request->session()->get('confirmed_data');

        $tmp_img_path = $confirmed_data['tmp_img_path'];
        $read_tmp_img_path = $confirmed_data['read_tmp_img_path'];
        $file_name = str_replace('public/tmp/', '', $tmp_img_path);
        $storage_path = 'public/product_image/'.$file_name;

        $request->session()->forget('confirmed_data');

        Storage::move($tmp_img_path, $storage_path);
        $read_img_path = str_replace('public/', '/storage/', $storage_path);

        $product->img_path = $read_img_path;
        $product->fill($request->all())->save();

        return redirect('/management')->with('success_flash_message', '登録が完了しました');
    }



    public function newPage()
    {
        return view('managements/new');
    }

}
