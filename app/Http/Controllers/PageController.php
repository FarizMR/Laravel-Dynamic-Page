<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Page;

class PageController extends Controller
{
    public function showLandingPage(Request $request) {
        $pages = Page::all();

        return view('landing_page',['pages' => $pages]);
    }

    public function showServicePage(Request $request, $slug) {
        $page = $this->show($request,$slug);

        return view('service',['page' => $page]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $page = Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title,'-'),
        ]);

        return $page;
    }

    public function show(Request $request, $slug) {
        $page = Page::where('slug', $slug)->firstOrFail();

        foreach($page->category as $key=>$row) {
            $category = array([
                $row,
                $products = $row->product,
            ]);
        }

        return $page;
    }

    public function getAll() {
        return Page::all();
    }
}
