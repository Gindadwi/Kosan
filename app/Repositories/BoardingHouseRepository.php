<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Illuminate\Database\Eloquent\Builder;


use function Laravel\Prompts\search;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{

    public function getAllBoardingHouses($search = null, $city = null, $category = null) { 
        
        $query = BoardingHouse::query();

        // disini ketika search di isi maka dia akan dijalankan
        if($search){
            $query->where("name","like","%". $search . '%');
        }

        // jika city diisi dia akan mencari berdasarkan slug city
        if($city){
            $query->whereHas ('city', function (Builder $query) use ($city) {
                $query->where('slug', $city);
            });
        }

        // dia akan mencari berdasarkan slug dari category nya
        if($category){ 
            $query->whereHas ('category', function (Builder $query) use ($category) { 
                $query->where('slug', $category);
            });
        }

        return $query->get();

    }

    public function getPopularBoardingHouse($limit = 5){
        return BoardingHouse::withCount('transaction')->orderBy('transactions_count', 'desc')->take($limit)->get();
    }

    public function getBoardingHouseByCitySlug($slug){
        return BoardingHouse::whereHas('city', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseByCategorySlug($slug){
        return BoardingHouse::whereHas('category', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug){
        return BoardingHouse::where('slug', $slug)->first();
    }



}