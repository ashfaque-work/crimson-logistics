<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    public function index()
    {
        return view('shipper.index');
    }
}
