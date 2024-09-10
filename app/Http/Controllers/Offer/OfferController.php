<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\OfferService;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function __construct(private OfferService $offerService, private ProductService $productService)
    {
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('account.admin.pages.offer.add',['products'=>$products]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->offerService->store($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with($e->getMessage());
        }
       
    }

    public function getAll(){
        $offers = $this->offerService->getAll();
        return view('account.admin.pages.offer.list',['offers'=>$offers]);
    }

    public function getEditPage(string $id){
        $offer =  $this->findById($id);
        $products = $this->productService->getAll();
        return view('account.admin.pages.offer.edit',['offer'=>$offer,'products'=>$products]);
    }

    private function findById(string $id)
    {
       return $this->offerService->findById($id);
    }

    public function edit(Request $request, $id)
    {
        try {
            $this->offerService->update($request->all(), $id);
        } catch (Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $this->offerService->delete($id);
            return response()->json(['success' => 'Offer deleted successfully.']);
        } catch (Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    
}