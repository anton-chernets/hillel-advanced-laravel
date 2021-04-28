<?php


namespace App\Console\Commands;


use App\Services\Search\Google\GoogleAPI;
use Illuminate\Console\Command;

class CheckFacade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:total {request : request text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count total pages by search request';

    /**
     * Execute the console command.
     *
     * @param GoogleAPI $googleApisFacade
     * @return void
     */
    public function handle(GoogleAPI $googleApisFacade): void
    {
        $this->info($googleApisFacade->operation($this->argument('request')));
    }
}
