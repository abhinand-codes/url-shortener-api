<?php

namespace App\Repositories;

use App\Models\ShortUrl;

class ShortUrlRepository
{
    public function create(string $originalUrl): ShortUrl
    {
        return ShortUrl::create([
            'original_url' => $originalUrl,
        ]);
    }

    public function findByCode(string $code): ?ShortUrl
    {
        return ShortUrl::where('code', $code)->first();
    }

    public function findByCodeOrFail(string $code): ShortUrl
    {
        return ShortUrl::where('code', $code)->firstOrFail();
    }

    public function updateOriginalUrl(string $code, string $originalUrl): ShortUrl
    {
        $shortUrl = $this->findByCodeOrFail($code);
        $shortUrl->update(['original_url' => $originalUrl]);
        return $shortUrl;
    }

    public function deleteByCode(string $code): void
    {
        $shortUrl = $this->findByCodeOrFail($code);
        $shortUrl->delete();
    }

}
