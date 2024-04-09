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
            @foreach($products as $product)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <script src="{{asset("js/countdown.js")}}"></script>
    @endsection
</body>
</html>
