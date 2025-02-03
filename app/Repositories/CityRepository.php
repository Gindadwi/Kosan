<?php

namespace App\Repositories;

use App\Models\City;
use App\Interfaces\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
    public function getAllCities()
    {
        return City::all();
    }

    public function getCityBySlug($slug)
    {
        return City::where("slug", $slug)->first();
    }
}
