@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products list</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Product</th>
                                <th>Photos</th>
                            </tr>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>
                                    @foreach ($product->photos as $photo)
                                        @if ($loop->iteration > 1)
                                            <br>
                                        @endif
                                        {{$photo->filename}}
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