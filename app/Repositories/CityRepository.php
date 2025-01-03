<?php 

namespace App\Repositories;

use App\Models\City;
use App\Interfaces\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface {
    public function getAllCities(){
        return City::all();
    }
}