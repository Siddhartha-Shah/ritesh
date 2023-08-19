<!DOCTYPE>
<html>
    <head>
        <style>
            body{
        margin:0px;
    }
    
    .container{

       background-color:red;
       width:100%;
       height:fit-content;
       margin:0px;
       border:1px solid black;
       
    }
    .navbar{
        width:100%;
        height:8vh;
        background-color:orange;
        display:flex;
        align-items:center;
        justify-content:space-between;
    }
    #botton:hover{
        background-color:red;
        
    }
    #botton:hover{
       color:black;
        
    }
    button:hover span {
          display: none
        }

    span:hover:before {
        content: "REQUESTED"
        }


        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="navbar">
           <h2 style="margin-left:2%;">Home Service Nepal</h2>
           @include('customer.navbar') 
    </div>

    <div style="background-color:grey;width:100%;height:95%;display:grid;grid-template-columns: auto auto auto;padding-left:12%;">

    @foreach($services as $service)
    <div class="card mt-5" style="width: 16rem;height:25rem;">
  <img class="card-img-top" src="{{ asset("storage/".$service->provider_photo) }}" alt="Card image cap" height=200/>
  <div class="card-body h-25">
    <h5 class="card-title">{{$service->provider_name}}</h5>
    <p class="card-text">{{$service->provider_number}}</p>
   <!-- <input class="btn btn-primary" onclick="this.value='REQUESTED'" type="button" value="REQUEST" name="myButton1" />
    -->
    <form method="POST" action={{ "/services/select_service/" . $service->service_id }}>
        @csrf
    <textarea rows="2" cols="27" placeholder="Describe your problem..." name="message"></textarea>
</textarea>
    <!-- <a href={{ url('/services/select_service', [$service->service_id]) }} class="btn btn-primary mt-2">
    REQUEST
    </a> -->
    <input type="submit" value="Request" class="btn btn-primary mt-2"/>
    </form>
  </div>
</div>
@endforeach


    </body>
</html>