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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('deleteProduct', ['product' => $product->id]) }}">Delete</a>
                        <a class="btn btn-success" href="">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
</body>
</html>
