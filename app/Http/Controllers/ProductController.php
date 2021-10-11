<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(Request $request) {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'unit' => 'required',
        ]);

        $product = Product::create($request->all());

        return back();
    }
}
