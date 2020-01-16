<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class genarelController extends Controller
{
    public function aboutPage(){
    	return view('pages.about');
    }
    public function contactPage(){
    	return view('pages.contact');
    }

    public function homePage(){
    	$posts = DB::table('posts')
    	->join('categories','posts.category_id','categories.id')
    	->select('posts.*','categories.name','categories.slug')
    	->paginate(3);//simplePaginate(3) for previous and next button
    	return view('pages.home',compact('posts'));
    }
}
