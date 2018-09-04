<?php 

namespace App\Repositories\Messages;

use App\Repositories\Messages\MessageInterface;
use ActiveCampaign;

class MessageRepository implements MessageInterface
{
    protected $client;

    public function __construct(ActiveCampaign $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        return $this->client->api('message/list', ['ids' => 'all']);
    }
}