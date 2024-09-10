<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    public function index()
    {
        return view('account.admin.pages.product.add',['categories'=>Category::all()]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->productService->store($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with($e->getMessage());
        }
       
    }

    public function getAll(){
        $products = $this->productService->getAll();
        return view('account.admin.pages.product.list',['products'=>$products]);
    }

    public function getEditPage(string $id){
        $product =  $this->findById($id);
        return view('account.admin.pages.product.edit',['product'=>$product,'categories'=>Category::all()]);
    }

    private function findById(string $id)
    {
       return $this->productService->findById($id);
    }

    public function edit(Request $request, $id)
    {
        try {
            $this->productService->update($request->all(), $id);
        } catch (Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $this->productService->delete($id);
            return response()->json(['success' => 'Product deleted successfully.']);
        } catch (Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    
}