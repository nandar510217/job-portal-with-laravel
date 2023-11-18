<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function payment(){
        return view('admin.payment.index');
    }

    public function paymentStore(Request $request){

        $request ->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $image = $request->image;
        $imageName = uniqid(). '_'. $image->getClientOriginalName();
        $image->storeAs('public/Payment-images', $imageName);

        Payment::create([
            'employer_id' => $request->employer_id,
            'image' => $imageName
        ]);

        return redirect()->route('payment');
    }

    public function userList(){
        $users =User::where('role','employer')->orwhere('role','admin')->get();
        return view('admin.user.index', compact('users')); //userlist
    }

    public function paymentInfo($id){
        $payment = Payment::where('employer_id',$id)->first();
        $user = User::find($id);
        return view('admin.payment.payment-info', compact('user', 'payment'));
    }

    public function paymentConfirm(Request $request, $employerId){
        $user = User::findOrfail($employerId);
        $user->update([
            'active' => 1,
        ]);
        return back();
    }
}
