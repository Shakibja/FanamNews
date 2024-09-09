<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\FrontendSeo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class SeoController extends Controller
{
    public function index() 
    {
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        $news_category = Category::where("category_status", 1)->get();
        return view('backend.pages.seo.index',compact('news_category','admin','user'));
    }
    

    public function store(Request $request)
    {
        $seo_store = new FrontendSeo();

        if (!empty($request->file('meta_image'))) {
            $image = $request->file('meta_image');
            $imageName = rand(1000,9999) . '.' . $image->extension();
            $image->move(public_path('backend/images/seo-images/'), $imageName);

            
            $seo_store->meta_image = $imageName;
        }
        $seo_store->meta_keywords = $request->meta_keywords;
        $seo_store->meta_desc = $request->meta_desc;
        $seo_store->social_title = $request->social_title;
        $seo_store->social_desc = $request->social_desc;

        $seo_store->save();
        return back()->with('seo_success', 'Added Successfully !');

        
    }

    // View Page
    public function view(){
        // $post_news_datas = PostNews::orderBy('news_id', 'desc')->paginate(100);
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        $seo_datas = FrontendSeo::orderBy('id', 'desc')->get();
        return view('backend.pages.seo.manage', compact('seo_datas','admin','user'));
    }

    // Edit Page
    public function edit($id){
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        $seo_datas = FrontendSeo::where('id', $id)->first();
        return view('backend.pages.seo.index', compact('seo_datas','admin','user'));
    }

    // Update News
    public function update(Request $request, $id){
        $seo_update = FrontendSeo::where('id', $id)->first();

        if (!empty($request->file('meta_image'))) {
            if(File::exists('backend/images/seo-images/'.$seo_update->meta_image)){
                File::delete('backend/images/seo-images/'.$seo_update->meta_image);
            }
            $image = $request->file('meta_image');
            $imageName = rand(1000,9999) . '.' . $image->extension();
            $image->move(public_path('backend/images/seo-images/'), $imageName);

            
            $seo_update->meta_image = $imageName;
        }
        $seo_update->meta_keywords = $request->meta_keywords;
        $seo_update->meta_desc = $request->meta_desc;
        $seo_update->social_title = $request->social_title;
        $seo_update->social_desc = $request->social_desc;
        $seo_update->update();
        return back()->with('seo_success', 'Update Successfully !');


    }

}
