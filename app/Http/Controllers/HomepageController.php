<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Product;


use Illuminate\Http\Request;

use function Livewire\Volt\title;

class HomepageController extends Controller
{
    // fungsi untuk menampilkan halaman homepage
    public function index()
    {
        $categories = Categories::all();
        $products = Product::latest()->take(8)->get();
        $title = "homepage";

        
        return view('web.homepage',[
        'title' => $title,
        'categories' => $categories,
        'products' => $products,
        ]);
       
    }
    public function category($slug)
    {
        $category = Categories::find($slug);
        return view('web.category_by_slug', [
            'slug' => $slug,
            'category' => $category]);
    }

    public function products()
{
    $title = "Products";
    $products = Product::latest()->paginate(12); // atau ->get() jika tidak ingin pakai pagination

    return view('web.products', [
        'title' => $title,
        'products' => $products,
    ]);
}
    public function product($slug)
    {
        $title = "product";
        return view('web.product', ['title'=>$title,'slug'=>$slug]);
    }


    public function categories()
    {
        return view('web.categories');
    }
  
    public function cart()
    {
        return view('web.cart');
    }

    public function checkout()
    {
        return view('web.checkout');
    }
}