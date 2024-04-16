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
                                <h5 class="card-title text-truncate">{{ $lastAdded->name }} - SUPER SNIZENJE</h5>
                            @else
                                <h5 class="card-title text-truncate">{{ $lastAdded->name }}</h5>
                            @endif
                            <p class="card-text text-truncate">{{ $lastAdded->description }}</p>
                            <p class="card-text text-truncate">${{ $lastAdded->price }}</p>
                            <a href="#" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    <form method="POST" action="/send-contact">

        @if($errors->any())
            <p>Greska: {{ $errors->first() }}</p>
        @endif

        @csrf <!-- dodatni sloj sigurnosti, ako nema ovo izbacuje gresku 419 Page Expired -->
        <input type="email" name="email" placeholder="Unesite vasu email adresu">
        <input type="text" name="subject" placeholder="Unesite naslov poruke">
        <input type="text" name="description">
        <button>Posalji poruku</button>
    </form>
@endsection
</body>
</html>
