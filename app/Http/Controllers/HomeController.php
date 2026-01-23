<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function home(){
        $latest_properties = Property::latest()->paginate(6);
        $location = Location::select('id','name')->get();



        $latest_categories = Category::latest()->paginate(6);
        $latest_locations = Location::latest()->paginate(6);
        $latest_testimonials = Testimonial::latest()->paginate(6);
        $latest_pricing_plans = PricingPlan::get();

        return view('welcome',[
           'latest_properties' =>$latest_properties,
           'locations' =>$location,
           'all_categories' =>$latest_categories,
           'all_locations' =>$latest_locations,
           'all_testimonials' =>$latest_testimonials,
           'pricing_plans' =>$latest_pricing_plans,
        ]);
    }

    public function currencyChange($code){
        Cookie::queue('currency',$code, 3600);
        return back();
    }
}
