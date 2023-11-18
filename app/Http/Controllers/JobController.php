<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Message;
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
            'employer_id' => 'required',    
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric'
        ]);

        $jobs = Job::Create([
            'category_id' => $request->category_id,
            'employer_id' => $request->employer_id,
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
            'employer_id' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric'
        ]);

        $job = Job::find($id);
        $job = $job->Update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'employer_id' => $request->employer_id,
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

    public function form($id) {
        $job = Job::findOrfail($id);
        return view('admin.job.cvform', compact('job'));
    }

    //Accept Application
    public function acceptApplication(Request $request, $id) {
        $application = Application::find($id);
        $application->update([
            'accept'=>1,
        ]);

        $message = Message::where('application_id', $application->id)->first();
            if($message){
                $message->update([
                    'job_id' => $request->job_id,
                    'employer_id' => $request->employer_id,
                    'employee_id' => $request->employee_id,
                    'application_id' => $application->id,
                    'accept' => $application->accept,
                    'message' => $request->message,
                ]);
            }
            else{
                 Message::create([
                    'job_id' => $request->job_id,
                    'employer_id' => $request->employer_id,
                    'employee_id' => $request->employee_id,
                    'application_id' => $application->id,
                    'accept' => $application->accept,
                    'message' => $request->message,
                ]);
            }
        return back()->with('success','You have sent the letter');
    }

    //Reject Application
    public function rejectApplication(Request $request, $id) {
        $application = Application::findOrfail($id);
        $application->update([
            'accept'=>0,
        ]);

        $message = Message::where('application_id', $application->id)->first();
        if($message){
            $message->update([
                'job_id' => $request->job_id,
                'employer_id' => $request->employer_id,
                'employee_id' => $request->employee_id,
                'application_id' => $application->id,
                'accept' => $request->accept,
                'message' => 'Sorry!',
            ]);
        }
        Message::create([
            'job_id' => $request->job_id,
            'employer_id' => $request->employer_id,
            'employee_id' => $request->employee_id,
            'application_id' => $application->id,
            'accept' => $request->accept,
            'message' => 'Sorry!',
        ]);
        return back()->with('success','Reject successful');

    }
}
