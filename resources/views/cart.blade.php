@extends("layout")

@section("sadrzajStranice")
    @foreach($combined as $item)
        <p>{{ $item['name'] }}</p>
        <p>{{ $item['amount'] }}</p>
        <p>{{ $item['price'] }}</p>
        <p>{{ $item['total'] }}</p>
    @endforeach

@endsection

