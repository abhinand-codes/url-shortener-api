<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShortUrlRequest;
use App\Services\ShortUrlService;
use Illuminate\Http\JsonResponse;

class ShortUrlController extends Controller
{
    protected ShortUrlService $service;

    public function __construct(ShortUrlService $service)
    {
        $this->service = $service;
    }

    public function store(StoreShortUrlRequest $request): JsonResponse
    {
        $shortUrl = $this->service->create(
            $request->validated()['original_url']
        );

        return response()->json([
            'code' => $shortUrl->code,
            'original_url' => $shortUrl->original_url,
            'short_url' => url($shortUrl->code),
        ], 201);
    }
}
