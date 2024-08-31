<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Http\Request;

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

    public function addToCart(Request $request)
    {
        $product = $this->productService->findById($request->id);
        $cart = session()->get('cart', []);
        
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += 1;
        } else {
            $cart[$request->id] = [
                "product" => $product,
                "quantity" => 1,
            ];
        }
        
        session()->put('cart', $cart);
        
        // Calculate totals
        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        $totalValue = array_sum(array_map(function ($item) {
            return $item['product']->price * $item['quantity'];
        }, $cart));
        
        return response()->json([
            'totalQuantity' => $totalQuantity,
            'totalValue' => number_format($totalValue, 2),
        ]);
    }

    public function cart()
{
    $cart = session()->get('cart', []);
    $totalValue = array_sum(array_map(function ($item) {
        return $item['product']->price * $item['quantity'];
    }, $cart));

    return response()->json([
        'cart' => array_map(function ($item) {
            return [
                'product' => $item['product'],
                'quantity' => $item['quantity'],
            ];
        }, $cart),
        'totalValue' => number_format($totalValue, 2),
    ]);
}

    

    
}