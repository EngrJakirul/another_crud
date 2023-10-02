@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-2">All Products</h1>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            <h4 class="text-center text-success">{{Session::get('message')}}</h4>

            <div class="col-md-6" style="display:flex">
                @foreach ($products as $product)
                    <div class="card m-2 p-2" style="width: 18rem;">
                        <img src="{{asset('images/'.$product->picture)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <h5 class="card-title">Price: ${{ $product->price }}</h5>
                            <hr>
                            <p class="card-text">{{ $product->description}} </p>
                            <a href="{{route('product.detail',$product->id)}}" class="btn btn-primary">Detail's</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
