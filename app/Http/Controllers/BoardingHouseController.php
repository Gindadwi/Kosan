<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{

    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,                    // Mengelola data kota
        CategoryRepositoryInterface $categoryRepository,            // Mengelola data kategori
        BoardingHouseRepositoryInterface $boardingHouseRepository,  // Mengelola data boarding house
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    /**
     * handler untuk menampilkan detail satu boarding house berdasarkan slug
     */
    public function show($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug); // Mengambil data boarding house berdasarkan slug

        // Mengirimkan data "boardingHouse" ke file view "pages.boarding-house.show"
        return view("pages.boarding-house.show", compact("boardingHouse"));
    }

    /**
     * handler untuk menampilkan informasi kamar boarding house tertentu
     */
    public function rooms($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug); // Mengambil data boarding house berdasarkan slug

        // Mengirimkan data "boardingHouse" ke file view "pages.boarding-house.rooms"
        return view("pages.boarding-house.rooms", compact("boardingHouse"));
    }

    /**
     * handler untuk menampilkan halaman pencarian boarding house
     */
    public function find()
    {
        $categories = $this->categoryRepository->getAllCategories();    // Mengambil data semua kategori untuk ditampilkan di form pencarian
        $cities = $this->cityRepository->getAllCities();                // Mengambil data semua kota untuk ditampilkan di form pencarian

        // Mengirimkan data "categories", "cities" ke file view "pages.boarding-house.find"
        return view("pages.boarding-house.find", compact("categories", "cities"));
    }

    /**
     * handler untuk menampilkan hasil pencarian boarding house berdasarkan kriteria pengguna
     */
    public function findResults(Request $request)
    {
        // Mengambil data berdasarkan input pencarian seperti kata kunci, kota, dan kategori
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses(
            $request->search,
            $request->city,
            $request->category
        );

        // Mengirimkan data "boardingHouses" ke file view "pages.boarding-house.index"
        return view("pages.boarding-house.index", compact("boardingHouses"));
    }
}
