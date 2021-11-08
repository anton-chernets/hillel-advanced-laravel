<?php

namespace App\Console\Commands;

use App\Models\Contractor;
use App\Repositories\ContractorRepository;
use Illuminate\Console\Command;

class SelectionDuplicatedContractors extends Command
{
    protected $model;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contractors:get-duplicated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Selection duplicated contractors';

    /**
     * Create a new command instance.
     *
     * @param Contractor $contractor
     */
    public function __construct(Contractor $contractor)
    {
        parent::__construct();

        $this->model = new ContractorRepository($contractor);
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $result = $this->model->duplicateContactors();

        foreach ($result as $item) {
            $this->info("{$item}");
            $this->line("\n");
        }
    }
}
