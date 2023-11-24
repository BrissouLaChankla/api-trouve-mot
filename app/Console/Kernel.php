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
            
            $dailyword = DB::table('words')->where('is_daily_word', '=', 1)->limit(1);
            $dailyword->update(['is_daily_word' => 0]);
            
            
            // Setup new daily word
            $newdailyword = DB::table('words')->inRandomOrder()->limit(1);
            $newdailyword->update(['is_daily_word' => 1]);
            info('DailyWord changed');
        })->daily();

        $schedule->call(function () {
            
            $weeklyword = DB::table('words')->where('is_weekly_word', '=', 1)->limit(1);
            $weeklyword->update(['is_weekly_word' => 0]);
    
            // Setup new weekly word
            $newweeklyword = DB::table('words')->inRandomOrder()->limit(1);
            $newweeklyword->update(['is_weekly_word' => 1]);
            info('Weekly changed');
        })->weekly();


        $schedule->call(function () {
            
            $monthlyword = DB::table('words')->where('is_monthly_word', '=', 1)->limit(1);
        $monthlyword->update(['is_monthly_word' => 0]);

        // Setup new monthly word
        $newmonthlyword = DB::table('words')->inRandomOrder()->limit(1);
        $newmonthlyword->update(['is_monthly_word' => 1]);
            info('Montly changed');
        })->monthly();
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
