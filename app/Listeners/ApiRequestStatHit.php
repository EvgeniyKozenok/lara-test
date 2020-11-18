<?php

namespace App\Listeners;

use App\Events\ApiRequestHit;

class ApiRequestStatHit
{
    /**
     * Handle the event.
     *
     * @param  ApiRequestHit  $event
     * @return void
     */
    public function handle(ApiRequestHit $event)
    {
        $dbPrefix = config()->get('database.redis.options.prefix');
        $key = "{$dbPrefix}api:users:" . $event->getUserId();

        $redis = app('redis');
        if (!$redis->exists($key)) {
            $redis->set($key, 0);
        }
        $redis->incr($key);
    }
}
