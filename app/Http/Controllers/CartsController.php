<?php

namespace App\Http\Controllers;

use App\Cart;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
   
    public function In(Request $request)
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
}
