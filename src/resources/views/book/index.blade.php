@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="my-2" action="{{route('book.index')}}" method="GET">
                    <div class="input-group">
                        <select class="form-control mr-2" name="author_id">
                            <option value="0">Pasirinkite autorių</option>
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}"
                                        @if($selectId == $author->id) selected @endif>{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-secondary mr-1">Show</button>
                        <a href="{{route('book.index')}}" class="btn btn-secondary">All</a>
                    </div>
                </form>
                @if (count($books))
                    <div class="card">
                        <div class="card-header">All Books</div>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Title</th>
                                    <th>ISBN</th>
                                    <th>Pages</th>
                                    <th>Author name</th>
                                    <th>About</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{$book->title}}</td>
                                        <td>{{$book->isbn}}</td>
                                        <td>{{$book->pages}}</td>
                                        <td>{{$book->getAuthor->name}}</td>
                                        <td>{!!$book->short_description !!}</td>
                                        <td style='white-space: nowrap'>
                                            <form method="POST"
                                                  action="{{route('book.destroy', [$book])}}">
                                                <a class="btn btn-info" role="button"
                                                   href="{{route('book.createPDF', [$book])}}"><i
                                                        class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-primary" role="button"
                                                   href="{{route('book.show', [$book])}}"><i
                                                        class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-success" role="button"
                                                   href="{{route('book.edit',[$book])}}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                @csrf
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"
                                                                                                aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            @else
                                <div class="card">
                                    <div class="p-4">Nerasta autoriaus knygų</div>
                                </div>
                            @endif
                        </div>
                        <br>
                    </div>
            </div>
        </div>
    </div>
@endsection
