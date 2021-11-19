@extends('admin.layouts.layout')

@section('content')
<div class="container my-5">
  <table class="table">
      @if (session("message"))
      <div class="row px-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session("message") }}
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      @endif
      <h2>CRUD | Admin (Data Pengguna)</h2>
      <br />
      <a class="btn btn-primary rounded-pill px-4 my-3" href="/admin/users/create" role="button">Tambah</a>
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">No Rekening</th>
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
            <span class="badge me-1 bg-primary">
              Pemilik
            </span>
            @else
            <span class="badge me-1 bg-info">
              Penyewa
            </span>
            @endif
          </td>
          <td>
            {{ $user->rekening ? $user->rekening : "N/A" }} 
          </td>
          <td>
            <form action="/admin/users/{{ $user->id }}" method="POST">
              @csrf
              @method("delete")
              <button  class="btn btn-outline-danger rounded-pill px-4" type="submit">
                Hapus
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
</div>
@endsection