<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Backend\PostNews;
use App\Models\Backend\Category;
use App\Models\Backend\Advertise;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
   public function index()
   {
      $categories_1 = Category::where('category_status', 1)->orderBy('priority', 'asc')->take(10)->get();
      $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(10)->take(13)->get();
      $lead_news = PostNews::where('news_status', 1)->orderBy('id_news', 'desc')->first();
      $second_lead = PostNews::where('news_status', 1)->orderBy('id_news', 'desc')->skip(1)->take(4)->get();
      $national = PostNews::where('news_status', 1)->where('category_slug', 'national')->orderBy('id_news', 'desc')->take(6)->get();
      $editorial_1 = PostNews::where('news_status', 1)->where('category_slug', 'editorial')->orderBy('id_news', 'desc')->first();
      $editorial_2 = PostNews::where('news_status', 1)->where('category_slug', 'editorial')->orderBy('id_news', 'desc')->skip(1)->take(6)->get();
      $tott_1 = PostNews::where('news_status', 1)->where('tot_status', 1)->orderBy('id_news', 'desc')->first();
      $tott_2 = PostNews::where('news_status', 1)->where('tot_status', 1)->orderBy('id_news', 'desc')->skip(1)->take(3)->get();
      $latest = PostNews::where('news_status', 1)->orderBy('id_news', 'desc')->take(10)->get();
      $politics_1 = PostNews::where('news_status', 1)->where('category_slug', 'politics')->orderBy('id_news', 'desc')->first();
      $politics_2 = PostNews::where('news_status', 1)->where('category_slug', 'politics')->orderBy('id_news', 'desc')->skip(1)->take(3)->get();
      $law_1 = PostNews::where('news_status', 1)->where('category_slug', 'court-and-law')->orderBy('id_news', 'desc')->first();
      dd($law_1);
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
         ->orderBy('id_news', 'desc')
         ->where('created_at', '>=', $sevenDaysAgo)
         ->take(5)
         ->get();

      $economics_1 = PostNews::where('news_status', 1)->where('category_slug', 'finance-and-trade')->orderBy('id_news', 'desc')->take(3)->get();
      $economics_2 = PostNews::where('news_status', 1)->where('category_slug', 'finance-and-trade')->orderBy('id_news', 'desc')->skip(3)->take(6)->get();

      $technology_1 = PostNews::where('news_status', 1)->where('category_slug', 'technology')->orderBy('id_news', 'desc')->first();
      $technology_2 = PostNews::where('news_status', 1)->where('category_slug', 'technology')->orderBy('id_news', 'desc')->skip(1)->take(3)->get();

      $education_1 = PostNews::where('news_status', 1)->where('category_slug', 'education')->orderBy('id_news', 'desc')->first();
      $education_2 = PostNews::where('news_status', 1)->where('category_slug', 'education')->orderBy('id_news', 'desc')->skip(1)->take(3)->get();
      $banner_show = Advertise::where('type', '1')->first();
      $banner_right = Advertise::where('type', '2')->first();
		// dd($banner_show);

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
         'economics_1',
         'economics_2',
         'technology_1',
         'technology_2',
         'education_1',
         'education_2',
         'banner_show',
         'banner_right'
      ));
   }

   public function latest_news()
   {
      $latestNews = PostNews::where('news_status', 1)->orderBy('id_news', 'desc')->skip(1)->take(16)->get();
      $categories_1 = Category::where('category_status', 1)->orderBy('priority', 'asc')->take(10)->get();
      $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(10)->take(13)->get();
      return view('frontend.pages.latestnews', compact('latestNews', 'categories_1','categories_2'));
   }

   public function newsDetails($slug)
   {
      $categories_1 = Category::where('category_status', 1)->orderBy('priority', 'asc')->take(10)->get();
      $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(10)->take(13)->get();
      $categories = Category::all();
      $category_news = PostNews::all();

      $singleNews = PostNews::where('slug', $slug)->first();
      // Related News
      $relatedNews = PostNews::where('news_status', 1)
         ->where('category_slug', $singleNews->category_slug)
         ->orderBy('id_news', 'desc')
         ->skip(1)
         ->take(4)
         ->get();
      // $banner_show = NewsAds::where('status', 'A')->first();

      // $singleNews->increment('nofn_readers');

      //Latest News
      $latestNews = PostNews::where('news_status', 1)->orderBy('id_news', 'desc')->skip(1)->take(6)->get();
      $details_banner1 = Advertise::where('type', '6')->first();
      $details_banner2 = Advertise::where('type', '7')->first();
      $details_banner3 = Advertise::where('type', '8')->first();
      $details_banner4 = Advertise::where('type', '9')->first();
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
            'details_banner4'
         )
      );
   }

   public function newsCategory($category_slug)
   {
      $categories_1 = Category::where('category_status', 1)->orderBy('priority', 'asc')->take(10)->get();
      $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(10)->take(13)->get();
      $cat_wise_news = PostNews::where('news_status', 1)
         ->where('category_slug', $category_slug)
         ->orderBy('id_news', 'desc')
         ->get();

      $category_name = Category::where('category_status', 1)
         ->where('category_slug', $category_slug)
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

      $category_banner1 = Advertise::where('type', '3')->first();
      $category_banner2 = Advertise::where('type', '4')->first();
      $category_banner3 = Advertise::where('type', '5')->first();

      if ($cat_wise_news->isNotEmpty()) {
         return view('frontend.pages.category_news', compact('cat_wise_news', 'category_name', 'categories_1', 'relatedNews', 'categories2', 'categories_3','category_banner1','category_banner2','category_banner3','categories_2'));
      } else {
         return view('frontend.pages.404', compact( 'category_name', 'categories_1', 'category_banner1','category_banner2','category_banner3','categories_2'));
      }
   }

   public function sitemap()
   {
      $news = PostNews::where('news_status', 1)->orderBy('id_news', 'desc')->get();
      $categories = Category::where('category_status', 1)->orderBy('priority', 'asc')->get();
        
      // Create XML content
      $xmlContent = $this->generateSitemapXml($news, $categories);
        
      return Response::make($xmlContent, 200, ['Content-Type' => 'application/xml']);
   }

   private function generateSitemapXml($news, $categories)
    {
        $xml = new \SimpleXMLElement('<urlset/>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        
        // Add news to the sitemap
        foreach ($news as $item) {
            $url = $xml->addChild('url');
            $url->addChild('loc', url('/newsdetails/' . $item->slug)); // Adjust based on your URL structure
            $url->addChild('lastmod', $item->updated_at->toAtomString());
            $url->addChild('changefreq', 'daily');
            $url->addChild('priority', '0.7');
        }

        // Add categories to the sitemap
        foreach ($categories as $category) {
            $url = $xml->addChild('url');
            $url->addChild('loc', url('/newscategories/' . $category->category_slug)); // Adjust based on your URL structure
            $url->addChild('lastmod', $category->updated_at->toAtomString());
            $url->addChild('changefreq', 'weekly');
            $url->addChild('priority', '0.5');
        }
        
        return $xml->asXML();
    }
}
