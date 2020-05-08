<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ManagementsController extends Controller
{
    public function index(Product $product,Request $request)
    {
        unset($message);
        if ($request->has('search_keyword')) {
            $products = Product::where('name', 'like', '%' . $request->get('search_keyword') . '%')->paginate(6);
            //$productsはコレクション型のためisEmpty()で分岐
            if ($products->isEmpty()) {
                $message = '該当する商品はありませんでした。';
            } else {
                $message = '条件に合う商品を表示しました。';
            }
            return view('managements/index', ['products' => $products])->with('message',$message);

        }
        else {
            $products = $product->paginate(6);
            return view('managements/index', ['products' => $products]);
        }
    }


    public function detail($id)
    {
        $product = Product::find($id);
        return view('managements/detail', ['product' => $product]);
    }

    public function edit($id,Product $product,Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
            'description' => 'string|max:300',
            'stock' => 'required|min:0',
        ]);

        $product_to_edit = $product->find($id);
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

    public function new(Product $product,Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
//            'category_id' => 'required',
            'price' => 'required|integer|min:1',
            'description' => 'string|max:300',
            'stock' => 'required|min:0',
        ]);

        $product->fill($request->all())->save();

        return redirect('/management')->with('success_flash_message', '登録が完了しました');
    }

    public function newPage()
    {
        return view('managements/new');
    }

}
