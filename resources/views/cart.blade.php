@extends("layout")

@section("sadrzajStranice")

    @foreach($cart as $product)
        <p>{{ $product['product_id'] }}</p>
        <p>{{ $product['amount'] }}</p>
    @endforeach

@endsection

