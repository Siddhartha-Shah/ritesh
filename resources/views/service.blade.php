<x-adminPage>
    <x-slot name="pages">services</x-slot>
    <x-slot name="banner">
               
    <div class="datas">
        <table id="customers">
  <tr>
    <th>Service Id</th>
    <th>Provider Name</th>
    <th>Service </th>
    <th>Number</th>
    <th>Email</th>
    <th>Provider Experience</th>
    <th>Address</th>
    <th>provider service</th>
    <th>Action</th>
     </tr>
     @foreach($ser as $data)
     <tr>
     <td>{{$data->service_id}}</td>
        <td>{{$data->provider_name}}</td>
        <td>{{$data->provider_service}}</td>
        <td>{{$data->provider_number}}</td>
        <td>{{$data->provider_email}}</td>
        <td>{{$data->provider_experience}} years</td>
        <td>{{$data->provider_address}}</>
        <td>{{$data->provider_service}}</>


        <td style="width:50%;height:100%;display:flex;justify-content:center;align-items:center;">
        <a href={{ url('/updateServices', [$data]) }}><img style="width:30%;height:100%;margin-left:10%" src="data:image/png;base64,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" alt="edit icon"/></a>
        
        <a href={{ url('/deleteServices', [$data->service_id]) }}><img style="width:30%;height:100%;margin-left:10%" src="data:image/png;base64,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" alt="delete icon"/></a>
            
        </td>


        
        </tr>
            @endforeach
</table>
        </div>
    </x-slot>
  
</x-layout>