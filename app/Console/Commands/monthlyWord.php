<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Word;

class monthlyWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthlyword:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Le mot du mois change !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $monthlyword = Word::where('is_monthly_word', '=', 1)->first();
        $monthlyword->update(['is_monthly_word' => 0]);

        // Setup new monthly word
        $newmonthlyword = Word::inRandomOrder()->first();
        $newmonthlyword->update(['is_monthly_word' => 1]);
        return "gg";
    }
}
