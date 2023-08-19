<html>
    <head>
        <title>Add customer</title>
        <style>
            
           div{
            margin-top:10%;
            margin-left:35%;
            width:30%;
            height:50%;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <div>
        <h1>@if($data) update @else add @endif customer</h1>
        <table>
            <form method="POST"  @if($data) action="/updateCustomer"  @else action="/addCustomer" @endif >
           
                @csrf
                <tr>
                    <td>customer Id</td>
                    <td><input type="text" name="customer_id" @if($data) value="{{$data->customer_id}} " @endif></td>
                </tr>
                <tr>
                    <td>customer Name</td>
                    <td><input type="text" name="customer_name" @if($data) value="{{$data->customer_name}}" @endif></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="customer_email" @if($data) value="{{$data->customer_email}}" @endif></td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td><input type="text" name="customer_number" @if($data) value="{{$data->customer_number}}" @endif></td>
                </tr>
                <tr>
                    <td>Address</td>
                <td><input type="text" name="customer_address" @if($data) value="{{$data->customer_address}} " @endif></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="customer_password" @if($data) value="{{$data->customer_password}}" @endif></td>
                </tr>
                <tr>
                    <td>
                    
                    </td>
                    <td>
                    <button type="submit" value="submit">Submit</button>
                    </td>
                
                </tr>
                
                
            </form>
        </table>
        </div>
    </body>
</html>