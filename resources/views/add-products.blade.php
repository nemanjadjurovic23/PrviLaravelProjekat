<head>
    @section("title")
        Add Products
    @endsection
</head>

<body>
@extends("layout")

@section("sadrzajStranice")
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/admin/add-products">
                        @if($errors->all->any())
                            @foreach($errors as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif

                        @csrf
                        <input name="name" type="text" placeholder="Insert product name" value="{{old("name")}}">
                        <input name="description" type="text" placeholder="Insert product description" value="{{old('description')}}">
                        <input name="amount" type="number" placeholder="Insert product amount" value="{{old('amount')}}">
                        <input name="price" type="number" placeholder="Insert product's price" value="{{old('price')}}">
                        <input name="image" type="text" placeholder="Insert product image" value="{{old('image')}}">
                        <button>Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
