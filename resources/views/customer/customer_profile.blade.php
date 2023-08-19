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
           @include('customer.navbar') 
    </div>

    <section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">

          @if(session('customer_photo')==null)
            <form method="post" action={{ url("customer/uploadImage") }} enctype="multipart/form-data">
              @csrf
              <div>
              <input type="file" alt="upload file" name="image"
                class="rounded-circle img-fluid" style="width: 100px;" />
                <input type="submit" value="submit"/>
                </div>
                </form>
                @else

                <div class="mt-3 mb-4">
              <img src={{ asset("storage/".session("customer_photo")) }}
                class="rounded-circle img-fluid" style="width: 100px;" alt="profile pic" />
            </div>

            @endif


            <h4 class="mb-2">{{session('customer')[0]}}</h4>
            <p class="text-muted mb-4">{{ session('customer')[1] }}</p>
            <div class="mb-4 pb-2">
              <p>address:  {{session('customer')[2]}}</p>
              <p>contact:  {{session('customer')[3]}}</p>
            </div>
            
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

    </div>
   
</div>

    

    </body>
</html>