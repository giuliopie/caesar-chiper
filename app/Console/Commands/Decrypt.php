<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Decrypt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chiper:decrypt {--msg|message=} {--k|key=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Encrypt message using caesar chiper';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
