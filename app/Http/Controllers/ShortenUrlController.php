<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShorterRequest;
use App\Services\ShortenUrlService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class ShortenUrlController extends Controller
{
    protected $shortenUrlService;

    public function __construct(ShortenUrlService $shortenUrlService)
    {
        $this->shortenUrlService = $shortenUrlService;
    }

    public function redirect(string $shortUrl)
    {
        $url = $this->shortenUrlService->getFullUrl($shortUrl);
        return Redirect::away($url);
    }
}
