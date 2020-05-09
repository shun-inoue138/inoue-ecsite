<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
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
            return view('products/index', ['products' => $products])->with('message',$message);

        }
        else{
            $products = Product::orderBy('updated_at','desc')->paginate(6);
            return view('products/index', ['products' => $products]);

        }
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('products/detail', ['product' => $product]);

    }


}
