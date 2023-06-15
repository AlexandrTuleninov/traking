<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;

class CatalogController extends Controller
{
    public function index() {
        $roots = Category::all();
        return view('catalog.index', compact('roots'));
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('catalog.category', compact('category'));
    }

    public function provider($slug) {
     
        $provider = Provider::where('slug', $slug)->firstOrFail();
 
        return view('catalog.provider', compact('provider'));
    }
    public function product($name) {
        $product = Product::where('name', $name)->firstOrFail();
        return view('catalog.product', compact('product'));
    }
}