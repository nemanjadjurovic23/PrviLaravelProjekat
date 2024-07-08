<head>
    @section("title")
        Add Products
    @endsection
</head>

<body>
@extends("layout")

@section("sadrzajStranice")
    <div class="container mt-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
                        @csrf
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif

                        <input name="name" type="text" placeholder="Insert product name" value="{{ old('name') }}">
                        <input name="description" type="text" placeholder="Insert product description" value="{{ old('description') }}">
                        <input name="amount" type="number" placeholder="Insert product amount" value="{{ old('amount') }}">
                        <input name="price" type="number" placeholder="Insert product's price" value="{{ old('price') }}">
                        <input name="image" type="file" placeholder="Upload product image">
                        <button>Add Product</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
</body>
