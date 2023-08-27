<html>
    <head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
                body{
        margin:0px;
    }
    

    .navbar{
        width:100%;
        height:8vh;
        background-color:orange;
        display:flex;
        align-items:center;
        justify-content:space-between;
    }
        </style>
    </head>

    <body>
    <div class="container">
        <div class="navbar">
           <h2 style="margin-left:2%;">Home Service Nepal</h2>
           @include('servicer.navbar') 
    </div>

    @foreach($bookings as $booking )

<div class="card text-center mt-4">
  <div class="card-header">

  @foreach($booking->customer as $customers)

  <p class="card-text">From: {{$customers->customer_address}} &nbsp &nbsp &nbsp &nbsp Message: {{$booking->message}}</p>
  <p class="card-text"></p>
  </div>
  <div class="card-body" style="display:flex;justify-content:space-around;">
  <h5>{{ $booking->booking_id }}</h5>
    <h5 class="card-title">{{$customers->customer_name}}</h5>
   
    <p class="card-text">Contact: {{$customers->customer_number}}</p>
    <p class="card-text">Email: {{$customers->customer_email}}</p>

    
    <a href={{ url('/acceptBookingAction', [$booking->booking_id]) }} class="btn btn-primary">Accept</a>
    <a href={{ url('/reject/'. $booking->booking_id )}} class="btn btn-danger">Reject</a>
@endforeach

 
  </div>
</div>
@endforeach

    </div>
    </body>
</html>