<?php

namespace App\Http\Controllers;

use App\Cart;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        //「カートからひとつ削除ボタン」を押下した際、quntityが0になったらビューにデータを送らないようにする
        $products_in_cart = Cart::where('user_id',$user_id)->where('quantity','>',0)->get();
        return view('carts/index', ['products_in_cart' => $products_in_cart]);
    }

    public function in(Request $request)
    {
        $product = Product::find($request->post('product_id'));
        if ($product->stock < $request->post('quantity')){
            $failure_flash_message = '在庫不足です。';
            return redirect('/')->with('failure_flash_message',$failure_flash_message);
        }

        Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $request->post('product_id'),
            ],
            [
                'quantity' => \DB::raw('quantity + ' . $request->post('quantity') ),
            ]
            );
            $success_flash_message = 'カートに商品を追加しました。';

            $product->stock -= $request->post('quantity');
            $product->save();


        return redirect('/')->with('success_flash_message',$success_flash_message);
    }

    public function decrease(Request $request,Cart $cart)
    {
    //①ボタン押下対象となるproductについて、cartsテーブルのquantityをひとつ減らす
        $user_id = Auth::id();
        //save()を使いたいのでfirst()で取得
        $product_in_cart_to_decrease = $cart->where('user_id',$user_id)->where('product_id',$request->post('product_id'))->first();
        $product_in_cart_to_decrease->quantity--;
        $product_in_cart_to_decrease->save();
    //②productsテーブルのstockをひとつ増やす
        $product_to_increase = Product::find($request->post('product_id'));
        $product_to_increase->stock++;
        $product_to_increase->save();
    //③'/cart'にリダイレクトした際にCartsContoroller＠indexが走り、画面に表示されるquantityが修正される
        return redirect('/cart');
    }

    public function complete()
    {
       //todo:購入ボタン押下後の処理（画面遷移とカートテーブルの削除）
    }

}
