<?php

namespace App\Activity\Repository;

interface ActivityRepositoryContract
{
    public function touch(string $url): void;

    /**
     * @param  int  $page
     * @param  int|null  $perpage
     *
     * @return array{"current_page": int, "total": int, "perpage": int, "items": array{"url": string, "ctr": int, "last_date": string}}
     */
    public function get(int $page, ?int $perpage): array;
}