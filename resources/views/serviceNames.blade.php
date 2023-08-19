<html>
    <head>
        <title> Add Service</title>
        <style>
            .div{
            margin-top:10%;
            margin-left:35%;
            width:30%;
            height:50%;
                display:flex;
                flex-direction:column;
                justify-content:space-evenly;
                align-items:center;
                border:1px solid black;
            }
         
        </style>
    </head>
    <body style="display:center">
        <div class="div">
    <form  method="POST" action="/addServiceName" enctype="multipart/form-data">
        @csrf

    <label for="exampleInputEmail1">Service Name</label>
    <input type="text" class="form-control" style="padding-button:20px;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter service Name" name="service"><br>



    <label for="exampleFormControlFile1">Upload Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image"><br>
  
    <input type="submit" value="submit"/>
</form>
</div>

    </body>
</html>