<?php

namespace Designbycode\Taggable\Commands;

use Illuminate\Console\Command;

class TagCommand extends Command
{
    public $signature = 'laravel-tags';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
