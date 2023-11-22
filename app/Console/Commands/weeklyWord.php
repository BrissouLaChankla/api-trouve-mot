<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Word;

class weeklyWord extends Command
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weeklyword:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Le mot de la semaine change !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $weeklyword = Word::where('is_weekly_word', '=', 1)->first();
        $weeklyword->update(['is_weekly_word' => 0]);

        // Setup new weekly word
        $newweeklyword = Word::inRandomOrder()->first();
        $newweeklyword->update(['is_weekly_word' => 1]);
        return "gg";
    }
}
