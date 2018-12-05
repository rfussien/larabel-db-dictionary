<?php

namespace Rfussien\DbDictionary\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Rfussien\DbDictionary\Column;

class GenerateDictionary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dictionary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a DB dictionary html file';

    public function handle(Column $columns, Filesystem $filesystem)
    {
        $view = (string)view(
            'dictionary::index',
            ['data' => $columns->OfTheDefaultDatabase()->get()->toJson()]
        )->render();

        if (!$filesystem->exists(public_path('docs'))) {
            $filesystem->makeDirectory(public_path('docs'));
        }

        $filesystem->put(public_path('docs/db-dictionary.html'), $view);

        $this->info(
            "The documentation has been generated.\n" .
            "-------------------------------------------------\n" .
            "Access URL: " . url('docs/db-dictionary.html')
        );
    }
}
