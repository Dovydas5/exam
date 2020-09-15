@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Authors</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{$author->name}}</td>
                                    <td>{{$author->surname}}</td>
                                    <td>
                                        <form method="POST" action="{{route('author.destroy', [$author])}}">
                                            <a class="btn btn-success"
                                               href="{{route('author.edit',[$author])}}"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            @csrf
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"
                                                                                            aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
