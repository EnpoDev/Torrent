<?php

namespace App\Models;

use App\Observers\HeaderLinkObserver;
use Illuminate\Database\Eloquent\Model;

class HeaderLink extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::observe(HeaderLinkObserver::class);
    }
}
