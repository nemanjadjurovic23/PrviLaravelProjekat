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
                        @if($errors->any())
                            <p>Greska: {{ $errors->first() }}</p>
                        @endif

                        @csrf
                        <input name="name" type="text" placeholder="Inser product name">
                        <input name="description" type="text" placeholder="Insert product description">
                        <input name="amount" type="number" placeholder="Insert product amount">
                        <input name="price" type="number" placeholder="Insert product's price">
                        <input name="image" type="text" placeholder="Insert product image">
                        <button>Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
