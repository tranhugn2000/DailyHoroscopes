<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : The name of the service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        if (strpos($name, '/') !== false) {
            $parts = explode('/', $name);
            $nameSpace = $parts[0]; 
            $className = $parts[1];
        } else {
            $nameSpace = null;
            $className = $name;
        }

        
        $directoryPath = app_path('Services');
        $filePath = $directoryPath . '/' . $name . '.php';

        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }
        if ($nameSpace && !File::exists(app_path('Services/' . $nameSpace))) {
            File::makeDirectory(app_path('Services/' . $nameSpace), 0755, true);
        }
        if (File::exists($filePath)) {
            $this->error('Service already exists!');
            return;
        }

        File::put($filePath, $this->serviceTemplate($className, $nameSpace));

        $this->info('Service created successfully.');
    }

    protected function serviceTemplate($className, $nameSpace)
    {
    $name_space_defaul = 'App\\Services';
    if ($nameSpace != null) {
        $name_space_defaul .= '\\' . $nameSpace;
    }
return "<?php

namespace {$name_space_defaul};

class {$className}
{
    function __construct()
    {
    }

    //
}
";
    }
}