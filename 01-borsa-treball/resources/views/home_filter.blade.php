@extends('layouts.app')

@section('title')
    Borsa de treball | Ofertes Rebudes
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.message')

                <div class="card">
                    <div class="card-body">
                        <strong>Ofertes Rebudes</strong>
                        @foreach($user->userStudy as $user_study)
                            <a class="btn btn-sm btn-dark float-end me-2" href="{{ route('home.filter', $user_study->study->id) }}" role="button">{{ $user_study->study->name }}</a>
                        @endforeach
                        <a class="btn btn-sm btn-dark float-end me-2" href="{{ route('home') }}" role="button">Tots</a>
                        <span class="float-end me-3">Filtre:</span>
                    </div>
                </div>

                <br>

                @foreach($offers_filter as $offer_filter)
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <h4>{{ $offer_filter->title }}</h4>
                                <strong>Empresa:</strong> {{ $offer_filter->company->name }}
                                <br/>
                                <strong>Anys d'experiència:</strong> {{ $offer_filter->experience }} any/s
                                <br/>
                                <strong>Salari anual:</strong> {{ $offer_filter->annual_salary }} € Brut/any
                                <br/>
                                <strong>Estudis:</strong> @foreach($offer_filter->studies as $offer_studies) {{ $offer_studies->name }}, @endforeach
                                <p></p>
                                <strong>Descripció:</strong>
                                <p>{{ $offer_filter->description }}</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <strong>Correu de contacte:</strong> {{ $offer_filter->company->email }}
                        </div>
                    </div>

                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
