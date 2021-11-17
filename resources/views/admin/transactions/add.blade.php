@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  @if (session("message"))
  <div class="row px-3">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session("message") }}
      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  
  <div class="row">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Transaksi</h5>

          <form action="/admin/transactions" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
              <input class="form-control @error('user_id') is-invalid @enderror" type="text" placeholder="ID Penyewa" name="user_id">
              @error('user_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('kosntrak_id') is-invalid @enderror" type="text" placeholder="ID Kos / Kontrakan" name="kosntrak_id">
              @error('kosntrak_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('start_date') is-invalid @enderror" type="text" placeholder="Tanggal Checkin" name="start_date">
              @error('start_date')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('end_date') is-invalid @enderror" type="text" placeholder="Tanggal Checkout" name="end_date">
              @error('end_date')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <select class="form-select @error('payment_status') is-invalid @enderror" name="payment_status" value="0">
                <option selected disabled>Status Bayar</option>
                <option value="0">Pending</option>
                <option value="1">Diterima</option>
              </select>
              @error('payment_status')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/admin/transactions" class="btn btn-outline-secondary ml-3">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection