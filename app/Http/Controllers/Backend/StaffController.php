<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Staff;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index() 
    {
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        $staff = Staff::orderBy('id', 'asc')->get();
        return view('backend.pages.staff.index', compact("admin","staff","user"));
    }

    public function store(Request $request)
    {
        $staff = new Staff();
            $staff->name = $request->name;
            $staff->phone_no = $request->phone_no;
            $staff->email = $request->email;
            $staff->password = $request->password;
            $staff->status = $request->status;
            $staff->save();
            return back()->with('category_success', 'Added Successfully !');
    }

    public function edit($id)
    {
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        $staffs = Staff::where('id', $id)->first();
        $staff = Staff::orderBy('id', 'asc')->get();
        // dd($category);
        return view('backend.pages.staff.index', compact('admin', 'staffs','staff','user'));
    }

    public function update(Request $request, $id){
            $staff = Staff::where('id', $id)->first();
            $staff->name = $request->name;
            $staff->phone_no = $request->phone_no;
            $staff->email = $request->email;
            $staff->password = $request->password;
            $staff->status = $request->status;
            $staff->update();
            return back()->with('up_category_success', 'Updated Successfully !');
    }
}
