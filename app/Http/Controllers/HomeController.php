<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Repositories\BoardingHouseRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function index() {

        $categories = $this->categoryRepository->getAllCategory();
        $popularBoardingHouse = $this->boardingHouseRepository->getAllBoardingHouses();
        $cities = $this->cityRepository->getAllCities();
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses();


        return view('pages.home', compact('categories', 'popularBoardingHouse', 'cities', 'boardingHouses'));
    }


}