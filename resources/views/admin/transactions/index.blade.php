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
          <h4>Daftar Transaksi</h4>
          <a href="/admin/transactions/create" class="btn btn-outline-primary">
            Tambah
          </a>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nama Penyewa</th>
                  <th scope="col">Nama Kosntrak</th>
                  <th scope="col">Status Sewa</th>
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
                    {{ $transaction->kosntrak->name }}
                    @else
                    N/A
                    @endif
                  </td>
                  <td>
                    @if ((time()-(60*60*24)) < strtotime($transaction->start_date))
                    <span class="badge me-1 rounded-pill bg-info">
                      Dipesan
                    </span>
                    @elseif ((time()-(60*60*24)) < strtotime($transaction->end_date))
                    <span class="badge me-1 rounded-pill bg-success">
                      Disewa
                    </span>
                    @else
                    <span class="badge me-1 rounded-pill bg-secondary">
                      Selesai
                    </span>  
                    @endif
                  </td>
                  <td>
                    <a href="/admin/transactions/{{ $transaction->id }}/edit" class="btn btn-outline-info">
                      Edit
                    </a>
                    <form action="/admin/transactions/{{ $transaction->id }}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-outline-danger" onclick="return confirm('Hapus Transaksi?')" type="submit">
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