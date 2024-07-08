<!doctype html>
<head>
    @section("title")
        Shop
    @endsection
</head>
<body>
@extends("layout")

@section("sadrzajStranice")

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Amount</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->image }}</td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('product.delete', ['product' => $product->id]) }}">Delete</a>
                        <a class="btn btn-success" href="{{ route("product.edit", ['product' => $product->id]) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
</body>
</html>
