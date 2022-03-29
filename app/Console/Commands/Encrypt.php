<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Encrypt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chiper:encrypt {--msg|message=} {--k|key=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Encrypt message using caesar chiper';


    public function chiper($ch, $key) {
        if (!ctype_alpha($ch)) return $ch;

        $offset = ord(ctype_upper($ch) ? 'A' : 'a');
        $floatingPoint = fmod(((ord($ch) + $key) - $offset), 26);
        $chr = chr($floatingPoint + $offset);

        return $chr;
    }

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
            $message = $this->ask("Insert message (Only A-Z or a-z):");
        }

        if($this->option('key')) {
            $key = substr($this->option('key'), 1);
        } else {
            $key = $this->ask("Insert key (Only numbers):");
        }

        if(!is_numeric($key)) return false;

        
        $chiperArray = collect(str_split($message))->map(function($item,$k) use ($key){
            return $this->chiper($item, $key);
        })->toArray();

        $encrypt = implode($chiperArray); 
        $this->info($encrypt);

        return true; 
    }
}
