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
            <div class="col-lg-6 col-xl-5 mx-auto">
                <form class="search__form" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control search__input" placeholder="Zadajte názov" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
