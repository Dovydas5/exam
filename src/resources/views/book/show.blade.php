@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="card-header text-center h4">{{$book->name}}</div>
                            <div class="card-body">Vardas: {{$book->name}} </div>
                            <div class="card-body">Pavardė: {{$book->surname}}</div>
                            <div class="card-body">Parašyta knyga: {{$book->getBook->title}}</div>

{{--                            <div class="card-body">Miestas kuriame gyvena: {{$book->live}}</div>--}}
{{--                            <div class="card-body">Klube registruotas metais: {{$book->registered}} &#8364</div>--}}
{{--                            <div class="card-text h3">apie vandens telkini</div>--}}
{{--                            <div class="card-body">Pavadinimas: {{$book->getReservoir->title}} g</div>--}}
{{--                            <div class="card-body">Plotas kv km: {{$book->getReservoir->area}} g</div>--}}
{{--                            <div class="card-body">Aprašymas:{!! $book->getReservoir->about !!}</div>--}}
                            <a href="{{route('book.index')}}" class="btn btn-primary">Atgal</a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
