@extends('layouts.app')

@section('title')
    Editar Titulat | {{ $graduate->first_name }} {{ $graduate->last_name }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.message')

                <div class="card">
                    <div class="card-header">Editar Titulat: {{ $graduate->first_name }} {{ $graduate->last_name }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('graduate.update', $graduate->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $graduate->first_name }}" required autocomplete="first_name" autofocus placeholder="Escriu el nom">

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Cognoms') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $graduate->last_name }}" required autocomplete="last_name" autofocus placeholder="Escriu els cognoms">

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('DNI') }}</label>

                                <div class="col-md-6">
                                    <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $graduate->dni }}" required autocomplete="dni" autofocus placeholder="Escriu el DNI">

                                    @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correu Electrònic') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $graduate->email }}" required autocomplete="email" placeholder="Escriu el email del titulat">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Telèfon Mòbil') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $graduate->phone_number }}" placeholder="Escriu el telèfon mòbil">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="currently_working" class="col-md-4 col-form-label text-md-end">{{ __('Busca feina?') }}</label>

                                <div class="col-md-6">
                                    <select id="currently_working" class="form-control @error('currently_working') is-invalid @enderror" name="currently_working" required autocomplete="currently_working" autofocus>
                                        @if ($graduate->currently_working == 1)
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        @endif
                                    </select>

                                    @error('currently_working')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="study_id" class="col-md-4 col-form-label text-md-end">Estudis del titulat</label>

                                <div class="col-md-6">
                                    <select id="study_id" class="form-control" name="study_id" required autocomplete="study_id" autofocus>
                                        <option class="font-italic" value="0">Tria els estudis pel titulat</option>
                                        @foreach($not_studies_graduate as $not_study)
                                            <option class="font-italic" value="{{ $not_study->id }}">{{ $not_study->name }}</option>
                                        @endforeach
                                    </select>

                                    <input id="promotion_year" type="number" class="form-control @error('promotion_year') is-invalid @enderror mt-2" name="promotion_year" autocomplete="promotion_year" autofocus placeholder="Escriu l'any de promoció de l'estudi">

                                    @error('promotion_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="col-6 mt-2">
                                        @foreach($graduate->UserStudy as $study_graduate)
                                            <p><a href="{{ route('graduate.delete.study', [$graduate->id, $study_graduate->study->id]) }}" class="text-decoration-none link-dark"><b><em>{{ $study_graduate->study->name }} ({{ $study_graduate->promotion_year }})</em></b></a></p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="url_file" class="col-md-4 col-form-label text-md-end">{{ __('Currículum Vítae') }}</label>

                                <div class="col-md-6">
                                    <input id="url_file" type="file" class="form-control @error('url_file') is-invalid @enderror" name="url_file">

                                    <div class="col-6 mt-2">
                                        <p><a target="_blank" href="{{ route('fitxa.curriculum', $graduate->url_file) }}" class="text-decoration-none link-dark"><b><em>{{ $graduate->url_file }}</em></b></a></p>
                                    </div>

                                    @error('url_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Desar els canvis') }}
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
