<!doctype html>
<head>
    @section("title")
        Contact
    @endsection
</head>
<body>
    @extends("layout")

    @section("sadrzajStranice")
        <div class="container">
            <form style="width:40rem;" class="mx-auto mt-4">
                <!-- Name input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form4Example1" class="form-control" required/>
                    <label class="form-label" for="form4Example1">Name</label>
                </div>

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form4Example2" class="form-control" required/>
                    <label class="form-label" for="form4Example2">Email address</label>
                </div>

                <!-- Message input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                    <label class="form-label" for="form4Example3">Message</label>
                </div>

                <!-- Submit button -->
                <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Send</button>
            </form>
        </div>
    @endsection
</body>
</html>
