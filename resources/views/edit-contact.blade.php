@section("title", "edit-contact")

@extends("layout")

@section("sadrzajStranice")

    <div class="container mt-4">
        <form method="post" action="{{ route('updateContact', $singleContact->id) }}">
            @csrf
            @method("put")
            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Edit your email"
                           value="{{ $singleContact->email }}">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Edit your subject"
                           value="{{ $singleContact->subject }}">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <textarea name="message" id="message" class="form-control"
                              placeholder="Edit your message">{{ $singleContact->message }}</textarea>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-2 text-center">
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                </div>
            </div>

        </form>
    </div>
@endsection
