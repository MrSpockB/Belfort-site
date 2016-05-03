<?php

namespace App\Http\Controllers;
use App\Page as Page;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function show($slug = 'home')
    {
    	$page = Page::whereSlug($slug)->first();
    	return view('pages.index', ['page' => $page]);
    }
}
