@extends('layouts.app')

@section('title')
    @if ($user->coordinator == 0)
        Borsa de treball | Ofertes Rebudes
    @else
        Borsa de treball | Ofertes Pendents d'Enviar
    @endif
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')

            <div class="card">
                @if ($user->coordinator == 0)
                    <div class="card-body">
                        <strong>Ofertes Rebudes</strong>
                        @foreach($user->userStudy as $user_study)
                            <a class="btn btn-sm btn-dark float-end me-2" href="{{ route('home.filter', $user_study->study->id) }}" role="button">{{ $user_study->study->name }}</a>
                        @endforeach
                        <a class="btn btn-sm btn-dark float-end me-2" href="{{ route('home') }}" role="button">Tots</a>
                        <span class="float-end me-3">Filtre:</span>
                    </div>
                @else
                    <div class="card-body">
                        <strong class="mb-5">Ofertes Pendents d'Enviar</strong>
                        <a class="btn btn-sm btn-dark float-end" href="{{ route('offers.send') }}" role="button">Enviar</a>
                    </div>
                @endif
            </div>

            <br>

            @if ($user->coordinator == 0)
                @foreach($user->offers as $offers_user)
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <h4>{{ $offers_user->title }}</h4>
                                <strong>Empresa:</strong> {{ $offers_user->company->name }}
                                <br/>
                                <strong>Anys d'experiència:</strong> {{ $offers_user->experience }} any/s
                                <br/>
                                <strong>Salari anual:</strong> {{ $offers_user->annual_salary }} € Brut/any
                                <br/>
                                <strong>Estudis:</strong> @foreach($offers_user->studies as $offer_studies) {{ $offer_studies->name }}, @endforeach
                                <p></p>
                                <strong>Descripció:</strong>
                                <p>{{ $offers_user->description }}</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <strong>Correu de contacte:</strong> {{ $offers_user->company->email }}
                        </div>
                    </div>

                    <br>
                @endforeach
            @else
                @foreach($offers as $offer)
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <h4>{{ $offer->title }}</h4>
                                <strong>Empresa:</strong> {{ $offer->company->name }}
                                <br/>
                                <strong>Anys d'experiència:</strong> {{ $offer->experience }} any/s
                                <br/>
                                <strong>Salari anual:</strong> {{ $offer->annual_salary }} € Brut/any
                                <br/>
                                <strong>Estudis:</strong> @foreach($offer->studies as $offer_studies) {{ $offer_studies->name }}, @endforeach
                                <p></p>
                                <strong>Descripció:</strong>
                                <p>{{ $offer->description }}</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <strong>Correu de contacte:</strong> {{ $offer->company->email }}
                        </div>
                    </div>

                    <br>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
