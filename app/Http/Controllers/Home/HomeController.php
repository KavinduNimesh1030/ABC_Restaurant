<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Services\OfferService;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\ReservationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(private ProductService $productService, private OrderService $orderService, private ReservationService $reservationService,private OfferService $offerService)
    {
    }

    public function index()
    { 
        return view('home.pages.home',['categories'=>Category::all(),'restaurants'=>Restaurant::all()]);
    }

    public function getMenu()
    {
        $products = $this->productService->getAll();
        return view('home.pages.menu',['$products'=>$products,'categories'=>Category::all()]);
    }

    public function loadReservationPage()
    {
        return view('home.pages.reservation');
    }

    public function storeReservation(Request $request)
    {
        try{
            DB::beginTransaction();
            $this->reservationService->store($request->all());
            DB::commit();
            return response()->json(['success' => 'Reserved successfully.']);
          }catch(Exception $e){
            DB::rollBack();
            return redirect()->back($e->getMessage());
          }
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
        return $this->cart();
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

    public function removeFromCart($id) {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    
        $totalValue = $this->calculateCartTotal($cart);
    
        return response()->json([
            'cart' => $cart,
            'totalValue' => $totalValue
        ]);
    }

    private function calculateCartTotal($cart) {
        $total = 0.0;
    
        foreach ($cart as $item) {
            $productPrice = (float) $item['product']['price'];
            $quantity = (int) $item['quantity'];
            $total += $productPrice * $quantity;
        }
    
        return number_format($total, 2);
    }
    
    public function loadCheckoutPage()
    {
        $cart = $this->cart();
        return view('home.pages.checkout',['cart'=>$cart]);
    }

      
    public function checkout(Request $request)
    {
      try{
        DB::beginTransaction();
        $this->orderService->store($request->all());
        DB::commit();
        return response()->json(['success' => 'Order placed successfully.']);
      }catch(Exception $e){
        DB::rollBack();
        return redirect()->back($e->getMessage());
      }
    }

    public function showOffers()
    {
        $offers = $this->offerService->getAll();
        return view('home.pages.offer',['offers'=>$offers]);
    }
}