<?php

namespace App\Http\Controllers;
use App\Models\SmartCity;
use Illuminate\Http\Request;

class SmartcityController extends Controller
{
    public function formkuesionersmartcity(){
        $pertanyaan = SmartCity::all();
        $pertanyaan = Smartcity::all();
        return view('smartcity.formkuesionersmartcity', ['pertanyaan' => $pertanyaan]);
    }
}
