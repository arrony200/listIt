<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function single($slug){
        $page = Page::where('slug', $slug )->first();
        // $page = Page::findOrFail($id);
        if(!empty($page)){
            return view('page.single',[
                'page' => $page
            ]);
        }else{
            return abort('404');
        }
    }
}
