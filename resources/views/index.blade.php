@extends('layout.main')

@section('content')
    <section class="section search">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="section__title search__title">Vyhľadať v&nbsp;databáze obcí</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-lg-6 col-xl-5 mx-auto">
                    <div class="input-group">
                        <input id="search-input" type="text" class="form-control search__input awesomplete"
                            data-suqqestion-url="{{ route('suggestion') }}" placeholder="Zadajte názov" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
