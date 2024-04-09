<!doctype html>
<head>
    @section("title")
        Shop
    @endsection
</head>
<body>
    @extends("layout")

    @section("sadrzajStranice")

        @foreach($products as $product)
            @if($product == "iPhone 14" || $product == "iPhone 13 pro")
                <p>{{$product}} - SUPER SNIZENJE</p>
            @else
                <p>{{$product}}</p>
            @endif
        @endforeach

    @endsection
</body>
</html>
