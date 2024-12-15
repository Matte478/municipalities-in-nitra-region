@extends('layout.main')

@section('content')
    <section class="section error-404">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="section__title">Stránka nebola nájdená</h1>
                    <p class="mt-3">Ospravedlňujeme sa, požadovaná stránka neexistuje.</p>
                    <p class="mt-4 mt-sm-5">
                        <a class="btn" href="{{ route('home') }}">Späť na domovskú stránku</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
