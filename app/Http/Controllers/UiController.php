<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class UiController extends Controller
{
    public function index() {
        $jobs = Job::all();
        $categories = Category::all();
        return view('ui-panel.welcome', compact('jobs', 'categories'));
    }

    public function searchById($id) {
        $categories = Category::all();
        $jobs = Job::where('category_id', $id)->get();
        return view('ui-panel.welcome', compact('categories', 'jobs'));
    }

    public function search(Request $request) {
          $searchData = $request->search;
          $jobs = Job::where('title','like', '%' .$searchData. '%')->orWhere('description','like', '%' . $searchData. '%')->get();
          $categories = Category::all();
          return view('ui-panel.welcome', compact('jobs', 'categories'));
    }

    //employee profile
    public function employeeProfile() {
        $user = Auth::user();
        $messages = Message::where('employee_id', $user->id)->get();
    
        return view('ui-panel.employeeProfile', compact('messages', 'user'));
     }
  



}
