@section("title")

@endsection

@extends("layout")

@section("sadrzajStranice")
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allContacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>
                    <a class="btn btn-danger" href="{{ route('deleteContact', ['contact' => $contact->id]) }}">Delete</a>
                    <a class="btn btn-success" href="{{ route('editContact', ['contact' => $contact->id]) }}">Edit</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
