<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Advertise;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class AdvertiseController extends Controller
{
    public function index() 
    {
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        $advertise = Advertise::orderBy('id_advertise', 'asc')->get();
        return view('backend.pages.advertise.index', compact("advertise","admin","user"));
    }

    public function store(Request $request)
    {
        $advr = new Advertise();
        $advr->type = $request->type;
        $advr->redirect_url = $request->redirect_url;
        $advr->size = $request->size;
        $advr->status = $request->status;

        // if (!empty($request->file('adimage'))) {
        //     $image = $request->file('adimage');
        //     $imageName = rand(1000,9999) . '.' . $image->extension();
        //     $image->move(public_path('backend/images/advertise/'), $imageName);

            
        //     $advr->adimage = $imageName;
        // }

        if ($request->hasFile('adimage')) {
            $image = $request->file('adimage');
            $tempPath = $image->getPathname();
    
            // Get image dimensions
            list($height, $width) = getimagesize($tempPath);
    
            $size = $height . 'x' . $width;
    
            if ($request->size != $size) {
                return back()->with('error', 'Sorry, image size has to be ' . $request->size);
            }
    
            // Move the image to the final location after size validation
            $imageName = rand(1000, 9999) . '.' . $image->extension();
            $imagePath = public_path('backend/images/advertise/');
            $image->move($imagePath, $imageName);
    
            $advr->adimage = $imageName;
        }

        $advr->save();

        return back()->with('advertise_success', 'Added Successfully !');
        
    }


    public function edit($id_advertise)
    {
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        $advertises = Advertise::where('id_advertise', $id_advertise)->first();
        $advertise = Advertise::orderBy('id_advertise', 'asc')->get();
        // dd($category);
        return view('backend.pages.advertise.index', compact('advertises', 'advertise','admin','user'));
    }


    public function update(Request $request, $id_advertise)
    {
        $ad_update = Advertise::where('id_advertise', $id_advertise)->first();
        $image = $ad_update->adimage;
        $ad_update->type = $request->type;
        $ad_update->redirect_url = $request->redirect_url;
        $ad_update->size = $request->size;
        $ad_update->status = $request->status;

        if(!empty($request->file('adimage'))){
            
                $image = $request->file('adimage');
                $tempPath = $image->getPathname();
        
                // Get image dimensions
                list($width, $height) = getimagesize($tempPath);
        
                $size = $width . 'x' . $height;
        
                if ($request->size != $size) {
                    return back()->with('error', 'Sorry, image size has to be ' . $request->size);
                }

                $oldImagePath = 'backend/images/advertise/' . $ad_update->adimage;
                // Delete the old image if it exists
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
        
                // Move the image to the final location after size validation
                $imageName = rand(1000, 9999) . '.' . $image->extension();
                $imagePath = public_path('backend/images/advertise/');
                $image->move($imagePath, $imageName);
                $ad_update->adimage = $imageName;
        }else{
            $ad_update->adimage = $image;
        }

        $ad_update->update();

        return back()->with('up_category_success', 'Updated Successfully !');
    }
}
