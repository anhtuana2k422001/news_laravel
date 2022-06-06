<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class AdminRolesController extends Controller
{
  
    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin_dashboard.roles.create', [
            'permissions' => Permission::all(),
        ]);
    }

 
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
