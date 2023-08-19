<html>
    <head>
        <style>
            body{
                margin:0px;
            }
              .div{
                margin:0px;
                background-image: linear-gradient(blue, sky);
                width:100%;
                height:100%;
                background-image:url("https://images.unsplash.com/photo-1575252663512-b25714ec27f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80");
                background-size:100% 100%;
                display:flex;
                justify-content:center;
                align-items:center
              }
              .div .form_image{
                width:35%;
                height:80%;
                background-image:url("https://content.pymnts.com/wp-content/uploads/2019/07/home-services-investments.jpg");
                background-size:100% 100%;
              }
              
              .div .form{
                width:35%;
                height:80%;
                background-color:#4a2aff;
                background-image:url("https://img.freepik.com/free-photo/cup-with-sugar-copy-space-background_23-2148240660.jpg?w=360&t=st=1685514927~exp=1685515527~hmac=3faecd17739e8b7b4655fe68e344d946a23f61bf4c5e9f0c2f77d05953e4a604");
                background-size:100% 100%;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                
              }
              @media (max-width:800px){
                
            }
              img{
                width:100%;
              }
              input{
                height:40px;
                margin-top:10px;
                font-size:18px;
                width:50%;
                opacity:0.7;
                outline: none;

            }
              input:hover{
                height:50px;
                width:55%;
                font-size:20px;
                border:none;
                outline: none;

              }
              button{
                background-color:#0080ff;
                height:40px;
                margin-top:20px;
                width:50%;
                border-radius: 10px 10px 10px 10px;
                opacity:0.7;
              }
              button:hover{
                height:50px;
                width:55%;
                font-size:20px;
              }
              .h1{
                margin-button:90px;
                
              }
        </style>
    </head>
    <body>
        <div class="div">
            <div class="form_image"></div>
            <div class="form">
            <h1 class="h1"> Sign Up</h1>
            <form>
            <input type="text" name="user_name" placeholder="Choose user name"/>
            <input type="text" name="full_name" placeholder="Enter full name"/>
            <input type="email" name="email" placeholder="Enter email"/>
            <input type="number" name="phone_number" placeholder="Enter phone number"/>
            <input type="password" name="password" placeholder="Enter Password"/>
            <input type="email" name="confirm_password" placeholder="confirm password"/>
            <button type="button" onclick="submit">SIGN UP</button>
            <button type="button" onclick="submit">LOG IN</button>
            </form>
            </div>
        </div>
    </body>
</html>