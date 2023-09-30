<?php

namespace App\Http\Controllers;
use App\Models\cars;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class apiTester extends Controller
{
    //
    public function cachedata()
    {
        if(!Cache::has('cars')){

            return Cache::put('cars',$data);
        }else{
            return Cache::get('cars');
        }
    }
    public function fetchRawdata(Request $request){
        return cars::all();
    }

    public function index() {
        return Cache::remember('cars', 60, function () {
            return cars::all();
        });
      }

      // Returns all 500 without Caching
      public function allWithoutCache() {
        return cars::all();
      }
}
