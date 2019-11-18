<?php

namespace jmpagella\PeopleManagement\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallPeopleManagement extends Command
{
    protected $signature = 'people-management:install';

    protected $description = 'Install PeopleManagement Package';

    public function handle()
    {
        $this->info('Installing PeopleManagement Package...');

        // Configuration file
        $this->info('Publishing configuration file...');
        $this->call('vendor:publish', [
            '--provider' => "jmpagella\PeopleManagement\PeopleManagementServiceProvider",
            '--tag' => "config"
        ]);

        // Migration file
        $this->info('Publishing migration file...');
        // Check if already exists
        $list = glob(database_path('migrations\*_create_people_management_tables.php'));
        if (empty($list)) {
            $this->call('vendor:publish', [
                '--provider' => "jmpagella\PeopleManagement\PeopleManagementServiceProvider",
                '--tag' => "migrations"
            ]);
        }

        $this->info('Installed PeopleManagement Package');
    }
}