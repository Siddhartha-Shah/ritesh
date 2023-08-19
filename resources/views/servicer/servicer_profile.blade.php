<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
              
            @if(session('photo')==null)
            <form method="post" action={{ url("servicer/uploadImage") }} enctype="multipart/form-data">
              @csrf
              <div>
              <input type="file" alt="upload file" name="image"
                class="rounded-circle img-fluid" style="width: 100px;" />
                <input type="submit" value="submit"/>
                </div>
                </form>
                @else

                <div class="mt-3 mb-4">
              <img src={{ asset("storage/".session("photo")) }}
                class="rounded-circle img-fluid" style="width: 100px;" alt="profile pic" />
            </div>

            @endif

              </div>
            <h4 class="mb-2">{{  session("service_provider")[0] }}</h4>
            <p class="text-muted mb-4"> {{session("service_provider")[1] }} years experience</p>
            <div class="mb-2 pb-2">
              <p>address: {{session("service_provider")[2] }}</p>
              <p>contact: {{session("service_provider")[3] }} </p>
              <p>Email: {{session("service_provider")[4] }} </p>
            </div>
            
            <div class="d-flex justify-content-between text-center mt-5 mb-2">
              <div>
                <p class="mb-2 h5">8471</p>
                <p class="text-muted mb-0">Customer Satisfaction</p>
              </div>
              <div class="px-3">
                <p class="mb-2 h5">8512</p>
                <p class="text-muted mb-0">Good response</p>
              </div>
              <div>
                <p class="mb-2 h5">4751</p>
                <p class="text-muted mb-0">Top rated</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>