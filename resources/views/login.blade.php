<html>
    <head>
        <style>
            body{
                margin:0;
                align-items:center;
                justify-content:center;

            }
            .main_container{
                width:100%;
                height:100%;
                display:flex;
                align-items:center;
                justify-content:center;
            }
             .child{
                background-color:#f2f2f2;
                width:25%;
                height:70%;
                display:flex;
                flex-direction:column;
                align-items:center;
                justify-content:center;
            }
            img{
                width:50px;
                height:50px%;
            }
            input{
                position:relative;
                height:35px;
                width:100%;
                outline:none;
            }
            input:hover{
                outline:none;
                border:1px solid green;
            }
            button{
                width:90%;
                height:35px;
                background-color:blue;
                color:white;
                margin-top:10%;
                outline:none;
            }
            form{
                width:90%;
                display:flex;
                flex-direction:column;
                align-items:center;
                justify-content:center;
            }
        </style>

    </head>
    <body>
        <div class="main_container">
            <div class="child">
                <img src="https://cdn.vectorstock.com/i/1000x1000/04/22/hammer-silhouette-isolated-on-blue-background-vector-22480422.webp" alt="logo"/>
                <h1>Sign In</h1>
                <p style="color:grey;margin-top:-5px;">Login to Your account to continue</p>


                <form method="POST" action="/admin">
                    @csrf
                <div style="width:90%">
                    <p style="color:grey;margin-top:-5px;">Email <span style="color:red">*</span></p>
                    <input name="email" type="text" placeholder="Enter Email" style="margin-top:-15px"/>
                </div>

                <div style="width:90%">
                    <div style="display:flex;justify-content:space-between;">
                    <p style="color:grey">Password <span style="color:red">*</span></p>
                    <p style="color:blue">Forget Password?</p>
                    </div>
                    <input name="password" type="password" placeholder="Enter Password" style="margin-top:-15px"/>
                    
                </div>
                <button onclick="submit" value="submit">Login</button>
                
                    <p>Don't have an account?<span style="color:blue">Sign Up</span></p>
                    </form>

                
            </div>
        </div>

    </body>
</html>