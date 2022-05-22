<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class GraduatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getGraduates() {
        $graduates = User::where('coordinator', 0)->get();

        return view('graduates.graduates', [
           'graduates' => $graduates
        ]);
    }

    public function editGraduate($id) {
        $graduate = User::findOrFail($id);
        $not_studies_graduate = DB::select('select *
                                                    from studies
                                                    where id not in (
                                                        select study_id
                                                        from user_study
                                                        where user_id = ?
                                                    )', [$id]);

        return view('graduates.edit_graduate', [
            'graduate' => $graduate,
            'not_studies_graduate' => $not_studies_graduate,
        ]);
    }

    public function updateGraduate(Request $request, $id) {
        $validation =  $this->validate($request, [
            'first_name' => ['required', 'string', 'min:1', 'max:50'],
            'last_name' => ['required', 'string', 'min:1', 'max:100'],
            'dni' => ['required', 'string', 'min:9', 'max:9', 'unique:users,dni,'.$id],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,'.$id, 'regex:/(.*)@sense-son\.com$/i'],
            'url_file' => ['nullable', 'file', 'mimes:pdf'],
            'phone_number' => ['nullable', 'string', 'min:9', 'max:9'],
            'currently_working' => ['required', 'boolean'],
            'study_id' => ['required', 'numeric'],
            'promotion_year' => ['nullable', 'numeric'],
        ]);

        $graduate = User::find($id);

        if ($request->hasFile('url_file')) {
            $file = $request->file('url_file');
            $file_name = time().$file->getClientOriginalName();
            Storage::disk('documents')->put($file_name, File::get($file));

            $graduate->url_file = $file_name;
        }

        $graduate->first_name = $request->input('first_name');
        $graduate->last_name = $request->input('last_name');
        $graduate->dni = $request->input('dni');
        $graduate->email = $request->input('email');
        $graduate->phone_number = $request->input('phone_number');
        $graduate->currently_working = $request->input('currently_working');

        $graduate->update();

        if ($request->input('study_id') != 0) {
            if ($request->input('promotion_year')) {
                $user_study = new UserStudy();
                $user_study->promotion_year = $request->input('promotion_year');
                $user_study->user_id = $id;
                $user_study->study_id = $request->input('study_id');

                $user_study->save();

                return redirect(route('graduate.edit', $id))->with('message', "Les dades s'han actualitzat correctament.");
            }

            else {
                return redirect(route('graduate.edit', $id))->with('warning', "Totes dels dades s'han actualitzat, menys l'estudi. Si vols afegir un estudi al titulat has d'especificar l'any de promoció de l'estudi.");
            }
        }

        else {
            return redirect(route('graduate.edit', $id))->with('message', "Les dades s'han actualitzat correctament.");
        }
    }

    public function addGraduate() {
        return view('graduates.add_graduate');
    }

    public function saveGraduate(Request $request) {
        $validation =  $this->validate($request, [
            'first_name' => ['required', 'string', 'min:1', 'max:50'],
            'last_name' => ['required', 'string', 'min:1', 'max:100'],
            'dni' => ['required', 'string', 'min:9', 'max:9', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users', 'regex:/(.*)@sense-son\.com$/i'],
            'url_file' => ['nullable', 'file', 'mimes:pdf'],
            'phone_number' => ['nullable', 'string', 'min:9', 'max:9'],
            'currently_working' => ['required', 'boolean'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $graduate = new User();
        $graduate->first_name = $request->input('first_name');
        $graduate->last_name = $request->input('last_name');
        $graduate->dni = $request->input('dni');
        $graduate->email = $request->input('email');
        $graduate->phone_number = $request->input('phone_number');
        $graduate->currently_working = $request->input('currently_working');
        $graduate->url_file = "";
        $graduate->coordinator = 0;
        $graduate->password = Hash::make($request->input('password'));

        $graduate->save();

        return redirect(route('graduates'))->with('message', "El titulat ".$graduate->first_name." ".$graduate->last_name." ha estat afegit correctament.");
    }

    public function deleteGraduate($id) {
        $graduate = User::findOrFail($id);

        if ($graduate->offers->count() > 0) {
            return redirect(route('graduates'))->with('error', "El titulat ".$graduate->first_name." ".$graduate->last_name." no es pot eliminar, ja que té ofertes enviades.");
        }

        else {
            if (UserStudy::where('user_id', $id)->count() > 0) {
                $studies = UserStudy::where('user_id', $id)->get();

                foreach ($studies as $study) {
                    $study->delete();
                }
            }

            $graduate->delete();
            return redirect(route('graduates'))->with('message', "El titulat ".$graduate->first_name." ".$graduate->last_name." s'ha eliminat correctament.");
        }
    }

    public function deleteGraduateStudy($graduate_id, $study_id) {
        $graduate_study = UserStudy::where('user_id', $graduate_id)->where('study_id', $study_id)->firstOrFail();
        $graduate_study->delete();

        return redirect(route('graduate.edit', $graduate_id))->with('message', "Estudi borrat correctament.");
    }
}
