
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
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

        @include('admin.sidebar')

        @include('admin.navbar')
        <!-- partial -->
    <div class="container page-body-wrapper">
        <div style="margin-top: 100px" align="center">

            @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible" role="alert">

                    {{session()->get('message')}}

                    <button type="button" class="btn-close" data-dismiss="alert">
                        X
                    </button>

                </div>

            @endif

            <table class="mb-5 table  table-bordered">

                <tr style="background-color: black; color: white">
                    <th style="padding: 10px; font-size: 20px">Name</th>
                    <th style="padding: 10px; font-size: 20px">Email</th>
                    <th style="padding: 10px; font-size: 20px">Phone</th>
                    <th style="padding: 10px; font-size: 20px">Room</th>
                    <th style="padding: 10px; font-size: 20px">Speciality</th>
                    <th style="padding: 10px; font-size: 20px">Image</th>
                    <th style="padding: 10px; font-size: 20px" >Update</th>
                    <th style="padding: 10px; font-size: 20px" >Delete</th>
                </tr>

                @foreach($doctors as $doctor)
                <tr style="background-color: black; color: white">
                    <td style="padding: 10px; font-size: 20px" >{{ $doctor->name}}</td>
                    <td style="padding: 10px; font-size: 20px" >{{ $doctor->email }}</td>
                    <td style="padding: 10px; font-size: 20px" >{{ $doctor->phone }}</td>
                    <td style="padding: 10px; font-size: 20px" >{{ $doctor->room }}</td>
                    <td style="padding: 10px; font-size: 20px" >{{ $doctor->speciality }}</td>
                    <td><img height="100px" width="100px" src="doctorimage/{{ $doctor->image }}"></td>
                    <td>
                        <a class="btn btn-success" href="{{ route('update.doctor', $doctor->id) }}">Update</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href=" {{ route('delete.doctor', $doctor->id) }}"
                           onclick="return confirm('Delete this Doctor?')" >Delete</a>
                    </td>

                </tr>
                @endforeach
            </table>
        </div>


    </div>
    <!-- partial:partials/_sidebar.html -->
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    <!-- page-body-wrapper ends -->

<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.js')
<!-- End custom js for this page -->
</body>
</html>
