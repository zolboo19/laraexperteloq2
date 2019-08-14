@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post</div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="post">
                            @csrf
                            Title:
                            <input type="text" name="title" class="form-control">
                            <br/>
                            Comma seperated value:
                            <input type="text" name="photos" class="form-control">
                            <br/>
                            <input type="submit" class="btn btn-primary" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection