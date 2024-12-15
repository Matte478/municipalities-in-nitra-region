@extends('layout.main')

@section('content')
    <section class="section detail">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="section__title detail__title">Detail obce</h1>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <div class="card__name">
                            @if ($city->coat_of_arms_path)
                                <img class="card__name_image" src="{{ $city->coat_of_arms_path }}"
                                    alt="{{ $city->name }}" />
                            @endif
                            <h1 class="card__name_title">{{ $city->name }}</h1>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="card__info">
                            <table class="table card__info_table">
                                <tr>
                                    <th class="table__head">Meno startostu:</th>
                                    <td class="table__data">{{ $city->mayor_name }}</td>
                                </tr>
                                <tr>
                                    <th class="table__head">Adresa obecného úradu:</th>
                                    <td class="table__data">
                                        <address>{{ $city->city_hall_address }}</address>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table__head">Telefón:</th>
                                    <td class="table__data">{{ $city->phone }}</td>
                                </tr>
                                <tr>
                                    <th class="table__head">Fax:</th>
                                    <td class="table__data">{{ $city->fax }}</td>
                                </tr>
                                <tr>
                                    <th class="table__head">Email:</th>
                                    <td class="table__data">
                                        @foreach (explode(',', $city->email) as $email)
                                            <a href="mailto:{{ $email }}">{{ $email }}</a>
                                            @if (!$loop->last)
                                                <br />
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table__head">Web:</th>
                                    <td class="table__data">
                                        @foreach (explode(',', $city->web) as $web)
                                            <a href="{{ strpos($web, 'http') === false ? "https://{$web}" : $web }}"
                                                target="_blank">{{ $web }}</a>
                                            @if (!$loop->last)
                                                <br />
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table__head">Zemepisné súradnice:</th>
                                    <td class="table__data">{{ $city->latitude }}, {{ $city->longitude }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
