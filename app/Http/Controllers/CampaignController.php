<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCampaignRequest;
use App\Services\ActiveCampaign\ActiveCampaignInterface;

class CampaignController extends Controller
{
    private $campaign;

    public function __construct(ActiveCampaignInterface $campaignService)
    {
        $this->campaign = $campaignService;
    }

    public function index()
    {   
        $campaigns = $this->campaign->all();
        return view('campaigns.index', ['campaigns' => $campaigns->rows]);
    }

    public function create()
    {
        $data = $this->campaign->getFormData();
        return view('campaigns.create', $data);
    }

    public function store(StoreCampaignRequest $request)
    {
        $campagin = $this->campaign->create($request->input());

        if ($campagin->success == 0) {
            return redirect()->back()->with('error', $campagin->result_message);
        }
        return redirect('campaigns')->with('status', $campagin->result_message);
        
    }

}
