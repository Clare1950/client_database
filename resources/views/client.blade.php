<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="{{ url('/favicon.svg')}}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/client.css') }}" />
    <!-- <style type="text/css">
        #map {
            height: 300px;
        }

        body {
            background-image: url("{{ url('/background.jpg')}}");
        }
    </style> -->
    <title>Customer Directory</title>
</head>

@if($layout == 'index')

<body>
    @include("navbar")

    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("clientsList")
            </section>

        </div>
    </div>
    @elseif($layout == 'create')

    <body onLoad="initMap()">
        @include("navbar")

        <div class="container-fluid mt-4 d-flex align-items-center justify-content-center" onLoad="initMap()">



            <div class="card mb-3 w-75">
                <div class="card-header bg-secondary bg-gradient text-white">
                    <h5 class="m-2">Add a new client</h5>
                </div>
                <div class="card-body ">

                    <form action="{{ url('/store') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name" required>
                            <label for="companyName" class="form-label">Company Name</label>
                        </div>
                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                            <label for="firstName" class="form-label">First Name</label>
                        </div>
                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                            <label for="lastName" class="form-label">Last Name</label>
                        </div>
                        <div class="form-floating mb-3">


                            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required />
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">

                            <input id="search-address" name="search-address" type="text" placeholder="Enter an address" class="form-control" required>
                            <label for="search-address" class="form-label">Address</label>
                        </div>

                        <input type="submit" class="btn btn-success" value="Save">
                        <input type="reset" class="btn btn-secondary" value="Reset">
                    </form>
                </div>
            </div>


        </div>

        @elseif($layout == 'show')

        <body>
            @include("navbar")

            <div class="container-fluid mt-4">
                <div class="row">
                    <section class="col">@include("clientsList")</section>
                    <section class="col"></section>
                </div>
            </div>
            @elseif($layout == 'edit')

            <body onLoad="displayMap()">
                @include("navbar")

                <div class="container-fluid mt-4 d-flex align-items-center justify-content-center">



                    <div class="card mb-3 w-50">

                        <div class="card-body ">
                            <div id="map" class="mb-3"></div>
                            <form action="{{ url('/update/' .$client->id) }}" method="post">
                                @csrf
                                <div class="mb-3 form-floating">

                                    <input value="{{ $client->companyName }}" type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name">
                                    <label for="companyName">Company Name</label>
                                </div>
                                <div class="mb-3 form-floating">

                                    <input value="{{ $client->firstName }}" type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                                    <label for="firstName">First Name</label>
                                </div>
                                <div class="mb-3 form-floating">

                                    <input value="{{ $client->lastName }}" type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                                    <label for="lastName">Last Name</label>
                                </div>
                                <div class="mb-3 form-floating">


                                    <input value="{{ $client->phoneNumber }}" type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required />
                                    <label for="phoneNumber">Phone Number</label>
                                </div>
                                <div class="mb-3 form-floating">

                                    <input name="address" value="{{ $client->address }}" id="address" type="text" placeholder="Enter an address" class="form-control">
                                    <label for="address">Address</label>
                                </div>
                                <input type="submit" class="btn btn-success" value="Update">
                                <input type="reset" class="btn btn-secondary" value="Reset">
                            </form>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Optional JavaScript; choose one of the two! -->

                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

             
                  

                  <script type="text/javascript" src="{{('/js/map.js')}}"></script>




             
                <script src="https://kit.fontawesome.com/3aaa915c04.js" crossorigin="anonymous"></script>
                <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>

                <!-- Option 2: Separate Popper and Bootstrap JS -->
                <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
            </body>

</html>