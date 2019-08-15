@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Role</th>
                            <th>Posts</th>
                        </tr>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach ($role->posts as $post)
                                        {{$post->title}} <br>
                                    @endforeach
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
