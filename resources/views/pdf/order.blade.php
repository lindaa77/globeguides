<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
    <p>Name: {{ $order->name }}</p>
    <p>Email: {{ $order->email }}</p>
    <p>Phone: {{ $order->phone }}</p>
    <p>Address: {{ $order->address }}</p>
    <p>Location: {{ $order->location }}</p>
    <p>Guests: {{ $order->guests }}</p>
    <p>Arrival Date: {{ $order->arrivals }}</p>
    <p>Leaving Date: {{ $order->leaving }}</p>
    <p>Helper: {{ $order->helper }}</p>
    <p>Status: {{ $order->status }}</p>
</body>
</html>