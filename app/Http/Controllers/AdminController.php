<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function showAdminDashboard(Request $request) {
        return view('admin.dashbaord');
    }
}
