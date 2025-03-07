<!-- Primary Meta Tags -->
<title>{{ $title }}</title>
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
@if($keywords)
    <meta name="keywords" content="{{ $keywords }}">
@endif
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="{{ config('seo.site_name') }}">
<link rel="canonical" href="{{ $url }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ url($image) }}">
@if(config('seo.facebook_app_id'))
    <meta property="fb:app_id" content="{{ config('seo.facebook_app_id') }}">
@endif

<!-- Twitter -->
<meta property="twitter:card" content="{{ config('seo.twitter_card') }}">
<meta property="twitter:url" content="{{ $url }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ url($image) }}">
@if(config('seo.twitter_creator'))
    <meta property="twitter:creator" content="{{ config('seo.twitter_creator') }}">
@endif
@if(config('seo.twitter_site'))
    <meta property="twitter:site" content="{{ config('seo.twitter_site') }}">
@endif
