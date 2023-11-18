<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Job;

class ApplicationController extends Controller
{
    public function application($id) {
        
        $job = Job::findOrfail($id);
        return view('ui-panel.application', compact('job'));
    }

    public function applicationStore(Request $request) {
        $request ->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|numeric|digits:11',
            'address' => 'required',
            'salary' => 'required|numeric',
        ]);
        
        $applications = Application::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => (string) $request->mobile,
            'address' => $request->address, 
            'salary' => $request->salary,
            'job_id' => $request->job_id,
            'employee_id' => $request->employee_id,
        ]);
        
        return redirect()->route('welcome');
    }
}
