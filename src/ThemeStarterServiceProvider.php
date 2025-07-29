<?php

namespace RenanDeSouza\ThemeStarter;

use Illuminate\Support\ServiceProvider;
use RenanDeSouza\ThemeStarter\Console\MakeThemeCommand;

class ThemeStarterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../stubs' => base_path('stubs/theme-starter'),
        ], 'theme-starter-stubs');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeThemeCommand::class,
            ]);
        }
    }
}
