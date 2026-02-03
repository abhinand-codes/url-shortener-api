<?php

namespace App\Services;

use App\Helpers\Base62;
use App\Repositories\ShortUrlRepository;
use App\Models\ShortUrl;

class ShortUrlService
{
    protected ShortUrlRepository $repository;

    public function __construct(ShortUrlRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(string $originalUrl): ShortUrl
    {
        $shortUrl = $this->repository->create($originalUrl);

        $shortUrl->code = Base62::encode($shortUrl->id);
        $shortUrl->save();

        return $shortUrl;
    }

    public function getStats(string $code): ShortUrl
    {
        return $this->repository->findByCodeOrFail($code);
    }

    public function update(string $code, string $originalUrl): ShortUrl
    {
        return $this->repository->updateOriginalUrl($code, $originalUrl);
    }

    public function delete(string $code): void
    {
        $this->repository->deleteByCode($code);
    }
}
