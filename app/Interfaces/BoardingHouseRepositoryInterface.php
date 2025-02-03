<?php

namespace App\Interfaces;

// use Filament\Forms\Components\Builder;
use Illuminate\Database\Eloquent\Builder;


interface BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null);

    public function getPopularBoardingHouse($limit = 5);
    public function getBoardingHouseByCitySlug($slug);
    public function getBoardingHouseByCategorySlug($slug);
    public function getBoardingHouseBySlug($slug);
    public function getBoardingHouseRoomById($id);
}
