<?php

namespace App\Services\ActiveCampaign;

interface ActiveCampaignInterface
{
    public function create(array $options);

    public function getFormData();

    public function all();
}
