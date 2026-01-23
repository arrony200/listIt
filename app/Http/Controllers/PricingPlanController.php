<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function pricing_plan(){

        $latest_pricing = PricingPlan::get();

        return view('pricing.index',[
            'pricing_plans' => $latest_pricing
        ]);


    }
}
