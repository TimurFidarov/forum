<?php

namespace App;

use Illuminate\Support\Facades\Redis;

class Visits
{

    public function __construct($thread)
    {
        $this->thread = $thread;
    }

    public function record()
    {
        Redis::incr($this->cacheKey());

        return $this->thread;
    }


    public function reset()
    {
        Redis::del($this->cacheKey());

        return $this->thread;
    }

    public function count()
    {
        return Redis::get($this->cacheKey()) ?? 0;
    }

    public function cacheKey()
    {
        return "threads.{$this->thread->id}.visits";
    }

}
