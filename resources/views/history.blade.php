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
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>
<!-- header section start -->
@include('header')
<!-- header section end -->

<div class="container">
        <div class="d-flex align-items-center justify-content-between m-5">
            <h2>My Orders - {{ $username }}</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary"><h4>Logout</h4></button>
            </form>
        </div>
        <div class="row">
        @foreach ($orders as $order)
        <div class="col-4 mb-5">
            <div class="card" >
                <div class="card-body">
                    <h3 class="card-title">Order ID: {{ $order->id }}</h3>
                    <h5 class="card-text">Location: {{ $order->location }}</h5>
                    <h5 class="card-text">Guests: {{ $order->guests }}</h5>
                    <h5 class="card-text">Helper: {{ $order->helper }}</h5>
                    <h5 class="card-text">Status: {{ $order->status }}</h5>
                    <form action="{{ route('order.delete', ['id' => $order->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">Hapus</button>
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
