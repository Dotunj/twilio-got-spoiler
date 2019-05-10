<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOT Spoiler With Twilio</title>
    <!-- Bootstrap styles CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            @include('alert')
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Add Spoiler
                        </div>
                        <div class="card-body">
                            <form action="{{route('create.spoiler')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Enter Spoiler</label>
                                    <input type="text" name="message" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Spoiler</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Spoiler Messages
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label>All Spoilers</label>
                                    <select multiple class="form-control">
                                        @foreach($spoilers as $spoiler)
                                        <option>{{$spoiler->message}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Add Phone Numbers
                        </div>
                        <div class="card-body">
                            <form action="{{route('create.phone.number')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Register Phone Number</label>
                                    <input type="tel" name="phone_number" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Number</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Phone Numbers
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label>All Phone Numbers</label>
                                    <select multiple class="form-control">
                                        @foreach($phoneNumbers as $phoneNumber)
                                        <option> {{$phoneNumber->phone_number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
