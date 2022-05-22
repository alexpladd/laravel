@extends('layouts.app')

@section('title')
    La Meva Fitxa | {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.message')

                <div class="card">
                    <div class="card-header">La Meva Fitxa</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('fitxa.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus placeholder="Escriu el teu nom">

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
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus placeholder="Escriu els teus cognoms">

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
                                    <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $user->dni }}" required autocomplete="dni" autofocus placeholder="Escriu el teu DNI">

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="Escriu el teu email de l'institut">

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
                                    <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" placeholder="Escriu el teu telèfon mòbil">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @if ($user->coordinator == 0)
                                <div class="row mb-3">
                                    <label for="currently_working" class="col-md-4 col-form-label text-md-end">{{ __('Busques feina?') }}</label>

                                    <div class="col-md-6">
                                        <select id="currently_working" class="form-control @error('currently_working') is-invalid @enderror" name="currently_working" required autocomplete="currently_working" autofocus>
                                            @if ($user->currently_working == 1)
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
                                    <label class="col-md-4 col-form-label text-md-end">Estudis</label>

                                    <div class="col-md-6">
                                        <div class="col-6 mt-2">
                                            @foreach($user->UserStudy as $user_study)
                                                <p><b><em>{{ $user_study->study->name }}</em></b></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="url_file" class="col-md-4 col-form-label text-md-end">{{ __('Currículum Vítae') }}</label>

                                    <div class="col-md-6">
                                        <input id="url_file" type="file" class="form-control @error('url_file') is-invalid @enderror" name="url_file">

                                        <div class="col-6 mt-2">
                                            <p><a target="_blank" href="{{ route('fitxa.curriculum', $user->url_file) }}" class="text-decoration-none link-dark"><b><em>{{ $user->url_file }}</em></b></a></p>
                                        </div>

                                        @error('url_file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @else
                                <input id="currently_working" type="hidden" name="currently_working" value="0">
                            @endif

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
