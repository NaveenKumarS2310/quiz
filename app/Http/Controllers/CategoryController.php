<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizCategory;

class CategoryController extends Controller
{
    //

    public function index(){

    

        $categories = QuizCategory::where('status',1)->get();


        return view('category.index');

    }

    public function store(Request $request){

    }
}
