<?php

namespace DPCreations\LaravelLanguageCli\Console;

use Illuminate\Console\Command;

class Make extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:make {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates {name}.php file in all available language directories.';

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
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = config('languagecli.path');
        $languages = glob($path . '/*' , GLOB_ONLYDIR);

        foreach($languages as $language) {
            $filePath = "{$language}/{$name}.php";
            if(!file_exists($filePath)) {
                $file = fopen("{$language}/{$name}.php", "w");
                $this->boilerplate($file, ucfirst($name));
                $this->info("{$filePath} √");
            }
        }
    }

    /**
     * Generates boilerplate content for language file
     *
     * @return void
     */
    private function boilerplate($file, $name)
    {
        fwrite($file, "<?php \n \n");
        fwrite($file, "return [ \n \n");
        fwrite($file, "\t/* \n");
        fwrite($file, "\t |-------------------------------------------------------------------------- \n");
        fwrite($file, "\t | {$name} Language Lines \n");
        fwrite($file, "\t |-------------------------------------------------------------------------- \n");
        fwrite($file, "\t*/ \n \n");
        fwrite($file, "];");
    }
}
