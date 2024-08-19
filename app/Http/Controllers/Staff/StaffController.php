<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;


class StaffController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('account.admin.pages.staff.add');
    }
}