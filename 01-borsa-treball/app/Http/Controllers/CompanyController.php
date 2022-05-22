<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Offer;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCompanies() {
        $companies = Company::all();

        return view('companies.companies', [
           'companies' => $companies
        ]);
    }

    public function addCompany() {
        return view('companies.add_company');
    }

    public function saveCompany(Request $request) {
        $validation =  $this->validate($request, [
            'name' => ['required', 'string', 'min:1', 'max:100'],
            'description' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'min:5', 'max:100', 'unique:companies'],
        ]);

        $company = new Company();
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->email = $request->input('email');

        $company->save();

        return redirect(route('companies'))->with('message', "L'empresa ".$company->name." ha estat afegida correctament.");
    }

    public function editCompany($id) {
        $company = Company::findOrFail($id);

        return view('companies.edit_company', [
            'company' => $company
        ]);
    }

    public function updateCompany(Request $request, $id) {
        $validation =  $this->validate($request, [
            'name' => ['required', 'string', 'min:1', 'max:100'],
            'description' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'min:5', 'max:100', 'unique:companies,email,'.Company::findOrFail($id)->id],
        ]);

        $company = Company::findOrFail($id);
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->email = $request->input('email');

        $company->update();

        return redirect(route('company.edit', $company->id))->with('message', "Les dades de l'empresa ".$company->name." s'han actualitzat correctament.");
    }

    public function deleteCompany($id) {
        $company = Company::findOrFail($id);

        if (Offer::where('company_id', $id)->count() > 0) {
            return redirect(route('companies'))->with('error', "L'empresa ".$company->name." no es pot eliminar, ja que té ofertes relacionades.");
        }

        else {
            $company->delete();
            return redirect(route('companies'))->with('message', "L'empresa ".$company->name." s'ha eliminat correctament.");
        }
    }
}
