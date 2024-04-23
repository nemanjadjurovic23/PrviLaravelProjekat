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
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" name="email" id="form4Example2" class="form-control" required/>
                    <label class="form-label" for="form4Example2">Email address</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="subject" id="form4Example1" class="form-control" required/>
                    <label class="form-label" for="form4Example1">Subject</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input class="form-control" name="message" id="form4Example3"></input>
                    <label class="form-label" for="form4Example3">Message</label>
                </div>

                <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Send</button>
            </form>
{{--            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6924.306975550561!2d21.27727236513602!3d43.139967612817784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755e346ffbc2aa1%3A0xd7e863de168564dd!2z0JzQsNC90LDRgdGC0LjRgCDQodCy0LXRgtC-0LMg0J3QuNC60L7Qu9C1!5e0!3m2!1ssr!2srs!4v1712568421834!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
        </div>
    @endsection
</body>
</html>
