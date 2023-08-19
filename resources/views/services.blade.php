<x-adminPage>
    <x-slot name="pages">Services Available</x-slot>
    <x-slot name="banner">

    <div style="width:62%;display:flex;flex-direction:column;justify-content:center;align-items:center;position:absolute;top:10%;left:15%;">
        <h1 style="padding-left:50%;">Our Services</h1>
               
    <div class="datas" style="width:110%;display:grid;grid-template-columns: auto auto auto;align-items:center;justify-content:space-evenly;">
     @foreach($ser as $data)
     <button class="card" style="width: 8rem; height:8rem; margin-top:20;" id={{ $data->service }} >
                <img class="card-img-top" style="height:5rem" src={{ asset( "storage/" . $data->service_photo ) }} alt="Card image cap">
                <div class="card-body">
                <p class="card-text">{{ $data->service }}</p>
                </div>
            </button>
     
            @endforeach
        </div>
</div>
    </x-slot>
  
</x-layout>