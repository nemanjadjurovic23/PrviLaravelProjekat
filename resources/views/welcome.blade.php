<!doctype html>
<head>
    @section("title")
        Home
    @endsection
</head>
<body>
    @extends("layout")

    @section("sadrzajStranice")

        @if ($sat >= 0 && $sat<= 12)
            <p>Dobro jutro</p>
        @else
            <p>Dobar dan</p>
        @endif

        <p>Trenutno vreme je: {{$trenutnoVreme}}</p>
        <p>Sad je: {{$sat}}h</p>

        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                @if(stripos($product->name, "Iphone") !== false)
                                    <h5 class="card-title">{{ $product->name }} - SUPER SNIZENJE</h5>
                                @else
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                @endif
                                    <p class="card-text">{{ $product->description }}</p>
                                    <a href="#" class="btn btn-primary">Order</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    @endsection
</body>
</html>
