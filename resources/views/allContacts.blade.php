
@section("title")

@endsection

@extends("layout")

@section("sadrzajStranice")
        <div class="container">
            <div class="row">
                @foreach($allContacts as $contact)
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <p>{{$contact->email}}</p>
                            <p>{{$contact->subject}}</p>
                            <p>{{$contact->message}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection
