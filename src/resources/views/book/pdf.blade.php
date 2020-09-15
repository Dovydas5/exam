<!doctype html>
<html class="no-js" lang="sk">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style type="text/css">
        * {
            font-family: "DejaVu Sans Mono", monospace;
        }
    </style>
</head>
<body>

<h1>Knygos pavadinimas: {{$book->title}}</h1>
<div class="card-body">Autoriaus vardas: {{$book->getAuthor->name}} </div>
<div class="card-body">Autoriaus pavardė: {{$book->getAuthor->surname}}</div>
<div class="card-body">Parašyta knyga: {{$book->title}}</div>

<h3>Apie Knygą:</h3>
<div class="card-body">Pavadinimas: {{$book->title}}</div>
<div class="card-body">Puslapių kiekis: {{$book->pages}} psl.</div>
<div class="card-body">Knygos ISBN: {{$book->isbn}}</div>
<div class="card-body">Knygos aprašymas: {!! $book->short_description !!}</div>
</body>
</html>
