<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CityRepositoryInterface $cityRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,   // Mengelola data boarding house
        CityRepositoryInterface $cityRepository,                     // Mengelola data kota
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * handler permintaan untuk menampilkan informasi boarding house di suatu kota, berdasarkan slug kota
     */
    public function show($slug)
    {
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCitySlug($slug);    // Mengambil data boarding house berdasarkan slug kota
        $city = $this->cityRepository->getCityBySlug($slug);                                    // Mengambil detail kota berdasarkan slug kota

        // Mengirimkan data "boardingHouses", "city" ke file view "pages.city.show"
        return view("pages.city.show", compact("boardingHouses", "city"));
    }
}
