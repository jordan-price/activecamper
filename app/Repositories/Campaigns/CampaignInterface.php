<?php

namespace App\Repositories\Campaigns;

interface CampaignInterface
{
    public function all($options = []);

    public function create($params);
}
