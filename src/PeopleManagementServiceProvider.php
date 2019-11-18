<?php

namespace jmpagella\PeopleManagement;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use jmpagella\PeopleManagement\Console\InstallPeopleManagement;

class PeopleManagementServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'people');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/config.php' =>   config_path('people-management.php'),
        ], 'config');

        // Publish migration
        $this->publishes([
            __DIR__ . '/../database/migrations/create_people_management_tables.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_people_management_tables.php'),
        ], 'migrations');

        // Register artisan command
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallPeopleManagement::class,
            ]);
        }
    }
}
