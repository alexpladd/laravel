@extends('layouts.app')

@section('title')
    Editar Oferta | {{ $offer->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.message')

                <div class="card">
                    <div class="card-header">Editar Oferta: {{ $offer->title }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('offer.update', $offer->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Títol de l'oferta</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $offer->title }}" required autocomplete="title" autofocus placeholder="Escriu el títol de l'oferta">

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
                                        <option value="{{ $offer->company_id }}">{{ $offer->company->name }}</option>
                                        @foreach($companies as $company)
                                            @if ($company->id != $offer->company_id)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="experience" class="col-md-4 col-form-label text-md-end">Anys d'experiència</label>

                                <div class="col-md-6">
                                    <input id="experience" type="number" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ $offer->experience }}" required autocomplete="experience" autofocus placeholder="Escriu els anys d'experiència que demana l'oferta">

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
                                    <input id="annual_salary" type="number" class="form-control @error('annual_salary') is-invalid @enderror" name="annual_salary" value="{{ $offer->annual_salary }}" required autocomplete="annual_salary" autofocus placeholder="Escriu el salari anual de l'oferta">

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
                                        <option class="font-italic" value="0">Tria els estudis per l'oferta</option>
                                        @foreach($not_studies as $not_study)
                                            <option value="{{ $not_study->id }}">{{ $not_study->name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="col-6 mt-2">
                                        @foreach($offer->studies as $offer_study)
                                            <p><a href="{{ route('offer.delete.study', [$offer->id, $offer_study->id]) }}" class="text-decoration-none link-dark"><b><em>{{ $offer_study->name }}</em></b></a></p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Descripció de l'oferta</label>

                                <div class="col-md-6">
                                    <textarea id="description" rows="6" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus placeholder="Descripció de l'oferta">{{ $offer->description }}</textarea>

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
                                        Desar els canvis
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
