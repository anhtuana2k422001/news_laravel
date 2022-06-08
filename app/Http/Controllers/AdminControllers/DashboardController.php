<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request){

        // $Username = auth()->user()->name;

        return view('admin_dashboard.index');
    }

}
