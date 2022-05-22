<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\UserStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class FitxaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editFitxa() {
        return view('fitxa', [
            'user' => Auth::user(),
        ]);
    }

    public function updateFitxa(Request $request) {
        $validation =  $this->validate($request, [
            'first_name' => ['required', 'string', 'min:1', 'max:50'],
            'last_name' => ['required', 'string', 'min:1', 'max:100'],
            'dni' => ['required', 'string', 'min:9', 'max:9', 'unique:users,dni,'.Auth::user()->id],
            'email' => ['required', 'string', 'email', 'min:10', 'max:100', 'unique:users,email,'.Auth::user()->id, 'regex:/(.*)@sense-son\.com$/i'],
            'url_file' => ['nullable', 'file', 'mimes:pdf'],
            'phone_number' => ['nullable', 'string', 'min:9', 'max:9'],
            'currently_working' => ['required', 'boolean'],
        ]);

        $user = Auth::user();

        if ($request->hasFile('url_file')) {
            $file = $request->file('url_file');
            $file_name = time().$file->getClientOriginalName();
            Storage::disk('documents')->put($file_name, File::get($file));

            $user->url_file = $file_name;
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->dni = $request->input('dni');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->currently_working = $request->input('currently_working');

        $user->update();

        return redirect(route('fitxa'))->with('message', "Les dades s'han actualitzat correctament.");
    }

    public function getCurriculum($filename) {
        return response(Storage::disk('documents')->get($filename), 200)->header('Content-Type', Storage::disk('documents')->mimeType($filename));
    }

    public function downloadCurriculum($filename) {
        $file = storage_path('/app/documents/').$filename;
        return response()->download($file);
    }
}
