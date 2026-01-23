<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function locations(){

        $latest_locations = Location::latest()->paginate(12);

        return view('location.index',[
            'all_locations' => $latest_locations
        ]);


    }

}
