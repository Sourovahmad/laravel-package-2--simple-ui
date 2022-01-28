<?php

namespace Sourovahmad\simpleui\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AddTablePage extends Command
{
    protected $signature = 'simpleui:addpage';
    protected $description = 'Add a new  page';


    public function handle()
    {
       $filename = $this->ask('enter your file name');
    
       $message = 'Createing file as '. $filename;
       $this->info($message);  

        File::copy(__DIR__.'/stub/addPageWithTable.blade.php', base_path('resources/views/'.$filename.'.blade.php'));

        $createdSuccess = $filename . '.blade.php created successfully';
        $this->info($createdSuccess);

    }
    
 
}
