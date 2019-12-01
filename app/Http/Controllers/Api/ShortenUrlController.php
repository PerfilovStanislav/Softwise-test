<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UrlShorterRequest;
use App\Services\ShortenUrlService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;

class ShortenUrlController extends Controller
{
    protected $shortenUrlService;

    public function __construct(ShortenUrlService $shortenUrlService)
    {
        $this->shortenUrlService = $shortenUrlService;
    }

    /**
     * Укорачиваем ссылки
     * @param UrlShorterRequest $request
     * @return array
     */
    public function short(UrlShorterRequest $request)
    {
        $shortUrl = $this->shortenUrlService->generateShortUrl($request->url);
        return ['shortUrl' => URL::to('/' . $shortUrl)];
    }
}
