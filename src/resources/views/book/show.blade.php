@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="card-header text-center h4">{{$book->title}}</div>
                            <div class="card-body">Vardas: {{$book->getAuthor->name}} </div>
                            <div class="card-body">Pavardė: {{$book->getAuthor->surname}}</div>
                            <div class="card-body">Parašyta knyga: {{$book->title}}</div>

                            <div class="card-text h3">Apie Knygą:</div>
                            <div class="card-body">Pavadinimas: {{$book->title}} g</div>
                            <div class="card-body">Puslapių kiekis: {{$book->pages}}</div>
                            <div class="card-body">Knygos ISBN: {{$book->isbn}}</div>
                            <div class="card-body">Knygos aprašymas: {{$book->short_description}}</div>
                            <a href="{{route('book.index')}}" class="btn btn-primary">Atgal</a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
