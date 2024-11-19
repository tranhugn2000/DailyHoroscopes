<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SeoMeta;
use App\Services\HomepageService;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    protected $homepageService;

    public function __construct(HomepageService $homepageService)
    {
        $this->homepageService = $homepageService;
    }

    public function index() {
        $post = $this->homepageService->getPostToday();

        return view('clients.pages.homepage', compact('post'));

    }
}
