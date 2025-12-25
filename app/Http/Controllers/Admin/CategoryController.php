<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\QuizCategory;

class CategoryController extends Controller
{
    //

    public function index(){


        dd('asd');
    

        $categories = QuizCategory::where('status',1)->get();


        return view('category.index');

    }

    public function store(Request $request){

    }
}
