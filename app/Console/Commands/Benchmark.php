<?php

namespace App\Console\Commands;

use App\Models\{Person, Learner};
use Illuminate\Console\Command;
use function Laravel\Prompts\info;
use Illuminate\Support\Benchmark as BM;
use Illuminate\Support\Facades\Artisan;

class Benchmark extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:benchmark';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Benchmark';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        info('Benchmarking...'); 

        BM::dd([
            'Person Seeder' => fn () => Artisan::call('db:seed --class=PersonSeeder'),
            'Learner Seeder' => fn () => Artisan::call('db:seed --class=LearnerSeeder'),
        ], 2);

        // BM::dd([
        //     'Person Scenario' => fn () => Person::count(),
        //     'Learner Scenario' => fn () => Learner::count(),
        // ], 5);

    }   
}
