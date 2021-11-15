@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  @if (session("message"))
  <div class="row px-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session("message") }}
      <button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  <div class="row">
    <div class="col-12">
      <div class="card my-4 px-3">
        <div class="d-flex justify-content-between mt-3">
          <h4>Daftar Pengguna</h4>
          <a href="/admin/users/create" class="btn btn-outline-primary">
            Tambah
          </a>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>
                    {{ $user->name }} 
                  </td>
                  <td>
                    {{ $user->email }} 
                  </td>
                  <td>
                    @if ($user->hasRole('owner'))
                    <span class="badge me-1 rounded-pill bg-primary">
                      Pemilik
                    </span>
                    @else
                    <span class="badge me-1 rounded-pill bg-info">
                      Penyewa
                    </span>
                    @endif
                  </td>
                  <td>
                    <form action="/admin/users/{{ $user->id }}" method="POST">
                      @csrf
                      @method("delete")
                      <button  class="btn btn-outline-danger" type="submit">
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection