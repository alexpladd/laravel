<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Company;
use App\Models\Offer;
use App\Models\Study;
use App\Models\User;
use App\Models\UserStudy;
use Composer\Package\Archiver\ZipArchiver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getOffers() {
        $offers = Offer::all();
        $studies = Study::all();

        return view('offers.offers', [
            'offers' => $offers,
            'studies' => $studies
        ]);
    }

    public function getOfferFilter($id) {
        $offerss = Offer::all();
        $offers = array();

        foreach ($offerss as $offer) {
            foreach ($offer->studies as $offer_study) {
                if ($offer_study->id == $id) {
                    array_push($offers, $offer);
                    break;
                }
            }
        }

        $studies = Study::all();

        return view('offers.offers', [
            'offers' => $offers,
            'studies' => $studies
        ]);
    }

    public function addOffer() {
        $companies = Company::all();
        $studies = Study::all();

        return view('offers.add_offer', [
            'companies' => $companies,
            'studies' => $studies
        ]);
    }

    public function saveOffer(Request $request) {
        $validation =  $this->validate($request, [
            'title' => ['required', 'string', 'min:8', 'max:100'],
            'company_id' => ['required', 'numeric'],
            'experience' => ['nullable', 'numeric'],
            'annual_salari' => ['nullable', 'numeric'],
            'study_id' => ['required', 'numeric'],
            'description' => ['required', 'string'],
        ]);

        $offer = new Offer();
        $offer->title = $request->input('title');
        $offer->company_id = $request->input('company_id');
        $offer->experience = $request->input('experience');
        $offer->annual_salary = $request->input('annual_salary');
        $offer->description = $request->input('description');
        $offer->sent = 0;

        $offer->save();
        $offer->studies()->attach($request->input('study_id'));

        return redirect(route('offers'))->with('message', "L'oferta ha estat afegida correctament.");
    }

    public function editOffer($id) {
        $offer = Offer::findOrFail($id);
        $companies = Company::all();
        $not_studies = DB::select('select *
                        from studies
                        where id not in (
                            select studies.id
                            from offers join offer_study os on offers.id = os.offer_id
                            join studies on os.study_id = studies.id
                            where offers.id = ?)', [$offer->id]
                        );

        return view('offers.edit_offer', [
            'offer' => $offer,
            'companies' => $companies,
            'not_studies' => $not_studies
        ]);
    }

    public function updateOffer(Request $request, $id) {
        $validation =  $this->validate($request, [
            'title' => ['required', 'string', 'min:8', 'max:100'],
            'company_id' => ['required', 'numeric'],
            'experience' => ['nullable', 'numeric'],
            'annual_salari' => ['nullable', 'numeric'],
            'study_id' => ['required', 'numeric'],
            'description' => ['required', 'string'],
        ]);

        $offer = Offer::findOrFail($id);

        $offer->title = $request->input('title');
        $offer->company_id = $request->input('company_id');
        $offer->experience = $request->input('experience');
        $offer->annual_salary = $request->input('annual_salary');
        $offer->description = $request->input('description');

        $offer->update();

        if ($request->input('study_id') != 0) {
            $offer->studies()->attach($request->input('study_id'));
        }

        return redirect(route('offer.edit', $offer->id))->with('message', "Les dades de l'oferta s'han actualitzat correctament.");
    }

    public function deleteOfferStudy($offer_id, $study_id) {
        DB::delete('delete from offer_study where study_id = ? and offer_id = ?', [$study_id, $offer_id]);

        return redirect(route('offer.edit', $offer_id))->with('message', "Estudi borrat correctament.");
    }

    public function deleteOffer($id) {
        $offer = Offer::findOrFail($id);

        if ($offer->sent == 0) {
            foreach ($offer->studies as $offer_study) {
                DB::delete('delete from offer_study where study_id = ? and offer_id = ?', [$offer_study->id, $offer->id]);
            }

            $offer->delete();

            return redirect(route('offers'))->with('message', "L'oferta seleccionada s'ha eliminat correctament.");
        }

        else {
            return redirect(route('offers'))->with('error', "L'oferta seleccionada no es pot eliminar, ja que s'ha enviat als respectius candidats.");
        }
    }

    public function sendOffers() {
        $offers = Offer::where('sent', 0)->count();

        if ($offers > 0) {
            $offers = Offer::where('sent', 0)->get();
            $users = User::where('currently_working', 1)->get();

            foreach ($offers as $offer) {
                foreach ($users as $user) {
                    $offer_studies = $offer->studies;
                    $entra = false;

                    foreach ($offer_studies as $study) {
                        $counter = UserStudy::where('study_id', $study->id)->where('user_id', $user->id)->count();

                        if ($counter > 0) {
                            $entra = true;
                            break;
                        }
                    }

                    if ($entra) {
                        // Enviament de correu
                        $details = [
                            'subject' => "Oferta de feina: ".$offer->title,
                            'title' => $offer->title,
                            'description' => $offer->description,
                            'experience' => $offer->experience,
                            'annual_salary' => $offer->annual_salary,
                            'name_company' => $offer->company->name,
                            'email_company' => $offer->company->email
                        ];

                        Mail::to($user->email)->send(new SendMail($details));

                        // Registre taula pivot (offer_user)
                        $user->offers()->attach($offer->id);
                    }
                }

                $offer->sent = 1;
                $offer->update();
            }

            return redirect(route('home'))->with('message', "Ofertes enviades.");
        }

        else {
            return redirect(route('home'))->with('error', "No hi ha ofertes pendents per enviar.");
        }
    }
}
