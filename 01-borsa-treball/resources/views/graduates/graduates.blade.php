@extends('layouts.app')

@section('title')
    Borsa de treball | Titulats
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.message')
                <div class="card">
                    <div class="card-body">
                        <strong>Titulats</strong>
                        <a class="btn btn-sm btn-dark float-end" href="{{ route('graduate.add') }}" role="button">Afegir Titulat</a>
                    </div>
                </div>

                <br/>

                @foreach($graduates as $graduate)
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <h4>{{ $graduate->first_name }} {{ $graduate->last_name }}</h4>
                                <strong>DNI:</strong> {{ $graduate->dni }}
                                <br/>
                                @if ($graduate->phone_number)
                                    <strong>Telèfon Mòbil:</strong> {{ $graduate->phone_number }}
                                    <br/>
                                @endif
                                <strong>Esta buscant feina:</strong> @if ($graduate->currently_working == 1) Si
                                @else
                                    No
                                @endif
                                <br/>
                                <strong>Estudis:</strong> @foreach($graduate->userStudy as $offer_studies) {{ $offer_studies->study->name }}, @endforeach
                                <br/>
                                <strong>Ofertes rebudes:</strong> {{ $graduate->offers->count() }}
                                <br/>
                                <p></p>
                                <strong>Currículum Vítae:</strong>
                                <a target="_blank" href="{{ route('fitxa.curriculum', $graduate->url_file) }}" class="text-decoration-none text-black"><p><em>{{ $graduate->url_file }}</em></p></a>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <strong>Correu de contacte:</strong> {{ $graduate->email }}

                            <a class="btn btn-sm btn-danger float-end" href="{{ route('graduate.delete', $graduate->id) }}" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>

                            <a class="btn btn-sm btn-dark float-end me-2" href="{{ route('graduate.edit', $graduate->id) }}" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
