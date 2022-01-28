<?php

namespace Sourovahmad\simpleui\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    protected $signature = 'simpleui:install';
    protected $description = 'Add Layout';


    public function handle()
    {
       $this->info('Creating Layout');
       $this->info('Copying Assests, Images, JS, CSS to Public Folder');
       $basePath = base_path('public/sourovahmad/simpleUI');
    
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, 0777, true);
            File::copyDirectory(__DIR__.'/stub/assets', $basePath.'/assets');
        }else{
            $this->info('Assets already exist');
        }

        //-------------------- Add Layout file ---------------------------------

        $this->info('Creating Blade File');
        (new Filesystem)->ensureDirectoryExists(resource_path('views/sourovahmad/simpleUI'));
            copy(__DIR__.'/stub/simpleUI_Layout.blade.php', resource_path('views/sourovahmad/simpleUI/simpleUI_Layout.blade.php'));
            copy(__DIR__.'/stub/index.blade.php', resource_path('views/sourovahmad/simpleUI/index.blade.php'));
      
        $this->info('Success - Love You too');
    }
    
 
}
