<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminController extends Controller
{
    
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_role' => 'admin'])) {
            $allAuthors = Admin::getAllAuthors();
            return view('admin/admin')->with('allAuthors', $allAuthors);
        }
        return redirect()->back();
    }

    public function showAuthor(){
          $allAuthors = Admin::getAllAuthors();
            return view('admin/admin')->with('allAuthors', $allAuthors);
    }


    public function showBlog(){
          $allBlogs = Admin::getAllBlogs();
            return view('admin/blog')->with('allBlogs', $allBlogs);
    }


    public function updateUser() {
      Admin::updateUserEnable(request('user_id'), request('check_val'));
      
    }


    public function updateBlog() {
      Admin::updateBlogPublish(request('post_id'), request('check_val'));
      
    }



}