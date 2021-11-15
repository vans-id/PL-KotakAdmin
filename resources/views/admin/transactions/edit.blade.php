@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Detail Transaksi</h5>

          <form action="/admin/transactions/{{ $transaction->id }}" class="mt-3" method="POST">
            @csrf
            @method('PUT')

            @if ($transaction->user)
            <input type="hidden" value="{{ $transaction->user->id }}" name="user_id">
            <input class="form-control mb-3" type="text" placeholder="Nama Penyewa"  value="{{ $transaction->user->name }}" disabled>
            @else
            <input class="form-control mb-3" type="text" placeholder="ID Penyewa" name="user_id">
            @endif

            @if ($transaction->kosntrak)
            <input type="hidden" value="{{ $transaction->kosntrak->id }}" name="kosntrak_id">
            <input class="form-control mb-3" type="text" placeholder="Nama Kosntrak" value="{{ $transaction->kosntrak->name }}" disabled>
            @else
            <input class="form-control mb-3" type="text" placeholder="ID Kosntrak" name="kosntrak_id">
            @endif

            <div class="mb-3">
              <input class="form-control @error('start_date') is-invalid @enderror" type="text" placeholder="Tanggal Checkin" name="start_date" value="{{ $transaction->start_date }}">
              @error('start_date')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <input class="form-control @error('end_date') is-invalid @enderror" type="text" placeholder="Tanggal Checkout" name="end_date" value="{{ $transaction->end_date }}">
              @error('end_date')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <select class="form-select mb-3" name="payment_status" >
              <option selected disabled>Status Bayar</option>
              <option {{ $transaction->payment_status == 0 ? 'selected' : '' }} value="0">Pending</option>
              <option {{ $transaction->payment_status == 1 ? 'selected' : '' }} value="1">Diterima</option>
            </select>

            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="/admin/transactions" class="btn btn-outline-secondary ml-3">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection