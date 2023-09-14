<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;
use Spatie\Health\Checks\Checks\DatabaseSizeCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;
use Spatie\Health\Checks\Checks\DatabaseConnectionCountCheck;
use Spatie\Health\Checks\Checks\HorizonCheck;




class PSIhealthserviceprovider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        //uncoment this to check the file health

        Health::checks([
            UsedDiskSpaceCheck::new(),
            DatabaseCheck::new()->label('Databased Connection'),
        ]);


        //uncoment this to check the CPU health load

        Health::checks([
            CpuLoadCheck::new()
                ->failWhenLoadIsHigherInTheLast5Minutes(2.0)
                ->failWhenLoadIsHigherInTheLast15Minutes(1.5),
        ]);

        Health::checks([
            DatabaseSizeCheck::new()
                ->failWhenSizeAboveGb(errorThresholdGb: 5.0)
        ]);
        Health::checks([
            ScheduleCheck::new(),
        ]);
        Health::checks([
            SecurityAdvisoriesCheck::new(),
        ]);

        Health::checks([
            DatabaseTableSizeCheck::new()
                ->table('cars', maxSizeInMb: 2_000)
                ->table('inventories', maxSizeInMb: 2_000)
                ->table('invoces', maxSizeInMb: 2_000)
                ->table('log', maxSizeInMb: 2_000),
        ]);



        Health::checks([
            HorizonCheck::new(),
        ]);
        Health::checks([
            DatabaseConnectionCountCheck::new()
                ->failWhenMoreConnectionsThan(100)
        ]);

    }
}
