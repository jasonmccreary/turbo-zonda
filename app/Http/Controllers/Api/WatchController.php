<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WatchStoreRequest;
use App\Watch;

class WatchController extends Controller
{
    /**
     * @param \App\Http\Requests\Api\WatchStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WatchStoreRequest $request)
    {
        $watch = Watch::create(\$request->all());

        return response(null, 204);
    }
}
