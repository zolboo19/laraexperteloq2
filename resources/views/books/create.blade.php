@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post</div>
                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="post">
                            @csrf
                            Author:
                            <input type="text" name="author" class="form-control">
                            <br/>
                            Book title:
                            <input type="text" name="title" class="form-control">
                            <br/>
                            <input type="submit" class="btn btn-primary" value="Хадгалах">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection