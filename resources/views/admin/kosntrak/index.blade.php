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
          <h4>Daftar Kos dan Kontrakan</h4>
          <a href="/admin/kosntrak/create" class="btn btn-outline-primary">
            Tambah
          </a>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table">
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
                    <a href="/admin/kosntrak/{{ $k->id }}/edit" class="btn btn-outline-info">
                      Edit
                    </a>
                    <form action="/admin/kosntrak/{{ $k->id }}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-outline-danger" onclick="return confirm('Hapus Kosntrak?')" type="submit">
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