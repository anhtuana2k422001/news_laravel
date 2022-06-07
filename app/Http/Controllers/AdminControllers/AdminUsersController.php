<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;

class AdminUsersController extends Controller
{

    public function index()
    {
        //
    }

  
    public function create()
    {
        return view('admin_dashboard.users.create', [
            'roles' => Role::pluck('name','id'),
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
