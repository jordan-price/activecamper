<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\ActiveCampaign\ActiveCampaignInterface;
use App\Services\ActiveCampaign\ActiveCampaignService;

class ServicesProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ActiveCampaignInterface::class,
            ActiveCampaignService::class
        );
    }
}
