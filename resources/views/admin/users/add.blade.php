@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Pengguna</h5>

          <div class="dropdown-divider mt-3"></div>

          <form action="/admin/users" class="mt-3" method="POST">
            @csrf
            <div class="mb-3">
              <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Nama" name="name">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Alamat" name="address">
              @error('address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('phone') is-invalid @enderror" type="number" placeholder="No Hp" name="phone">
              @error('phone')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <select class="form-select @error('role') is-invalid @enderror" name="role" >
                <option selected disabled>Status pengguna</option>
                <option value="owner">Pemilik</option>
                <option value="user">Penyewa</option>
              </select>
              @error('role')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            
            
            
            

            

            <button class="btn btn-primary" type="submit">Tambah</button>
            <a href="/admin/users" class="btn btn-outline-secondary ml-3">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection