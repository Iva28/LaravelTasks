<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TasksServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Abstractions\ITasksService','App\Services\TasksService');
    }
}
