@extends("layout")

@section("sadrzajStranice")
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-body text-center">
                            @foreach($combined as $item)
                                <h5 class="card-title">{{ $item['name'] }}</h5>
                                <img src="{{ asset('storage/' . $item['image']) }}" class="img-fluid"/>
                                <p class="card-text">Amount: {{ $item['amount'] }}</p>
                                <p class="card-text">Price: {{ $item['price'] }}</p>
                                <p class="card-text">Total: {{ $item['total'] }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
