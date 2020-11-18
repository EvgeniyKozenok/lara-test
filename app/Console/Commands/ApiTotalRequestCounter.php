<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ApiTotalRequestCounter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api-request:counter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $redis = $redis = app('redis');
        $keys = $redis->keys('api:users:*');
        $total = 0;
        foreach ($keys as $key) {
            $total += $redis->get($key);
        }
        $redis->set(config()->get('database.redis.options.prefix') . 'api-total-requests', $total);
        return $total;
    }
}
