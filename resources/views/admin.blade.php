<x-adminPage>
    <x-slot name="pages">Admin Pages</x-slot>
    <x-slot name="banner">
    <div class="datas">
        <table id="customers">
  <tr>
    <th>SN</th>
    <th>User Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Password</th>
    <th>Action</th>
     </tr>
     @foreach($getData as $data)
     <tr>
     <td>{{$data->user_id}}</td>
        <td>{{$data->user_name}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->phone_number}}</td>
        <td>{{$data->password}}</>
        <td style="width:20%;height:80%;display:flex;justify-content:center;align-items:center;">
            <img style="width:30%;height:100%" src="https://www.pdfzorro.com/Images/IconsFunktionen/pdf-edit.webp" alt="edit icon"/>
            <img style="width:30%;height:100%;margin-left:10%" src="data:image/png;base64,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" alt="delete icon"/>
        </td>
        </tr>
            @endforeach
</table>


        </div>
    </x-slot>
</x-adminPage>