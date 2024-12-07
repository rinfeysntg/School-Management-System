<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Relation::morphMap([
            'department' => \App\Models\Department::class,
            'course' => \App\Models\Course::class,
            'subject' => \App\Models\Subject::class,
            'event' => \App\Models\Event::class,
            'student' => \App\Models\Users::class,
        ]);
    }
}
