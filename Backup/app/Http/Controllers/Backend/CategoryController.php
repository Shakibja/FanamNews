<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function index() 
    {
        $admin = Auth::guard('admin')->user();
        $category = Category::orderBy('priority', 'asc')->get();
        return view('backend.pages.category.index', compact("category","admin"));
    }

    public function store(Request $request)
    {
        $priority = $request->priority;
        // dd($priority);

        // Check if a record with the same priority exists
        $existingRecord = Category::where('priority', $priority)->first();

        if ($existingRecord) {
            // If a record with the same priority exists, return an error
            return response()->json(['error' => 'Priority must be unique'], 422);
        } else {
            // Proceed with the insertion
            $validetData = $request->validate([
                'category_name' => 'required|string|max:255',
                // 'category_slug' => 'required|string',
                'category_status' => 'required|string',
            ]);

            $category = new Category();

            $category->category_name = $validetData['category_name'];
            if($request->get('category_slug') != null){
                $category->category_slug = $request->get('category_slug');
            }else{
                $category->category_slug = Str::slug($validetData['category_name'], '-');
            }
            // dd($category->category_slug);
            $category->category_status = $validetData['category_status'];
            $category->priority = $request->priority;
            $category->save();

            return back()->with('category_success', 'Added Successfully !');
        
          
        }
        
    }

    public function edit($category_slug)
    {
        $admin = Auth::guard('admin')->user();
        $categories = Category::where('category_slug', $category_slug)->first();
        $category = Category::orderBy('priority', 'asc')->get();
        // dd($category);
        return view('backend.pages.category.index', compact('categories', 'category','admin'));
    }

    // Update
    public function update(Request $request, $category_slug){
        $priority = $request->priority;
        // dd($priority);
        // Check if a record with the same priority exists
        $existingRecord = Category::where('priority', $priority)->first();
        // dd($existingRecord);
        if ($existingRecord) {
            // If a record with the same priority exists, return an error
            return response()->json(['error' => 'Priority must be unique'], 422);
        } else {
            // Proceed with the insertion
            $validetData = $request->validate([
                'category_name' => 'required|string|max:255',
                // 'category_slug' => 'required|string',
                'category_status' => 'required|string',
            ]);

            $category = Category::where('category_slug', $category_slug)->first();


            $category->category_name = $validetData['category_name'];
            // $category->category_slug = $validetData['category_slug'];
            $category->category_status = $validetData['category_status'];
            $category->priority = $request->priority;
            $category->update();

            return back()->with('up_category_success', 'Updated Successfully !');
        
          
        }
    }
}
