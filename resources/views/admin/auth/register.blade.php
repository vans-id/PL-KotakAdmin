<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{  url('coreui/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{  url('coreui/css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{  url('coreui/css/style.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card mb-4 mx-4">
              <div class="card-body p-4">
                <h1>Register</h1>
                <p class="text-medium-emphasis">Create your account</p>
                <form action="/admin/register" method="POST">
                  @csrf
                  <div class="input-group mb-3">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Nama" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="input-group mb-3">
                    <input class="form-control" type="email" placeholder="Email" name="email">
                  </div>
                  <div class="input-group mb-3">
                    <input class="form-control" type="password" placeholder="Password" name="password">
                  </div>
                  <button class="btn btn-block btn-success" type="submit">Create Account</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>

  </body>
</html>