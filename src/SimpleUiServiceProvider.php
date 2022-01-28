<?php

namespace Sourovahmad\simpleui;

use Illuminate\Support\ServiceProvider;
use Sourovahmad\simpleui\Console\AddTablePage;
use Sourovahmad\simpleui\Console\InstallCommand;

class SimpleUiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ .'/routes.php');
        $this->app->make('Sourovahmad\simpleui\controller\simpleUiController');
        $this->addCommands();
      
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function addCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                // AddTablePage::class,
                InstallCommand::class,
            ]);
        }
    }
}
