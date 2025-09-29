<?php


namespace App\Providers;

use App\Listeners\LoginListener;
use Illuminate\Auth\Events\Login;
use App\Listeners\RegisteredListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            RegisteredListener::class,
        ],
        Login::class => [
            LoginListener::class,
        ],
    ];
}
