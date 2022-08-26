<?php

return [

    /**
     * Analytics Dashboard
     *
     * The prefix and middleware for the analytics dashboard.
     */

    'prefix' => 'very-secret-analytics',

    'middleware' => [
        'web',
    ],

    /**
     * Exclude
     *
     * The routes excluded from page view tracking.
     */

    'exclude' => [
        '/very-secret-analytics',
    ],

    'session' => [
        'provider' => \AndreasElia\Analytics\RequestSessionProvider::class,
    ],

];
