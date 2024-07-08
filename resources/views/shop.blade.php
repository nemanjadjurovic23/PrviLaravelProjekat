<!doctype html>
<head>
    @section("title")
        Shop
    @endsection
</head>
<body>
@extends("layout")

@section("sadrzajStranice")

    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-2 mt-4">
                    <div class="card">
                        <div class="card-body">
                            @if(stripos($product->name, "Iphone") !== false)
                                <h5 class="card-title text-truncate">{{$product->name}} - SUPER SALE</h5>
                            @else
                                <h5 class="card-title text-truncate">{{$product->name}}</h5>
                            @endif
                            <p class="card-text text-truncate">{{$product->description}}</p>
                            <p class="card-text text-truncate">${{$product->price}}</p>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                            @endif
                            <a href="{{ route('product.permalink', ['product' => $product->id]) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
</body>
</html>
