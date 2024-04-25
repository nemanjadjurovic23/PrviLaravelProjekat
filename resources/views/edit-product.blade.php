<!doctype html>
<head>
    @section("title")
        Edit Product
    @endsection
</head>
@extends('layout')

@section('title', 'Edit Product')

@section("sadrzajStranice")
    <div class="container">
        <form method="POST" action="{{ route('updateProduct', $singleProduct->id) }}">
            @csrf
            @method('PUT')
            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $singleProduct->name }}"
                           required>
                </div>

                <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                              required>{{ $singleProduct->description }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount"
                           value="{{ $singleProduct->amount }}"
                           required>
                </div>

                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price"
                           value="{{ $singleProduct->price }}"
                           required>
                </div>

                <div class="form-group col-md-6">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ $singleProduct->image }}"
                           required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
    @endsection
    </body>
    </html>
