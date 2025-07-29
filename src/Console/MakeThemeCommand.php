<?php

namespace RenanDeSouza\ThemeStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeThemeCommand extends Command
{
    protected $signature = 'make:theme {name}';
    protected $description = 'Cria uma estrutura base de tema com Vue + Inertia';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $basePath = resource_path("js/Themes/{$name}");

        if (File::exists($basePath)) {
            $this->error("O tema '{$name}' já existe.");
            return;
        }

        $stubPath = base_path('stubs/theme-starter');
        $defaultStubPath = __DIR__ . '/../../stubs';

        $sourceStub = File::exists($stubPath) ? $stubPath : $defaultStubPath;

        File::copyDirectory($sourceStub, $basePath);

        $this->info("Tema '{$name}' criado com sucesso!");
    }
}
