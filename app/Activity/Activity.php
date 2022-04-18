<?php

namespace App\Activity;

use App\Activity\Repository\ActivityRepositoryContract;

class Activity
{
    private ActivityRepositoryContract $activityRepository;

    public function __construct(ActivityRepositoryContract $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function touch(string $url): void
    {
        $this->activityRepository->touch($url);
    }

    /**
     * @param  int  $page
     * @param  int|null  $perpage
     *
     * @return array{"current_page": int, "total": int, "perpage": int, "items": array{"url": string, "ctr": int}}
     */
    public function get(int $page, ?int $perpage = 20): array
    {
        return $this->activityRepository->get($page, $perpage);
    }
}