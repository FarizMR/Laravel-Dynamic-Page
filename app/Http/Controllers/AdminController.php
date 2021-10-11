<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function showAdminDashboard(Request $request) {
        $pages = Page::all();

        return view('admin.dashbaord', ['pages' => $pages]);
    }

    public function page_categories(Request $request, $page_id) {
        $page = Page::findOrFail($page_id);

        return $page->category;
    }

    public function admin_create_page(Request $request) {
        PageController::create($request);

        return back();
    }

    public function admin_create_category(Request $request) {
        CategoryController::create($request);

        return back();
    }

    public function admin_create_product(Request $request) {
        ProductController::create($request);

        return back();
    }

}
