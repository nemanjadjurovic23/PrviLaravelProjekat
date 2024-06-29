@extends("layout")

@section("sadrzajStranice")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-2 mt-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <h4>${{ $product->price }}</h4>
                        <form method="POST" action="{{ route('cart.add') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="text" name="amount" placeholder="Enter amount">
                            <button>Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

