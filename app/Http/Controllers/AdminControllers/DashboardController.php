<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index(Request $request){

        $countPost = Post::all()->count();
        $countCategories = Category::all()->count();

        $role_admin = Role::where('name','!=','user')->first();
        $countAdmin = User::all()->where('role_id', $role_admin->id)->count();

        $role_user = Role::where('name','user')->first();
        $countUser = User::all()->where('role_id', $role_user->id)->count();

        $postAll = Post::all();

        $countView = 0;
        $countComments = 0;
        foreach ($postAll as $post) {
            $countView =  $countView + $post->views;
            $countComments =  $countComments + $post->comments()->count();
        }


        return view('admin_dashboard.index',[
            'countPost' => $countPost,
            'countCategories' => $countCategories,
            'countAdmin' => $countAdmin,
            'countUser' => $countUser,
            'countView' => $countView,
            'countComments' => $countComments,
        ]);
    }

}
