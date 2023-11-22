<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $dailyword = DB::table('words')->where('is_daily_word', '=', 1)->first();
            $dailyword->update(['is_daily_word' => 0]);
    
    
            // Setup new daily word
            $newdailyword = DB::table('words')->inRandomOrder()->first();
            $newdailyword->update(['is_daily_word' => 1]);
            info('DailyWord changed');
        })->everyMinute();
        // $schedule->command('dailyword:update')->daily();
        // $schedule->command('weeklyword:update')->weekly();
        // $schedule->command('monthlyword:update')->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
