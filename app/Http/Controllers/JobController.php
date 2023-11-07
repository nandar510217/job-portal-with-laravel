<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('admin.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.job.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required'
        ]);
        $jobs = Job::Create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary
        ]);
        return redirect('admin/jobs')->with('success','You have successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::find($id);
        $categories = Category::all();
        return view('admin.job.edit', compact('job','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' =>'required',
            'category_id' => 'required',
            'description' => 'required',
            'salary' => 'required'
        ]);

        $job = Job::find($id);
        $job = $job->Update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'salary' => $request->salary
        ]);
        return redirect('admin/jobs')->with('success', 'You have successfully updated.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect('admin/jobs')->with('success', 'You have successfully deleted.');
    }
}
