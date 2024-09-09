<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Backend\PostNews;
use App\Models\Backend\Category;
use App\Models\Backend\Advertise;
use App\Models\Backend\SocialLink;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
   public function index()
   {
      $categories_1 = Category::where('category_status', 1)->orderBy('priority', 'asc')->take(10)->get();
      $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(10)->take(11)->get();
      $lead_news = PostNews::where('news_status', 1)->where('lead_news_status', '1')->orderBy('id_news', 'desc')->first();
      $second_lead = PostNews::where('news_status', 1)->where('lead_news_status', '1')->orderBy('id_news', 'desc')->skip(1)->take(6)->get();
      // $national = PostNews::where('news_status', 1)->where('category_slug', 'national')->orderBy('id_news', 'desc')->take(6)->get();
      $national = PostNews::where('news_status', 1)->whereDate('created_at', Carbon::today())->orderBy('id_news', 'desc')->take(6)->get();
      $editorial_1 = PostNews::where('news_status', 1)->where('category_slug', 'editorial')->orderBy('id_news', 'desc')->first();
      $editorial_2 = PostNews::where('news_status', 1)->where('category_slug', 'editorial')->orderBy('id_news', 'desc')->skip(1)->take(6)->get();
      $tott_1 = PostNews::where('news_status', 1)->where('tot_status', 1)->orderBy('id_news', 'desc')->first();
      $tott_2 = PostNews::where('news_status', 1)->where('tot_status', 1)->orderBy('id_news', 'desc')->skip(1)->take(3)->get();
      $latest = PostNews::where('news_status', 1)->orderBy('id_news', 'desc')->take(10)->get();
      $politics_1 = PostNews::where('news_status', 1)->where('category_slug', 'govt')->orderBy('id_news', 'desc')->first();
      $politics_2 = PostNews::where('news_status', 1)->where('category_slug', 'govt')->orderBy('id_news', 'desc')->skip(1)->take(3)->get();
      $law_1 = PostNews::where('news_status', 1)->where('category_slug', 'court-and-law')->orderBy('id_news', 'desc')->first();
      $law_2 = PostNews::where('news_status', 1)->where('category_slug', 'court-and-law')->orderBy('id_news', 'desc')->skip(1)->take(3)->get();
      $total_country = PostNews::where('news_status', 1)->where('category_slug', 'total-country')->orderBy('id_news', 'desc')->take(3)->get();
      $ban_abroad = PostNews::where('news_status', 1)->where('category_slug', 'bengali-immigration')->orderBy('id_news', 'desc')->take(6)->get();
      $sports_1 = PostNews::where('news_status', 1)->where('category_slug', 'sports')->orderBy('id_news', 'desc')->first();
      $sports_2 = PostNews::where('news_status', 1)->where('category_slug', 'sports')->orderBy('id_news', 'desc')->skip(1)->take(6)->get();
      $international_1 = PostNews::where('news_status', 1)->where('category_slug', 'international')->orderBy('id_news', 'desc')->first();
      $international_2 = PostNews::where('news_status', 1)->where('category_slug', 'international')->orderBy('id_news', 'desc')->skip(7)->take(2)->get();
      $international_3 = PostNews::where('news_status', 1)->where('category_slug', 'international')->orderBy('id_news', 'desc')->skip(1)->take(6)->get();
      $sevenDaysAgo = Carbon::now()->subDays(7);
      // $most_readed = PostNews::where('news_status', 1)
      // 	->orderBy('id_news', 'desc')
      // 	->where('created_at', '>=', $sevenDaysAgo)
      // 	->orderBy('nofn_readers', 'desc')
      // 	->take(5)
      // 	->get()
      // ;
      $most_readed = PostNews::where('news_status', 1)
         ->orderBy('nofn_readers', 'desc')
         ->where('created_at', '>=', $sevenDaysAgo)
         ->take(5)
         ->get();

      $breaking_news = PostNews::where('breaking_news', 1)
         ->orderBy('id_news', 'desc')
         ->take(10)
         ->get();

      $economics_1 = PostNews::where('news_status', 1)->where('category_slug', 'finance-and-trade')->orderBy('id_news', 'desc')->take(3)->get();
      $economics_2 = PostNews::where('news_status', 1)->where('category_slug', 'finance-and-trade')->orderBy('id_news', 'desc')->skip(3)->take(6)->get();

      $technology_1 = PostNews::where('news_status', 1)->where('category_slug', 'technology')->orderBy('id_news', 'desc')->first();
      $technology_2 = PostNews::where('news_status', 1)->where('category_slug', 'technology')->orderBy('id_news', 'desc')->skip(1)->take(3)->get();

      $education_1 = PostNews::where('news_status', 1)->where('category_slug', 'education')->orderBy('id_news', 'desc')->first();
      $education_2 = PostNews::where('news_status', 1)->where('category_slug', 'education')->orderBy('id_news', 'desc')->skip(1)->take(3)->get();
      $banner_show = Advertise::where('type', '1')->first();
      $banner_right = Advertise::where('type', '2')->first();
      $footer_icon = SocialLink::where('social_status', 1)->orderBy('id', 'asc')->take(10)->get();
		// dd($footer_icon);

      return view('frontend.pages.home', compact(
         'categories_1',
         'categories_2',
         'lead_news',
         'second_lead',
         'national',
         'editorial_1',
         'editorial_2',
         'tott_1',
         'tott_2',
         'latest',
         'politics_1',
         'politics_2',
         'law_1',
         'law_2',
         'total_country',
         'ban_abroad',
         'sports_1',
         'sports_2',
         'international_1',
         'international_2',
         'international_3',
         'most_readed',
         'breaking_news',
         'economics_1',
         'economics_2',
         'technology_1',
         'technology_2',
         'education_1',
         'education_2',
         'banner_show',
         'banner_right',
         'footer_icon'
      ));
   }

   public function latest_news()
   {
      $latestNews = PostNews::where('news_status', 1)->where('tot_status', 1)->orderBy('id_news', 'desc')->take(10)->get();
      $categories_1 = Category::where('category_status', 1)->orderBy('priority', 'asc')->take(10)->get();
      $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(10)->take(11)->get();
      $footer_icon = SocialLink::where('social_status', 1)->orderBy('id', 'asc')->take(10)->get();
      $breaking_news = PostNews::where('breaking_news', 1)
         ->orderBy('id_news', 'desc')
         ->take(10)
         ->get();
      return view('frontend.pages.latestnews', compact('latestNews', 'categories_1','categories_2','footer_icon','breaking_news'));
   }


   public function today_news()
   {
      $todayNews = PostNews::where('news_status', 1)
      ->whereDate('created_at', Carbon::today())
      ->orderBy('id_news', 'desc')
      ->take(10)
      ->get();
      $categories_1 = Category::where('category_status', 1)->orderBy('priority', 'asc')->take(10)->get();
      $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(10)->take(11)->get();
      $footer_icon = SocialLink::where('social_status', 1)->orderBy('id', 'asc')->take(10)->get();
      $breaking_news = PostNews::where('breaking_news', 1)
         ->orderBy('id_news', 'desc')
         ->take(10)
         ->get();
      return view('frontend.pages.todaynews', compact('todayNews', 'categories_1','categories_2','footer_icon','breaking_news'));
   }

   public function converter()
   {
      
      return view('frontend.pages.converter');
   }

   public function newsDetails($slug)
   {
      $singleNews = PostNews::where('slug', $slug)->first();
      if($singleNews){
         $categories_1 = Category::where('category_status', 1)->orderBy('priority', 'asc')->take(10)->get();
         $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(10)->take(13)->get();
         $categories = Category::all();
         $category_news = PostNews::all();

         
         // Related News
         $relatedNews = PostNews::where('news_status', 1)
            ->where('category_slug', $singleNews->category_slug)
            ->orderBy('id_news', 'desc')
            ->skip(1)
            ->take(4)
            ->get();

            $breaking_news = PostNews::where('breaking_news', 1)
               ->orderBy('id_news', 'desc')
               ->take(10)
               ->get();
         // $banner_show = NewsAds::where('status', 'A')->first();

         $singleNews->increment('nofn_readers');

         //Latest News
         $latestNews = PostNews::where('news_status', 1)->orderBy('id_news', 'desc')->skip(1)->take(6)->get();
         $details_banner1 = Advertise::where('type', '6')->first();
         $details_banner2 = Advertise::where('type', '7')->first();
         $details_banner3 = Advertise::where('type', '8')->first();
         $details_banner4 = Advertise::where('type', '9')->first();
         $footer_icon = SocialLink::where('social_status', 1)->orderBy('id', 'asc')->take(10)->get();
         return view(
            'frontend.pages.news-details',
            compact(
               'categories_1',
               'categories_2',
               'categories',
               // 'breakingNews',
               'category_news',
               'singleNews',
               'latestNews',
               'relatedNews',
               'details_banner1',
               'details_banner2',
               'details_banner3',
               'details_banner4',
               'footer_icon',
               'breaking_news'
               )
            );
         }

         $cat_wise_news = PostNews::where('news_status', 1)
         ->where('category_slug', $slug)
         ->orderBy('id_news', 'desc')
         ->get();
         
         if($cat_wise_news){
            $categories_1 = Category::where('category_status', 1)->orderBy('priority', 'asc')->take(10)->get();
            $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(10)->take(13)->get();
            

            $category_name = Category::where('category_status', 1)
               ->where('category_slug', $slug)
               ->first();

            $relatedNews = PostNews::where('news_status', 1)
               ->where('category_slug', $category_name->category_slug)
               ->orderBy('id_news', 'desc')
               ->first();

            $categories2 = PostNews::where('news_status', 1)
               ->where('category_slug', $category_name->category_slug)
               ->orderBy('id_news', 'desc')
               ->skip(1)
               ->take(4)
               ->get();

            $categories_3 = PostNews::where('news_status', 1)
               ->where('category_slug', $category_name->category_slug)
               ->orderBy('id_news', 'desc')
               ->skip(5)
               ->paginate(12);

               $breaking_news = PostNews::where('breaking_news', 1)
               ->orderBy('id_news', 'desc')
               ->take(10)
               ->get();

            $category_banner1 = Advertise::where('type', '3')->first();
            $category_banner2 = Advertise::where('type', '4')->first();
            $category_banner3 = Advertise::where('type', '5')->first();
            $footer_icon = SocialLink::where('social_status', 1)->orderBy('id', 'asc')->take(10)->get();
            

            if ($cat_wise_news->isNotEmpty()) {
               return view('frontend.pages.category_news', compact('cat_wise_news', 'category_name', 'categories_1', 'relatedNews', 'categories2', 'categories_3','category_banner1','category_banner2','category_banner3','categories_2','footer_icon','breaking_news'));
            } else {
               return view('frontend.pages.404', compact( 'category_name', 'categories_1', 'category_banner1','category_banner2','category_banner3','categories_2','footer_icon','breaking_news'));
            }
         }
      
   }

   // public function newsCategory($category_slug)
   // {
   //    // dd($category_slug);
      
   // }

   
}
