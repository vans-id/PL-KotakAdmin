@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Detail Transaksi</h5>

          <form action="/admin/sewas/{{ $transaction->id }}" class="mt-3" method="POST">
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
            <input class="form-control mb-3" type="text" placeholder="Nama Kosntrak" value="{{ $transaction->kosntrak->nama_tempat }}" disabled>
            @else
            <input class="form-control mb-3" type="text" placeholder="ID Kosntrak" name="kosntrak_id">
            @endif

            <div class="mb-3">
              <input class="form-control @error('tanggal') is-invalid @enderror" type="text" placeholder="Tanggal Checkin" name="tanggal" value="{{ $transaction->tanggal }}">
              @error('tanggal')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <select class="form-select @error('status_sewa') is-invalid @enderror" name="status_sewa" value="0">
                <option selected disabled>Status Sewa</option>
                <option value=" " {{ $transaction->status_sewa == "" ? 'selected' : '' }} >Pending</option>
                <option value="0" {{ $transaction->status_sewa == "0" ? 'selected' : '' }} >Ditolak</option>
                <option value="1" {{ $transaction->status_sewa == "1" ? 'selected' : '' }} >Diterima</option>
              </select>
              @error('status_sewa')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <select class="form-select @error('status_bayar') is-invalid @enderror" name="status_bayar" value="0">
                <option selected disabled>Status Bayar</option>
                <option value=" " {{ $transaction->status_bayar == "" ? 'selected' : '' }} >Pending</option>
                <option value="0" {{ $transaction->status_bayar == "0" ? 'selected' : '' }} >Ditolak</option>
                <option value="1" {{ $transaction->status_bayar == "1" ? 'selected' : '' }} >Diterima</option>
              </select>
              @error('status_bayar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="/admin/sewas" class="btn btn-outline-secondary ml-3">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection