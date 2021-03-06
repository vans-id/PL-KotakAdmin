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
      <h2>CRUD | Admin (Data Transaksi)</h2>
      <br />
      <a class="btn btn-primary rounded-pill px-4 my-3" href="/admin/sewas/create" role="button">Tambah</a>
      <thead>
        <tr>
          <th scope="col">Nama Penyewa</th>
          <th scope="col">Nama Kosntrak</th>
          <th scope="col">Status Sewa</th>
          <th scope="col">Status Bayar</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transactions as $transaction)
        <tr>
          <td>
            @if ($transaction->user)
            {{ $transaction->user->name }}
            @else
            N/A
            @endif
          </td>
          <td>
            @if ($transaction->kosntrak)
            {{ $transaction->kosntrak->nama_tempat }}
            @else
            N/A
            @endif
          </td>
          <td>
            @if ($transaction->status_sewa == '1')
            <span class="badge me-1 bg-success">
              Diterima
            </span>
            @elseif ($transaction->status_sewa == '0')
            <span class="badge me-1 bg-danger">
              Ditolak
            </span>
            @else
            <span class="badge me-1 bg-warning">
              Pending
            </span>  
            @endif
          </td>
          <td>
            @if ($transaction->status_bayar == '1')
            <span class="badge me-1 bg-success">
              Diterima
            </span>
            @elseif ($transaction->status_bayar == '0')
            <span class="badge me-1 bg-danger">
              Ditolak
            </span>
            @else
            <span class="badge me-1 bg-warning">
              Pending
            </span>  
            @endif
          </td>
          <td>
            <a href="/admin/sewas/{{ $transaction->id }}/edit" class="btn btn-outline-primary rounded-pill px-4">
              Edit
            </a>
            <form action="/admin/sewas/{{ $transaction->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger rounded-pill px-4" onclick="return confirm('Hapus Transaksi?')" type="submit">
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