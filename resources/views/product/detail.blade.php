@extends('layouts.app')
@section('content')
    <h1 class="text-center mt-2">{{ $product->title }} | Detail</h1>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            <h4 class="text-center text-success">{{Session::get('message')}}</h4>
            <div class="col-md-9" style="display:flex">
                <div class="container m-2 p-2">
                    <img src="/images/{{ $product->picture }}" height="450px" alt="...">
                    <div class="container m-2 p-2">
                        <h2>{{ $product->title }}</h2>
                        <h3>Price: ${{ $product->price }}</h3>
                        <hr>
                        <p>{{ $product->description }}</p>
                        <a href="{{route('product.index')}}" class="btn btn-success">Go Home</a>
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('product.delete', $product->id)}}" class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </script>
@endsection
