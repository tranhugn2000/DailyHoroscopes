<?php

namespace App\Services;

use App\Models\HoroscopePost;
use App\Models\SeoMeta;

class HomepageService
{
    function __construct()
    {
    }

    public function getPostToday() {
        $post_today = SeoMeta::orderBy('created_at', 'desc')->first();
        $content_post_today = HoroscopePost::where('seo_meta_id', $post_today->id)->get();
        return [
            'post_today' => $post_today,
            'content_post_today' => $content_post_today
        ];
    }
}
