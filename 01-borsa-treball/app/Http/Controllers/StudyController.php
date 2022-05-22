<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\UserStudy;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getStudies() {
        $studies = Study::all();

        return view('studies.studies', [
            'studies' => $studies
        ]);
    }

    public function addStudy() {
        return view('studies.add_study');
    }

    public function saveStudy(Request $request) {
        $validation =  $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'duration' => ['required', 'numeric'],
            'description' => ['required', 'string'],
        ]);

        $study = new Study();
        $study->name = $request->input('name');
        $study->duration = $request->input('duration');
        $study->description = $request->input('description');

        $study->save();

        return redirect(route('studies'))->with('message', "L'estudi ".$study->name." ha estat afegit correctament.");
    }

    public function editStudy($id) {
        $study = Study::find($id);

        return view('studies.edit_study', [
            'study' => $study
        ]);
    }

    public function updateStudy(Request $request, $id) {
        $validation =  $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'duration' => ['required', 'numeric'],
            'description' => ['required', 'string'],
        ]);

        $study = Study::findOrFail($id);
        $study->name = $request->input('name');
        $study->duration = $request->input('duration');
        $study->description = $request->input('description');

        $study->update();

        return redirect(route('study.edit', $study->id))->with('message', "Les dades de l'estudi ".$study->name." s'han actualitzat correctament.");
    }

    public function deleteStudy($id) {
        $study = Study::findOrFail($id);

        if (UserStudy::where('study_id', $study->id)->count() > 0 or Study::find($id)->offers->count() > 0) {
            return redirect(route('studies'))->with('error', "L'estudi ".$study->name." no es pot eliminar, ja que té ofertes o usuaris relacionats.");
        }

        else {
            $study->delete();
            return redirect(route('studies'))->with('message', "L'estudi ".$study->name." s'ha eliminat correctament.");
        }
    }
}
