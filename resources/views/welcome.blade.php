<!doctype html>
<head>
    @section("title")
        Home
    @endsection
</head>
<body>
@extends("layout")

@section("sadrzajStranice")

    <div class="container">
        <div class="row">
            @foreach($latestAdded as $lastAdded)
                <div class="col-md-4 mb-2 mt-4">
                    <div class="card">
                        <div class="card-body">
                            @if(stripos($lastAdded->name, "Iphone") !== false)
                                <h5 class="card-title text-truncate">{{ $lastAdded->name }} - SUPER SALE</h5>
                            @else
                                <h5 class="card-title text-truncate">{{ $lastAdded->name }}</h5>
                            @endif
                            <p class="card-text text-truncate">{{ $lastAdded->description }}</p>
                            <p class="card-text text-truncate">${{ $lastAdded->price }}</p>
                            <img class="img-fluid" src="{{ asset('storage/' . $lastAdded->image) }}" alt="{{ $lastAdded->name }}" />
                            <a href="#" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
</body>
</html>
