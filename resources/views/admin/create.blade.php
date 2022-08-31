<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        label
        {
            display: inline-block;
            width: 200px;
        }

        input
        {
            display: inline-block;
            width: 200px;
        }

    </style>
</head>
<body>
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                <div class="ps-lg-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                        <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                    <button id="bannerClose" class="btn border-0 p-0">
                        <i class="mdi mdi-close text-white me-0"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <div class="container" align="center" style="padding-top: 60px">

            @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible" role="alert">

                    {{session()->get('message')}}

                    <button type="button" class="btn-close" data-dismiss="alert">
                        X
                    </button>

                </div>

            @endif

            {!! Form::open(['method'=>'POST', 'action'=> \App\Http\Controllers\AdminController::class."@store",'files'=>true]) !!}

            @csrf

                <div class="row mb-3" style="padding: 10px">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Doctor Name</label>

                    <div class="col-md-6">
                        <input id="name" placeholder="name" type="text" style="color: white" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3" style="padding: 10px">
                    <label for="email"  class="col-md-4 col-form-label text-md-end">Email</label>

                    <div class="col-md-6">
                        <input id="email" placeholder="email" type="email" style="color: white" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3" style="padding: 10px">
                    <label for="phone" class="col-md-4 col-form-label text-md-end">Phone</label>

                    <div class="col-md-6">
                        <input id="phone" placeholder="phone" type="number" style="color: white" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3" style="padding: 10px">
                    <label for="room" class="col-md-4 col-form-label text-md-end">Room</label>

                    <div class="col-md-6">
                        <input id="room" type="number" placeholder="room" style="color: white" class="form-control @error('room') is-invalid @enderror" name="room" value="{{ old('room') }}" required autocomplete="room" autofocus>

                        @error('room')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 form-group" style="padding: 10px">
                    <label for="speciality" class="col-md-4 col-form-label text-md-end">Speciality</label>

                    <select name="speciality" class="col-md-6 bg-black text-white">
                        <option value="" disabled >Speciality</option>
                        <option value="skin">skin</option>
                        <option value="heart">heart</option>
                        <option value="eye">eye</option>
                        <option value="nose" >nose</option>
                    </select>
                </div>

                <div class="row mb-3" style="padding: 10px">
                    <label for="image" class="col-md-4 col-form-label text-md-end">Doctor Image</label>

                    <div class="col-md-6">
                        {!! Form::file('image', ['class'=>'form-control', 'required'=>true])!!}

                    </div>

                </div>

                <div class="row mb-5" style="padding: 15px">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary px-5 py-2">
                            {{ __('Submit') }}
                        </button>
                    </div>

                    {!! Form::close() !!}
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.js')
<!-- End custom js for this page -->
</body>
</html>


{{--//        $data = request()->validate([--}}
{{--//           'name' => ['required', 'string', 'max:255'],--}}
{{--//           'email' => ['required', 'email'],--}}
{{--//           'phone' => ['required', 'min:8'],--}}
{{--//           'room' => ['required', 'string'],--}}
{{--//           'speciality' => ['required', 'string'],--}}
{{--//           'image' => ['required', 'image'],--}}
{{--//        ]);--}}
{{--//--}}
{{--//        Doctor::create($data);--}}
