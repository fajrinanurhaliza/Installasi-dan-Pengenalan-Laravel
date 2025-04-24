<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HomepageController extends Controller
{
    //fungsi untuk menampilkan halaman homepage
    public function index()
    {
        $categories = Categories::all();

        $title = "Homepage";

        return view('web.homepage', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    public function products()
    {
        $title = "Products";

        return view('web.products', [
            'title' => $title
        ]);
    }

    public function product($slug)
    {
        $title = "Product";

        return view('web.product', ['slug' => $slug, 'title' => $title]);
    }
    public function categories()
    {
        $title = "categories";

        return view('web.categories');
    }
    public function category($slug)
    {
        $title = "category";
        $category = Categories::find($slug);

        return view('web.single_category', [
            'slug' => $slug,
            'category' => $category,
            'title' => $title
        ]);
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