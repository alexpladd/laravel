@extends('layouts.app')

@section('title')
    Borsa de treball | Afegir Oferta
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Afegir Oferta</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('offer.save') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Títol de l'oferta</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title" autofocus placeholder="Escriu el títol de l'oferta">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="company_id" class="col-md-4 col-form-label text-md-end">Empresa de l'oferta</label>

                                <div class="col-md-6">
                                    <select id="company_id" class="form-control" name="company_id" required autocomplete="company_id" autofocus>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="experience" class="col-md-4 col-form-label text-md-end">Anys d'experiència</label>

                                <div class="col-md-6">
                                    <input id="experience" type="number" class="form-control @error('experience') is-invalid @enderror" name="experience" required autocomplete="experience" autofocus placeholder="Escriu els anys d'experiència que demana l'oferta">

                                    @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="annual_salary" class="col-md-4 col-form-label text-md-end">Salari anual</label>

                                <div class="col-md-6">
                                    <input id="annual_salary" type="number" class="form-control @error('annual_salary') is-invalid @enderror" name="annual_salary" required autocomplete="annual_salary" autofocus placeholder="Escriu el salari anual de l'oferta">

                                    @error('annual_salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="study_id" class="col-md-4 col-form-label text-md-end">Estudis de l'oferta</label>

                                <div class="col-md-6">
                                    <select id="study_id" class="form-control" name="study_id" required autocomplete="study_id" autofocus>
                                        @foreach($studies as $study)
                                            <option value="{{ $study->id }}">{{ $study->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Descripció de l'oferta</label>

                                <div class="col-md-6">
                                    <textarea id="description" rows="6" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus placeholder="Descripció de l'oferta"></textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        Afegir oferta
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
