<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use App\Models\UserStudy;
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
        $user = User::findOrFail(Auth::user()->id);
        $user_studies = UserStudy::where('user_id', Auth::user()->id)->get();
        $offers = Offer::where('sent', 0)->get();

        return view('home', [
            'user' => $user,
            'user_studies' => $user_studies,
            'offers' => $offers
        ]);
    }

    public function getFilter($id) {
        $user = User::findOrFail(Auth::user()->id);
        $offers_filter = array();

        foreach ($user->offers as $user_offer) {
            foreach ($user_offer->studies as $offer_study) {
                if ($offer_study->id == $id) {
                    array_push($offers_filter, $user_offer);
                }
            }
        }
        return view('home_filter', [
            'user' => $user,
            'offers_filter' => $offers_filter
        ]);
    }
}
