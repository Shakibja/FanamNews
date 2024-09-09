<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Backend\PostNews;
use App\Models\Backend\Category;

class SiteMapController extends Controller
{
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
            $url->addChild('loc', url('/' . $item->slug)); // Adjust based on your URL structure
            $url->addChild('lastmod', $item->updated_at->toAtomString());
            $url->addChild('changefreq', 'daily');
            $url->addChild('priority', '0.7');
        }

        // Add categories to the sitemap
        foreach ($categories as $category) {
            $url = $xml->addChild('url');
            $url->addChild('loc', url('/' . $category->category_slug)); // Adjust based on your URL structure
            $url->addChild('lastmod', $category->updated_at->toAtomString());
            $url->addChild('changefreq', 'weekly');
            $url->addChild('priority', '0.5');
        }
        
        return $xml->asXML();
    }
}
