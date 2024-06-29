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
                            <a href="#" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    </div>

    <div class="container">
        <h3>Contact Form</h3>
        <form method="POST" action="{{ route('contact.send') }}" class="mt-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                           placeholder="Email">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="subject" class="form-label">Title</label>
                    <input type="text" name="subject" id="subject" class="form-control"
                           placeholder="Title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Message</label>
                    <textarea name="description" id="description" class="form-control"
                              placeholder="Message"></textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>

@endsection
</body>
</html>
