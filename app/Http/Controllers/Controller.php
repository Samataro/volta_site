<?php

namespace App\Http\Controllers;

use App\Activity\Activity;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index($page = "welcome")
    {
        return view("welcome", ['page' => $page]);
    }

    public function activity(Activity $activity, Request $request): View
    {
        $page = $request->input('page') ?? 1;
        $perpage = $request->input('perpage' ?? 40);
        $data = $activity->get($page, $perpage);
        $paginator = (new LengthAwarePaginator($data["items"], $data["total"], $data["perpage"], $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]))->withQueryString();

        return view("activity", ['paginator' => $paginator]);
    }
}
