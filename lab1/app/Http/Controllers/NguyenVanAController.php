<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NguyenVanAController extends Controller
{
    public function thongtin(){
        return view('thongtinsv');
    }
}