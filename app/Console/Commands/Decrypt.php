<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

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
        if($this->option('message')) {
            $message = $this->option('message');
        } else {
            $message = $this->ask('Insert message (Only A-Z or a-z)');
        }

        if($this->option('key')) {
            $key = substr($this->option('key'), 1);
        } else {
            $key = $this->ask('Insert key (Only numbers)');
        }

        if(!is_numeric($key)) return false;

        $key = 26 - $key;
        
        Artisan::call(
            'chiper:encrypt', [
                "--message" => $message,
                "--key" => $key
            ]
        );

        $this->info(Artisan::output());
        
        return true;
    }
}
