<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\PostNews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PostNewsController extends Controller
{
    public function index() 
    {
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        if ($user && $user->status == 1) {
            $users = User::where('status', 1)->get();
        } else {
            $users = collect();
        }
        $news_category = Category::where("category_status", 1)->get();
        return view('backend.pages.postnews.index',compact('news_category','admin','user','users'));
    }

    public function store(Request $request)
    {
        $post_news = new PostNews();
        $post_news->news_headline = $request->news_headline;
        $post_news->news_shoulder = $request->news_shoulder;
        $post_news->news_keywords = $request->news_keywords;
        $post_news->news_highlights = $request->news_highlights;
        $post_news->news_body = $request->news_body;
        $post_news->category_slug = $request->category_slug;
        $post_news->title_image_courtecy = $request->title_image_courtecy;
        $post_news->news_status = $request->news_status;
        $post_news->meta_description = $request->meta_description;
        $post_news->author_name = $request->author_name;
        if (!empty($request->file('news_title_image'))) {
            $image = $request->file('news_title_image');
            $imageName = rand(1000,9999) . '.' . $image->extension();
            $image->move(public_path('backend/images/news-himages/'), $imageName);

            
            $post_news->news_title_image = $imageName;
        }

        if($request->elected_status){
            $post_news->elected_status = $request->elected_status;
        }
        if($request->tot_status){
            $post_news->tot_status = $request->tot_status;
        }
        if($request->lead_news_status){
            $post_news->lead_news_status = $request->lead_news_status;
        }
        // $post_news->slug = $request->category_slug.'/news-'.$request->news_id;
        $post_news->slug = Str::slug($request->input('news_headline'));
        $post_news->save();
        return back()->with('add_news_success', 'Added Successfully !');

        
    }

    // View Page
    public function view(){
        // $post_news_datas = PostNews::orderBy('news_id', 'desc')->paginate(100);
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        $post_news_datas = PostNews::orderBy('id_news', 'desc')->get();
        return view('backend.pages.postnews.manage', compact('post_news_datas','admin','user'));
    }


    // Edit Page
    public function edit($slug){
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        if ($user && $user->status == 1) {
            $users = User::where('status', 1)->get();
        } else {
            $users = collect();
        }
        $post_news_data = PostNews::where('slug', $slug)->first();
        $news_category = Category::where("category_status", 1)->get();
        return view('backend.pages.postnews.index', compact('post_news_data', 'news_category','admin','user','users'));
    }

    // Update News
    public function update(Request $request, $slug){
        $post_news = PostNews::where('slug', $slug)->first();
        $post_news->news_headline = $request->news_headline;
        $post_news->news_shoulder = $request->news_shoulder;
        $post_news->news_keywords = $request->news_keywords;
        $post_news->news_highlights = $request->news_highlights;
        $post_news->news_body = $request->news_body;
        $post_news->category_slug = $request->category_slug;
        $post_news->title_image_courtecy = $request->title_image_courtecy;
        $post_news->news_status = $request->news_status;
        $post_news->meta_description = $request->meta_description;
        $post_news->author_name = $request->author_name;
        if (!empty($request->file('news_title_image'))) {
            if(File::exists('backend/images/news-himages/'.$post_news->news_title_image)){
                File::delete('backend/images/news-himages/'.$post_news->news_title_image);
            }
            $image = $request->file('news_title_image');
            $imageName = rand(1000,9999) . '.' . $image->extension();
            $image->move(public_path('backend/images/news-himages/'), $imageName);

            
            $post_news->news_title_image = $imageName;
        }


        if($request->elected_status){
            $post_news->elected_status = $request->elected_status;
        }
        if($request->tot_status){
            $post_news->tot_status = $request->tot_status;
        }
        if($request->lead_news_status){
            $post_news->lead_news_status = $request->lead_news_status;
        }
        // $post_news->slug = $request->category_slug.'/news-'.$request->news_id;
        $post_news->slug = Str::slug($request->input('news_headline'));

        $post_news->update();
        return back()->with('add_news_success', 'Update Successfully !');


    }

}
