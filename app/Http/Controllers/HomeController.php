<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $dataApiLambangPovinsi = $this->getApiCurl('https://feriirawan-api.herokuapp.com/list/symbols/province/100');
        //return $dataApiLambangPovinsi;
        return view('home',compact('user','dataApiLambangPovinsi'));
    }

    public function indexKab()
    {
        $user = Auth::user();
        $dataApiLambangKabupaten = $this->getApiCurl('https://feriirawan-api.herokuapp.com/list/symbols/regency/100');
        //return $dataApiLambangPovinsi->lambang;
        return view('home_kab',compact('user','dataApiLambangKabupaten'));
    }

    public function getApiCurl($url)
    {
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($data);
        return $jsonArrayResponse;
    }
}
