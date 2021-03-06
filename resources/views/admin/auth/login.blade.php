<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kotak Admin | Masuk</title>
    {{-- Custom style --}}
    <link rel="stylesheet" href="../../../css/app.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            @if (session("message"))
            <div class="row px-3">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("message") }}
              </div>
            </div>
            @endif

            @if (session("loginError"))
            <div class="row px-3">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session("loginError") }}
              </div>
            </div>
            @endif

            <div class="card-group d-block d-md-flex row">

              <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-medium-emphasis">Masuk dashboard sebagai Admin</p>
                  <form action="/admin/login" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                      <input 
                        class="form-control @error('email')
                        is-invalid @enderror" 
                      type="email" 
                      placeholder="Email" 
                      name="email"
                      autofocus 
                      required 
                      value="{{ old('email') }}"
                      >
                      @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="input-group mb-4">
                      <input class="form-control" type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">Login</button>
                      </div>
                      <div class="col-6 text-end">
                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="card col-md-5 text-white bg-primary py-5">
                {{-- Isi sesuatu disini... --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>