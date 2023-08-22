<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BuildCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \File::put('resources/cordova/www/index.html',
            view('welcome')->render()
        );

        chdir(getcwd().'/resources/cordova');

        exec('cordova prepare', $output, $exitCode);

        // Output the result
        $this->info("Npm Command Output: " . implode(PHP_EOL, $output));

        // Check if the command was successful
        if ($exitCode === 0) {
            $this->info('Npm command completed successfully.');
        } else {
            $this->error('Npm command failed.');
        }
    }
}
