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

            <input class="form-control mb-3" type="text" placeholder="Tanggal Checkin" name="start_date" value="{{ $transaction->start_date }}">
            <input class="form-control mb-3" type="text" placeholder="Tanggal Checkout" name="end_date" value="{{ $transaction->end_date }}">

            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="/admin/transactions" class="btn btn-outline-secondary ml-3">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection