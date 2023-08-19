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
    @include('servicer.servicer_profile')
    </div>
   
</div>

    

    </body>
</html>