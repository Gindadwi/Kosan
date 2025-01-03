<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingControler extends Controller
{
    public function check(){
        return view('pages.check-booking');
    }
}
