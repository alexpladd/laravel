@extends('layouts.app')

@section('title')
    Editar Estudi | {{ $study->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.message')

                <div class="card">
                    <div class="card-header">Editar Estudi: {{ $study->name }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('study.update', $study->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nom de l'estudi</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $study->name }}" required autocomplete="name" autofocus placeholder="Escriu el nom de l'estudi">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="duration" class="col-md-4 col-form-label text-md-end">Duració de l'estudi</label>

                                <div class="col-md-6">
                                    <input id="duration" type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ $study->duration }}" required autocomplete="duration" autofocus placeholder="Número d'anys de l'estudi">

                                    @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Descripció de l'estudi</label>

                                <div class="col-md-6">
                                    <textarea id="description" rows="6" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus placeholder="Descripció de l'estudi">{{ $study->description }}</textarea>

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
