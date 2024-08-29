<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\RestaurantService;
use App\Services\ServiceService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function __construct(private RestaurantService $restaurantService, private ServiceService $serviceService)
    {
    }

    public function index()
    {
        $services =  $this->serviceService->getAll();
        return view('account.admin.pages.restaurant.add',['services'=>$services]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->restaurantService->store($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with($e->getMessage());
        }
       
    }

    public function getAll(){
        $restaurants = $this->restaurantService->getAll();
        return view('account.admin.pages.restaurant.list',['restaurants'=>$restaurants]);
    }

    public function getEditPage(string $id){
        $restaurant =  $this->findById($id);
        return view('account.admin.pages.restaurant.edit',['restaurant'=>$restaurant,'categories'=>Category::all()]);
    }

    private function findById(string $id)
    {
       return $this->restaurantService->findById($id);
    }

    public function edit(Request $request, $id)
    {
        try {
            $this->restaurantService->update($request->all(), $id);
        } catch (Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $this->restaurantService->delete($id);
            return response()->json(['success' => 'Restaurant deleted successfully.']);
        } catch (Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    
}