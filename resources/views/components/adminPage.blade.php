        <html>
    <head>
        <title>{{$pages}}</title>
        <link rel="stylesheet" type="text/css" href={{ asset("css/app.css") }} />
        <style>
            
        </style>
    </head>
    <body>
        <div class="main-container">

        <div class="navbar">
        <img style="margin-left:5%" src="https://cdn.vectorstock.com/i/1000x1000/04/22/hammer-silhouette-isolated-on-blue-background-vector-22480422.webp" alt="navbar image"/>
            <h2 style="color:purple;margin-left:1%;">Demo admin</h2>
            <form style="margin-left:20%" method="POST" action="signupForCustomer">
            @csrf
            <button onclick="submit" >Add Customer</button>
            </form>

            <form style="margin-left:5%" method="POST" action="addService">
            @csrf
            <button onclick="submit" >Add Service</button>
            </form>

            <form style="margin-left:5%" method="POST" action="servicer/serviceForm">
            @csrf
            <button onclick="submit" >Add Service Provider</button>
            </form>
          
            
            
            <img style="width:80px;margin-left:20%;" src="https://banner2.cleanpng.com/20180721/gub/kisspng-flag-of-nepal-flag-of-the-maldives-flag-of-the-uni-government-of-nepal-5b532238d46bf2.1263789815321749048701.jpg" alt="flag"/>
            <img src="https://w7.pngwing.com/pngs/922/214/png-transparent-computer-icons-avatar-businessperson-interior-design-services-corporae-building-company-heroes-thumbnail.png" alt="Avatar" class="avatar">
            <p style="color:purple;margin-left:1%">DEMO ADMIN</p>

            <div style="margin-left:5px;">
               <a href="/login">LOGOUT</a>
            </div>
        </div>


        <div class="sidebar">

      <form method:"GET" action="/adminpage" class="dashboard">
        
        <button class="dashboard" style="width:100%;height:100%;">
        <img style="width:80px;height:40px;" src="https://w7.pngwing.com/pngs/922/214/png-transparent-computer-icons-avatar-businessperson-interior-design-services-corporae-building-company-heroes-thumbnail.png" alt="Avatar" class="avatar">
        <div style="margin-left:20px;">
        <b style="font">admin@admin.com</b><br>
        <p>Demo Admin</p>
        </div>
        </button>
        </form>
  

        <button class="sidebar-content" onclick="parent.location='http://127.0.0.1:8000/dashboard'">
            <b style="margin-left:2%">Main</b>
            <div style="display:flex;justify-content:left;align-items:center;">
            <img style="width:30px;height:30px;margin-left:2%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAbFBMVEX///8AAAAwMDDPz8/p6enm5ubS0tKjo6OcnJz19fX6+vpfX19jY2OGhoaqqqrs7OzX19d+fn5KSkrExMQ5OTlCQkJ1dXUzMzO+vr5YWFhOTk49PT0qKirc3NwdHR2WlpZqamoUFBSKioq0tLQ0gjWbAAAC2klEQVR4nO3d7VbaQBCAYcK3JCRCVCq2Vdv7v8f2tAo9ZZkZZ2dpOH2f32bIq4iYzepoBAAAAAAAAAAAcBX6epxv256Z3m4Dptd9TuBDFeMuNXy1C5q+8Qd+CjqFqlonpm/Cpvu/io9h51AlpscNb9yF47iT6E6Gd3HDd0MonJ4Mn8YNH1NIYYShFzbtwmVtKlz7hrdNYOHSOeDWVHjrnL4cQOHcVDh3TqfQgEIVhRTKKDSgUEUhhTIKDShUUUihjEIDClUUUiij0IBCFYUUyig0oFBFIYUyCg0oVFFIoYxCAwpVFFIoo9CAQhWFFMooNKBQRSGFMgoNKFRdz736m/nEY96aClvn9E1gYb6h75nJR2EWCv/nwn3cSSSmxw3fuwtbfbhRai9yHTb93H5/g7uoczjd6Bz4NH3yB0btma9TgaNRF/NVTO31/4huluv0ReZomj09/ckDAAAAAAB/y/8tfHbjf/RutopLSVmt9cskBrV0IUMwf/p5cFP0OsXnkMAqdUHYoH87uGDiIiqwevQ8/PvBD9FdR/dhhZXj2+m4vBpf9q7ouoVqcjg446VKQSGFFMouWljiXgzVRQtL3E+juopC6Z4oFYURKFRRKKIwAoUqCkUURqBQRaGIwggUqigUURiBQhWFxoPLrSEWL/xiuxTZS5csnWuTvxUunHytIuwz1hfLFs6T5+vhfxaXLQzbzFE9D7PwJiywuh9m4SB2dpV9lsYVuu4SuEBhkzxbD//OrrKFYf/EcusOLP3zsHsJCfS/kl7iXdvqvD/el3bSh2XhnbeKQhGFEShUUSiiMAKFKgpFFEagUEWhiMIIFKooFFEYgULV9dyr37QLl/XVFOajMIHCCBR+gONugmNhubtN4lb4PFt5D6tvr+FhB710zh/yzfPw27eDvT+NLWL+4IB3DbN7/XWwfw3bon/ZjbPV3lXo1XI/br6HBgEAAAAAAAAAAPw7PwDGJUXuNMFDvAAAAABJRU5ErkJggg==" alt="icon"/>
            <b style="margin-left:2%;">Dashboard</b>
            </div>
        </button>


        <button class="sidebar-content" onclick="parent.location='http://127.0.0.1:8000/customers'">
            <b style="margin-left:2%">Customer</b>
            <div style="display:flex;justify-content:left;align-items:center;">
            <img style="width:30px;height:30px;margin-left:2%" src="https://static.thenounproject.com/png/186492-200.png" alt="icon"/>
            <b style="margin-left:2%;">Customers</b>
            </div>
        </button>
        

        <button class="sidebar-content" onclick="parent.location='http://127.0.0.1:8000/service'">
            <b style="margin-left:2%">Home Service</b>
            <div style="display:flex;justify-content:left;align-items:center;">
            <img style="width:30px;height:30px;margin-left:2%" src="https://4.imimg.com/data4/KK/OI/MY-5670369/home-cleaning-services-500x500.png" alt="icon"/>
            <b style="margin-left:2%;">Service Provider</b>
            </div>
        </button>

        
        <button class="sidebar-content" onclick="parent.location='http://127.0.0.1:8000/selectAllService'">
            <b style="margin-left:2%">Services</b>
            <div style="display:flex;justify-content:left;align-items:center;">
            <img style="width:30px;height:30px;margin-left:2%" src="https://4.imimg.com/data4/KK/OI/MY-5670369/home-cleaning-services-500x500.png" alt="icon"/>
            <b style="margin-left:2%;"> Services</b>
            </div>
        </button>

        <button class="sidebar-content" onclick="parent.location='http://127.0.0.1:8000/bookings'">
            <b style="margin-left:2%">Booking</b>
            <div style="display:flex;justify-content:left;align-items:center;">
            <img style="width:30px;height:30px;margin-left:2%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8GrTwyyMvlpdfHrQjpAtDNd-Vq9BO1wvJwQ&usqp=CAU" alt="icon"/>
            <b style="margin-left:2%;">Booking</b>
            </div>
        </button>

        
        
        </div>
       {{$banner}}
        </div>
    </body>
</html>
  