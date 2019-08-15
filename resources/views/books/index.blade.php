@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Books list</div>
                    <div class="card-body">
                        <a href="{{ route('books.create') }}" class="btn btn-primary">Add book</a>
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                            </tr>
                            @foreach($books as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author->name}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection