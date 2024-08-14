<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error('Service already exists!');
        }

        File::ensureDirectoryExists(app_path('Services'));

        File::put($path, $this->getServiceStub($name));

        $this->info('Service created successfully!');
    }

    protected function getServiceStub($name)
    {
        return <<<EOT
        <?php

        namespace App\Services;

        class {$name}
        {
            //
        }
        EOT;
    }
}
