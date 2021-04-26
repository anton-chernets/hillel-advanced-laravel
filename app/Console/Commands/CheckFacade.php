<?php


namespace App\Console\Commands;


use App\Services\Search\Google\CustomSearchAPI;
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
     * @return void
     */
    public function handle(): void
    {
        $googleSubsystem1 = new CustomSearchAPI($this->argument('request'));
        $googleApisFacade = new GoogleAPI($googleSubsystem1);

        $this->info($googleApisFacade->operation());
    }
}
