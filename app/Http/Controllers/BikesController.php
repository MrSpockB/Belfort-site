<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Http\Controllers\Controller;

class BikesController extends Controller
{
    public function showAll()
    {
        $data = Bike::paginate(20);
        return view('pages.bikes', ['bikes' => $data]);
    }
    public function showBike($slug)
    {
        $bike = Bike::where('slug', '=', $slug)->first();
        return view('bikes.single', ['bike' => $bike]);
    }
}