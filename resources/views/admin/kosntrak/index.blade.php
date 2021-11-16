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
      
      <h2>CRUD | Admin (Data Kos dan Kontrakan)</h2>
      <br />
      <a class="btn btn-primary rounded-pill px-4 my-3" href="/admin/kosntrak/create" role="button">Tambah</a>
      <thead>
        <tr>
          <th scope="col" >Nama Tempat</th>
          <th scope="col">Jenis</th>
          <th scope="col">Alamat</th>
          <th scope="col" style="width: 14%;">Harga Sewa</th>
          <th scope="col" style="width: 18%;"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kosntraks as $k)
        <tr>
          <td>
            {{ $k->name }}
          </td>
          <td>{{ strtoupper($k->type) }}</td>
          <td>
            {{ $k->address }}
          </td>
          <td>
            Rp {{ number_format($k->price) }}
          </td>
          <td>
            <a href="/admin/kosntrak/{{ $k->id }}/edit" class="btn btn-outline-primary rounded-pill px-4">
              Edit
            </a>
            <form action="/admin/kosntrak/{{ $k->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger rounded-pill px-4" onclick="return confirm('Hapus Kosntrak?')" type="submit">
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