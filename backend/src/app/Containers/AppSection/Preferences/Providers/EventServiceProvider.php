<?php

namespace App\Containers\AppSection\Preferences\Providers;

use App\Containers\AppSection\Preferences\Observers\UserObserver;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Providers\EventServiceProvider as ParentEventServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class EventServiceProvider extends ParentEventServiceProvider
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;

    /**
     * The event listener mappings for the container.
     *
     * @var array
     */
    protected $listen = [
        // OrderShipped::class => [
        //     SendShipmentNotification::class,
        // ],
    ];

    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [
        User::class => [UserObserver::class],
    ];
}
