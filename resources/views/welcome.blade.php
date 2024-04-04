<!doctype html>
<head>
    @section("title")
        Home
    @endsection
</head>
<body>
    @extends("layout")

    @section("sadrzajStranice")

        {{--            <p>Trenutno vreme je: {{ date("h:i:s") }}</p>--}}
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center bg-light p-4 rounded shadow">
                    <h3>Do kraja kursa je ostalo</h3>
                    <h1 id="countdown"></h1>
                </div>
            </div>
        </div>

        <script src="{{asset("js/countdown.js")}}"></script>
    @endsection
</body>
</html>
