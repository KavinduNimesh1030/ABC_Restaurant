<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Services\StaffService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function __construct(private StaffService $staffService, private PostService $postService)
    {
    }

    public function index()
    {
        $posts = $this->postService->getAll();
        return view('account.admin.pages.staff.add',['posts'=>$posts]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->staffService->store($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with($e->getMessage());
        }
       
    }

    public function getAll(){
        $staffs = $this->staffService->getAll();
        return view('account.admin.pages.staff.list',['staffs'=>$staffs]);
    }

    public function getEditPage(string $id){
        $staff =  $this->findById($id);
        $posts = $this->postService->getAll();
        return view('account.admin.pages.staff.edit',['staff'=>$staff,'posts'=>$posts]);
    }

    private function findById(string $id)
    {
       return $this->staffService->findById($id);
    }

    public function edit(Request $request, $id)
    {
        try {
            $this->staffService->update($request->all(), $id);
        } catch (Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $this->staffService->delete($id);
            return response()->json(['success' => 'Staff deleted successfully.']);
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with($e->getMessage());
        }
    }

    
}