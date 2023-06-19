<?php

namespace App\Providers;

use App\Events\TacheUpdated;
use CreateTachehistoryTable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
            TacheUpdated::class => [
                CreateTachehistoryTable::class,
            ]
    ];

    public function boot()
    {
        
    }
}
