<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class RequestStatController extends Controller
{
    public function stats()
    {
        return $this->redisResponse('api-total-requests');
    }

    public function myStats()
    {
        return $this->redisResponse('api:users:' . auth()->id());
    }

    private function redisResponse($key)
    {
        return responder()->success([
            'amount' => app('redis')->get(config()->get('database.redis.options.prefix') . $key) ?? 0
        ])->respond();
    }
}
