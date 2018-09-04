<?php

namespace App\Services\ActiveCampaign;

use App\Services\ActiveCampaign\ActiveCampaignInterface;
use App\Repositories\Campaigns\CampaignInterface;
use App\Repositories\Lists\ListInterface;
use App\Repositories\Messages\MessageInterface;

class ActiveCampaignService implements ActiveCampaignInterface
{
    const SINGLE = 'single';
    const RECURRING = 'recurring';
    const DAY1 = 'day1';
    const DAY2 = 'day2';
    const WEEK1 = 'week1';
    const WEEK2 = 'week2';
    const MONTH1 = 'month2';
    const MONTH2 = 'month2';
    const QUARTER1 = 'quarter1';
    const QUARTER2 = 'quarter2';
    const YEAR1 = 'year1';
    const YEAR2 = 'year2';

    const TYPES = [
        self::SINGLE    => 'Standard (One-time Email Campaign)',
        self::RECURRING => 'Recurring',
    ];

    const RECURRING_OPTIONS = [
        self::DAY1     => 'Every Day',
        self::DAY2     => 'Every Other Day',
        self::WEEK1    => 'Every Week',
        self::WEEK2    => 'Every Other Week',
        self::MONTH1   => 'Every Month',
        self::MONTH2   => 'Every Other Month',
        self::QUARTER1 => 'Every Quarter',
        self::QUARTER2 => 'Every Other Quarter',
        self::YEAR1    => 'Every Year',
        self::YEAR2    => 'Every Other Year',
    ];

    protected $campaignRepo;

    protected $listRepo;

    protected $messageRepo;

    protected $data;

    public function __construct(
        CampaignInterface $campaignRepo, 
        ListInterface $listRepo, 
        MessageInterface $messageRepo
    )
    {
        $this->campaignRepo = $campaignRepo;
        $this->listRepo = $listRepo;
        $this->messageRepo = $messageRepo; 
    }

    public function create(array $input)
    {
        $params = $this->setParams($input);
        return $this->campaignRepo->create($params);
    }

    public function getFormData()
    {   
        $this->data =[
            'types' => self::TYPES,
            'recurring' => self::RECURRING_OPTIONS,
        ];

        $lists = $this->listRepo->all();
        $this->formatToArray('lists', $lists);

        $messages = $this->messageRepo->all();
        $this->formatToArray('messages', $messages);

        return $this->data;
    }

    public function all()
    {
        return $this->campaignRepo->all();
    }

    protected function setParams($input)
    {
        $params = [
            'type'                    => $input['type'],
            'name'                    => $input['name'],
            'sdate'                   => $input['startDate'],
            'status'                  => $input['status'],
            'public'                  => $input['public'],
            'tracklinks'              => 'all',
            "m[".$input['messages']."]" => 100
        ];

        if ($input['type'] == 'recurring') {
            $params['recurring'] = $input['recurring'];
        }

        foreach ($input['lists'] as $list) {
            $params["p[$list]"] = $list;
        }

        return $params;
    }

    protected function formatToArray($name, $object)
    {
        if ($object->success == 1) {
            foreach ($object as $key => $value) {
                if (is_numeric($key)) {
                    $this->data[$name][$key] = $value; 
                }
            }
        } else {
            $this->data[$name] = [];
        }
    }
}
