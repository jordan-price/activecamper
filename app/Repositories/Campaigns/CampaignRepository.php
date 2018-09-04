<?php 

namespace App\Repositories\Campaigns;

use App\Repositories\Campaigns\CampaingInterface;
use ActiveCampaign;

class CampaignRepository implements CampaignInterface
{
    protected $client;

    public function __construct(ActiveCampaign $client)
    {
        $this->client = $client;
    }

    public function all($options = [])
    {
        return $this->client->api('campaign/paginator', $options);
    }

    public function create($params)
    {
        return $this->client->api('campaign/create', $params);
    }
}