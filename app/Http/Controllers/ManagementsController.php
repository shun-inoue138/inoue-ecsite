<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ManagementsController extends Controller
{
    public function index(Product $product)
    {
        return view();
    }

    public function detail($id,Product $product)
    {

    }

    public function edit(Product $product,Request $request)
    {

    }

    public function delete(Product $product,Request $request)
    {

    }

    public function new(Product $product,Request $request)
    {

    }
}
