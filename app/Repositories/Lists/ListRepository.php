<?php 

namespace App\Repositories\Lists;

use App\Repositories\Lists\ListInterface;
use ActiveCampaign;

class ListRepository implements ListInterface
{
    protected $client;

    public function __construct(ActiveCampaign $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        return $this->client->api('list/list', ['ids' => 'all']);
    }
}
