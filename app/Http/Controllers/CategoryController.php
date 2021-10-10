<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(Request $request) {
        $this->validate($request, [
            'page_id' => 'required',
            'title' => 'required',
        ]);

        $category = Category::create([
            'page_id' => $request->page_id,
            'title' => $request->title,
        ]);

        return $category;
    }
}
