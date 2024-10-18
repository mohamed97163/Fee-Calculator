<?php

namespace App\Providers;


use App\Repositories\Implementation\FeePercentageRepository;
use App\Repositories\Implementation\FeePresetRepository;
use App\Repositories\Implementation\ServiceRepository;
use App\Repositories\Implementation\ThresholdRepository;
use App\Repositories\Interface\IFeePercentage;
use App\Repositories\Interface\IFeePreset;
use App\Repositories\Interface\IService;
use App\Repositories\Interface\IThreshold;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IFeePreset::class,FeePresetRepository::class);
        $this->app->bind(IFeePercentage::class,FeePercentageRepository::class);
        $this->app->bind(IService::class,ServiceRepository::class);
        $this->app->bind(IThreshold::class,ThresholdRepository::class);
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
