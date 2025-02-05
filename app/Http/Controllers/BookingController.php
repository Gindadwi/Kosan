<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,  // Mengelola data boarding house
        TransactionRepositoryInterface $transactionRepository,      // Mengelola data transaksi
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->transactionRepository = $transactionRepository;
    }


    /**
     * handler untuk menyimpan data transaksi sementara ke dalam sesi pengguna dan mengarahkan pengguna ke halaman informasi booking
     * 
     * @param :
     * $request : berisi data yang dikirimkan pengguna melalui form booking
     * $slug : slug boarding house yang akan di-booking
     */
    public function booking(Request $request, $slug)
    {
        $this->transactionRepository->saveTransactionDataToSession($request->all());  // Menyimpan data booking sementara ke sesi pengguna

        // Mengarahkan pengguna ke route "booking.information" dengan parameter slug untuk menampilkan detail informasi booking
        return redirect()->route("booking.information", $slug);
    }


    /**
     * handler untuk menampilkan halaman informasi booking berdasarkan data transaksi yang disimpan di sesi
     * 
     * @param :
     * $slug : slug boarding house yang di-booking
     */
    public function information($slug)
    {
        $transaction = $this->transactionRepository->getTransactionDataFromSession();                   // Mengambil data transaksi dari sesi 
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);           // Mengambil detail boarding house berdasarkan slug
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room_id'] ?? null);  // Mengambil detail kamar yang dipilih berdasarkan room_id dari data transaksi

        // Mengirimkan data 'transaction', 'boardingHouse', 'room' ke file view 'pages.booking.information'
        return view('pages.booking.information', compact('transaction', 'boardingHouse', 'room'));
    }


    /**
     * handler untuk menampilkan halaman untuk memeriksa status booking
     * 
     * @param :
     * $slug : slug boarding house yang di-booking
     */
    public function check()
    {
        // Mengembalikan view "pages.check-booking" dan tidak memerlukan data khusus
        return view("pages.check-booking");
    }
}
