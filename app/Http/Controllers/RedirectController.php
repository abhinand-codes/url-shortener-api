<?php

namespace App\Http\Controllers;

use App\Repositories\ShortUrlRepository;
use Illuminate\Http\RedirectResponse;

class RedirectController extends Controller
{
    protected ShortUrlRepository $repository;

    public function __construct(ShortUrlRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $code): RedirectResponse
    {
        $shortUrl = $this->repository->findByCode($code);

        if (!$shortUrl) {
            abort(404);
        }

        $shortUrl->increment('clicks');

        return redirect()->away($shortUrl->original_url, 301);
    }
}
