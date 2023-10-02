@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-5">

        <h2 class="">Create Product</h2>
        <hr>

        <h4 class="text-center text-success">{{Session::get('message')}}</h4>

        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}" id="title" placeholder="Enter title">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" value="{{old('price')}}" id="price" placeholder="Enter price">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Enter Description">{{old('description')}}</textarea>

                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Choose Picture</label>
                <input class="form-control-file" type="file" name="picture" id="picture">
                @error('picture')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>

    </div>


@endsection


