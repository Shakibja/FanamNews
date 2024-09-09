<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\PostNews;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() 
    {
        $admin = Auth::guard('admin')->user();
        $user = Auth::guard('web')->user();
        $total_news = PostNews::count();
        $total_published_news = PostNews::where('news_status', '1')->count();
        $total_draft_news = PostNews::where('news_status', '0')->count();
        return view('backend.dashboard', compact("admin","total_news","total_published_news","total_draft_news","user"));
    }
}
