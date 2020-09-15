@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new Book</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('book.store')}}">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="book_title" value="{{old('book_title')}}">
                            </div>
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="text" class="form-control" name="book_isbn" value="{{old('book_isbn')}}">
                            </div>
                            <div class="form-group">
                                <label>Pages</label>
                                <input type="text" class="form-control" name="book_pages" value="{{old('book_pages')}}">
                            </div>
                            <textarea name="book_short_description" id="summernote"></textarea>
                            <select class="form-control my-2" name="author_id">
                                @foreach ($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                                @endforeach
                            </select>
                            @csrf
                            <button class="btn btn-primary" type="submit">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>
@endsection
