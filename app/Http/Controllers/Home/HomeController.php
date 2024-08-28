<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\ProductService;

class HomeController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    public function index()
    { 
        return view('home.pages.home',['categories'=>Category::all()]);
    }

    public function getMenu()
    {
        $products = $this->productService->getAll();
        return view('home.pages.menu',['$products'=>$products,'categories'=>Category::all()]);
    }
}