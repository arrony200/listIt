<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function categories(){

        $latest_categories = Category::latest()->paginate(12);

        return view('category.index',[
            'all_categories' => $latest_categories
        ]);


    }
}
