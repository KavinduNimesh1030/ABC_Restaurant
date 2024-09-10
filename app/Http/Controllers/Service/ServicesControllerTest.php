<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\ServiceService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function __construct(private ServiceService $serviceService)
    {
    }

    public function index()
    {
        return view('account.admin.pages.service.add');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->serviceService->store($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            // return redirect()->back()->with($e->getMessage());
        }
       
    }

    public function getAll(){
       try{
        $services = $this->serviceService->getAll();
        return $services;
        // return view('account.admin.pages.service.list',['services'=>$services]);
       }catch(Exception $e){
        // return redirect()->back()->with($e->getMessage());
       }
    }

    public function getEditPage(string $id){
        $service =  $this->findById($id);
        return $service;
        // return view('account.admin.pages.service.edit',['service'=>$service]);
    }

    private function findById(string $id)
    {
       return $this->serviceService->findById($id);
    }

    public function edit(Request $request, $id)
    {
        try {
            $this->serviceService->update($request->all(), $id);
        } catch (Exception $e) {
            // return redirect()->back()->with($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
             $this->serviceService->delete($id);
          
            return ['success' => 'Service deleted successfully.'];
        } catch (Exception $e) {
            // return redirect()->back()->with($e->getMessage());
        }
    }

    
}