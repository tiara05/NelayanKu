<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class DependentDropdownController extends Controller
{
    public function cities(Request $request)
    {
        return City::where('province_code', $request->get('id'))->pluck('name', 'code');
    }

    public function districts(Request $request)
    {
        return District::where('city_code', $request->get('id'))->pluck('name', 'code');
    }

    public function villages(Request $request)
    {
        return Village::where('district_code', $request->get('id'))->pluck('name', 'code');
    }
}