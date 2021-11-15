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
            <input class="form-control mb-3" type="text" placeholder="Nama" name="name">
            <input class="form-control mb-3" type="email" placeholder="Email" name="email">
            <input class="form-control mb-3" type="password" placeholder="Password" name="password">
            <input class="form-control mb-3" type="text" placeholder="Alamat" name="address">
            <input class="form-control mb-3" type="number" placeholder="No Hp" name="phone">

            <select class="form-select mb-5" name="role" >
              <option selected disabled>Status pengguna</option>
              <option value="owner">Pemilik</option>
              <option value="user">Penyewa</option>
            </select>

            <button class="btn btn-primary" type="submit">Tambah</button>
            <a href="/admin/users" class="btn btn-outline-secondary ml-3">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection