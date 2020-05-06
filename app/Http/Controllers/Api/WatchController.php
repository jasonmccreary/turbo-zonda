<?php

namespace App\Http\Controllers\Api;

use App\Watch;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WatchStoreRequest;
use Illuminate\Support\Facades\Response;

class WatchController extends Controller
{
    /**
     * @param \App\Http\Requests\Api\WatchStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WatchStoreRequest $request)
    {
        $watch = Watch::create(\Request::all());

        return response()->noContent(204);
    }
}
