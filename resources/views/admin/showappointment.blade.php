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
    <div class="container page-body-wrapper">

        <div align="center" style="padding-top: 100px; padding-right: 20px" class="container">

            <table class="table table-bordered">
                <tr style="background-color: black; color: whitesmoke" align="center">
                    <th>Patient</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Approved</th>
                    <th>Canceled</th>
                </tr>
                @foreach($app as $show)
                <tr style="background-color: black; color: whitesmoke">
                        <td>{{ $show->name }}</td>
                        <td>{{ $show->email }}</td>
                        <td>{{ $show->phone }}</td>
                        <td>{{ $show->doctor }}</td>
                        <td>{{ $show->date }}</td>
                        <td>{{ $show->message }}</td>
                        <td>{{ $show->status }}</td>
                        <td>
                            <a class="btn btn-success" href=" {{ route('approved.patient', $show->id) }}">Approved</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href=" {{ route('canceled.patient', $show->id) }}">Canceled</a>
                        </td>
                </tr>
                @endforeach
            </table>
         </div>
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
