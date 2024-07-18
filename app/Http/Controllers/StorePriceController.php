<?php

namespace App\Http\Controllers;

use App\Models\StorePrice;
use Illuminate\Http\Request;

class StorePriceController extends Controller
{
    public function index()
    {
        $storePrices = StorePrice::all();
        return view('dashboard.pages.stores.index' ,compact('storePrices'));
    }
}
