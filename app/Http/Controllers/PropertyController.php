<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Location;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function single($id){
        $property = Property::findOrFail($id);

        return view('property.property-single',[
            'property' => $property
        ]);
    }

    public function properties(Request $request){

        // $status = $_GET['status'];

        // if($status){
        //     $latest_properties = Property::latest()->where('status',$status)->paginate(12);
        // }else{

        // }
        $latest_properties = Property::latest();

        $location = Location::select('id','name')->get();

        if($request->status != ''){
            $latest_properties = $latest_properties->where('status', $request->status);
        }

        if($request->type != ''){
            $latest_properties =$latest_properties->where('type',$request->type);
        }

        if($request->location != ''){
            $latest_properties =$latest_properties->where('location_id',$request->location);
        }
        
        if($request->price != ''){
            if($request->price == '500000'){

            }
            $latest_properties = $latest_properties->where('price', '>',400000)->where('price', '<=',500000);
        }

        if($request->bedrooms != ''){
            $latest_properties = $latest_properties->where('bedrooms', $request->bedrooms);
        }

        if($request->property_name != ''){
            $latest_properties = $latest_properties->where('name', 'LIKE', '%' . $request->property_name . '%');
        }
        

        $latest_properties = $latest_properties->paginate(12);

        return view('property.index',[
            'latest_properties' => $latest_properties,
            'locations' => $location
        ]);


    }
}
