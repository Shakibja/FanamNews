@if($details_news)
<title>{{$details_news->news_headline }}</title>
<meta name="title" content="{{$details_news->news_headline }}">
<meta name="description" content="{{ $details_news->meta_description}}">
<meta name="keywords" content="{{ $details_news->news_keywords}}">
<meta name="author" content="{{ $details_news->author_name }}">
<meta name="news_keywords" content="{{ $details_news->news_keywords }}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{$details_news->news_headline}}">
<meta property="og:description" content="{{ $details_news->meta_description}}">
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="{{$details_news->news_headline }}">
<meta property="twitter:description" content="{{$details_news->meta_description }}">
<meta property="twitter:image" content="{{ url('public/backend/images/news-himages/'.$details_news->news_title_image) }}">
<meta property="og:image" content="{{ url('public/backend/images/news-himages/'.$details_news->news_title_image) }}">
<link rel="canonical" href="{{url('/')}}">
@php
// Define the relative path to the image
$relativePath = 'backend/assets/images/main_logo.png';

// Convert relative path to absolute path
$absolutePath = public_path($relativePath);

// Initialize default values
$imageWidth = 'default_width'; // Fallback width if image does not exist
$imageHeight = 'default_height'; // Fallback height if image does not exist

// Check if the file exists and get its dimensions
if (file_exists($absolutePath)) {
    $imageSize = getimagesize($absolutePath);
    if ($imageSize) {
        $imageWidth = $imageSize[0]; // Width in pixels
        $imageHeight = $imageSize[1]; // Height in pixels
    }
}
@endphp

<meta property="og:image:width" content="{{ $imageWidth }}" />
<meta property="og:image:height" content="{{ $imageHeight }}" />
<meta property="og:url" content="{{ url()->current() }}">
<meta name="twitter:domain" content="{{url('/')}}">
<meta property="fb:app_id" content="">
<meta name="brand_name" content="Fanam News">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta property="fb:pages" content="">
<meta property="og:site_name" content="FanamNews">
<meta name="twitter:site" content="">
<meta name="apple-mobile-web-app-title" content="Fanam News">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "headline": "{{$details_news->news_headline}}",
  "image": [
    "{{ url('public/backend/images/news-himages/'.$details_news->news_title_image) }}"
  ],
  "datePublished": "{{ $details_news->created_at->toIso8601String() }}",
  "dateModified": "{{ $details_news->updated_at->toIso8601String() }}",
  "author": {
    "@type": "Person",
    "name": "{{ $details_news->author_name }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('app.name') }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ url()->current() }}"
    }
  },
  "description": "{{ $details_news->news_highlights }}",
  "articleBody": "{{ $details_news->news_body }}"
}
</script>
@else

@if($seo_cat)
<title>{{$seo_cat->category_name}}</title>
@else
<title>{{ $SiteSetting->site_title }}</title>
@endif

<meta name="title" content="Fanam News">
<meta name="description" content="{{ $seo->meta_desc }}">
<meta name="keywords" content="{{ $seo->meta_keywords }}">
<meta property="og:type" content="website">
<meta property="og:title" content="Fanam News">
<meta property="og:description" content="{{ $seo->meta_desc }}">
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="Fanam News">
<meta property="twitter:description" content="{{ $seo->meta_desc }}">
<meta property="twitter:image" content="{{url('public')}}/backend/assets/images/main_logo.png">
<meta property="og:image" content="{{url('public')}}/backend/assets/images/main_logo.png">
<link rel="canonical" href="{{url('/')}}">

@php
// Define the relative path to the image
$relativePath = 'backend/assets/images/main_logo.png';

// Convert relative path to absolute path
$absolutePath = public_path($relativePath);

// Initialize default values
$imageWidth = 'default_width'; // Fallback width if image does not exist
$imageHeight = 'default_height'; // Fallback height if image does not exist

// Check if the file exists and get its dimensions
if (file_exists($absolutePath)) {
    $imageSize = getimagesize($absolutePath);
    if ($imageSize) {
        $imageWidth = $imageSize[0]; // Width in pixels
        $imageHeight = $imageSize[1]; // Height in pixels
    }
}
@endphp

<meta property="og:image:width" content="{{ $imageWidth }}" />
<meta property="og:image:height" content="{{ $imageHeight }}" />
<meta property="og:url" content="{{ url()->current() }}">
<meta name="twitter:domain" content="{{url('/')}}">
<meta property="fb:app_id" content="">
<meta name="brand_name" content="Fanam News">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta property="fb:pages" content="">
<meta property="og:site_name" content="FanamNews">
<meta name="twitter:site" content="">
<meta name="apple-mobile-web-app-title" content="Fanam News">

<script type="application/ld+json" data-schema="Organization">
    {
        "@context":"http://schema.org",
        "@type":"Organization",
        "name":"Fanam News",
        "alternateName":"Fanam News",
        "foundingDate":"2024-01-01",
        "url":"{{ url()->current() }}",
        "logo":{"@type":"ImageObject","url":"{{url('public')}}/backend/assets/images/main_logo.png"},"image":"{{url('public')}}/backend/assets/images/main_logo.png",
        "description":"{{ $seo->meta_desc }}"
    }
</script>

<script type="application/ld+json" data-schema="Organization">
    {
        "@type":"Website",
        "url":"{{ url()->current() }}",
        "name":"Fanam News",
        "headline":"Fanam News",
        "keywords":"{{ $seo->meta_keywords }}",
        "copyrightHolder":{"@type":"NewsMediaOrganization","name":"Fanam News"},
        "mainEntityOfPage":{"@type":"WebPage","@id":"{{ url()->current() }}"},
        "@context":"http://schema.org"
    }
</script>



@endif

