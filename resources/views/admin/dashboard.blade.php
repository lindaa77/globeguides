<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlobeGuides - Travel & Tour</title>
    
    <!-- swiper css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>

<div class="container">
<h2 class="text-center my-5">Booking Orders</h2>
        <div class="d-flex align-items-center justify-content-between m-5">
            <h1>Welcome, {{ $adminUsername }}</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary"><h4>Logout</h4></button>
            </form>
        </div>
        <div class="row">
            @foreach ($orders as $order)
            <div class="col-4 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $order->name }}</h2>
                        <p class="fs-5 text">{{ $order->email }}</p>
                    </div>
                    <div class="card-body">
                        <p class="fs-5 text">Phone: {{ $order->phone }}</p>
                        <p class="fs-5 text">Address: {{ $order->address }}</p>
                        <p class="fs-5 text">Location: {{ $order->location }}</p>
                        <p class="fs-5 text">Guests: {{ $order->guests }}</p>
                        <p class="fs-5 text">Arrival Date: {{ $order->arrivals }}</p>
                        <p class="fs-5 text">Leaving Date: {{ $order->leaving }}</p>
                        <p class="fs-5 text">Helper: {{ $order->helper }}</p>
                        <!-- Form untuk mengubah helper -->
                        <form action="{{ route('admin.updateHelper', ['order' => $order->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="inputBox row pe-2">
                                <div class="col-9">
                                    <input type="text" name="helper" placeholder="Enter Helper Name" class="form-control h-100 fs-5">
                                </div>
                                <button type="submit" class="fs-5 text btn btn-primary col">Update</button>
                            </div>
                        </form>
                        <p class="fs-5 text mt-3">Status: {{ $order->status }}</p>
                        <!-- Form untuk mengubah status -->
                        <form action="{{ route('admin.updateStatus', ['order' => $order->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="inputBox row pe-2">
                                <div class="col-9">
                                    <select name="status" id="status" class="form-select fs-5 text">
                                        <option value="menunggu approval admin">Menunggu Approval Admin</option>
                                        <option value="approved">Approved</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                                <button type="submit" class="fs-5 text btn btn-primary col">Update</button>
                            </div>
                        </form>
                        <!-- Tombol Download PDF -->
                        <form action="{{ route('admin.downloadPdf', ['order' => $order->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="fs-5 text btn btn-primary col">Download PDF</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

</div>

<!-- Include login and signup popups -->
@include('login_popup')

@include('signup_popup')

<!--footer section  -->
@include('footer')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!--swiper js link-->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- custom js file link-->
<script src="js/script.js"></script>

</body>

</html>
