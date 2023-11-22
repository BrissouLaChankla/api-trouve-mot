<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Word;

class dailyWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailyword:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Le mot du jour change !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dailyword = Word::where('is_daily_word', '=', 1)->first();
        $dailyword->update(['is_daily_word' => 0]);


        // Setup new daily word
        $newdailyword = Word::inRandomOrder()->first();
        $newdailyword->update(['is_daily_word' => 1]);
    }
}
