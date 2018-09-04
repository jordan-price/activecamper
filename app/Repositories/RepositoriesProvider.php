<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Campaigns\CampaignInterface;
use App\Repositories\Campaigns\CampaignRepository;
use App\Repositories\Lists\ListInterface;
use App\Repositories\Lists\ListRepository;
use App\Repositories\Messages\MessageInterface;
use App\Repositories\Messages\MessageRepository;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CampaignInterface::class,
            CampaignRepository::class
        );

        $this->app->bind(
            ListInterface::class,
            ListRepository::class
        );

        $this->app->bind(
            MessageInterface::class,
            MessageRepository::class
        );
    }
}
