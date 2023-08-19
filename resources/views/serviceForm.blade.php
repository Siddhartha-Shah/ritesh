<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form method="POST" action="http://127.0.0.1:8000/servicerlogin" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="provider_name" class="form-control form-control-lg" />
                    <label class="form-label" for="provider_name">Full Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="provider_address" class="form-control form-control-lg" />
                    <label class="form-label" for="provider_address">Address</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline w-100">
                    <input type="number" class="form-control form-control-lg" name="provider_experience" />
                    <label for="provider_experience" class="form-label">Experience in years</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="provider_gender" id="femaleGender"
                      value="female" checked />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="provider_gender" id="maleGender"
                      value="male" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="provider_gender" id="otherGender"
                      value="other" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" name="provider_email" class="form-control form-control-lg" />
                    <label class="form-label" for="providera_email">Email</label>
                  </div>

                </div>
                
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="number" name="provider_number" class="form-control form-control-lg" />
                    <label class="form-label" for="provider_number">Phone Number</label>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" name="provider_password" class="form-control form-control-lg" />
                    <label class="form-label" for="provider_password">Password</label>
                  </div>

                </div>
                
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="password" name="provider_confirm_password" class="form-control form-control-lg" />
                    <label class="form-label" for="provider_confirm_password">Confirm Password</label>
                  </div>
                </div>

              </div>
              

              <div class="row">
                <div class="col-6">
                  <select class="select form-control-lg" name="provider_service">


                 @foreach($service_name as $s)
                    <option value="{{ $s->service }}">{{$s->service}}</option>
                    @endforeach

                  </select>
                  <label class="form-label select-label" for="provider_service">Choose Service</label>
                </div>

                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                  <input type="file" class="form-control" id="customFile" name="image" />
                  <label class="form-label" for="customFile">Upload you photo</label>
                  
                  </div>
                </div>
                

              </div>

              <div class="mt-2 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </body>
</html>