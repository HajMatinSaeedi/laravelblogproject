<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:custom-command {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Just For Fun!!!!!!!!!!!!!!!!!!!!!';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->info("hi men {$name}!");
    }
}
