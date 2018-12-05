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

        $filesystem->put(public_path('db-dictionary/index.html'), $view);
    }
}
