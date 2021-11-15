@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Transaksi</h5>

          <form action="/admin/transactions" method="POST" class="mt-3">
            @csrf
            <input class="form-control mb-3" type="text" placeholder="ID Penyewa" name="user_id">
            <input class="form-control mb-3" type="text" placeholder="ID Kosntrak" name="kosntrak_id">
            <input class="form-control mb-3" type="text" placeholder="Tanggal Checkin" name="start_date">
            <input class="form-control mb-3" type="text" placeholder="Tanggal Checkout"  name="end_date">

            <select class="form-select mb-3" name="payment_status" value="0">
              <option selected disabled>Status Bayar</option>
              <option value="0">Pending</option>
              <option value="1">Diterima</option>
            </select>

            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/admin/transactions" class="btn btn-outline-secondary ml-3">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection