@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Kosntrak</h5>

          <form action="/admin/kosntrak" method="POST" class="mt-3" enctype="multipart/form-data">
            @csrf
            <input class="form-control mb-3" type="text" placeholder="Tipe (Kos/Kontrakan)" name="type">
            <input class="form-control mb-3" type="text" placeholder="Nama Tempat" name="name">
            <input class="form-control mb-3" type="text" placeholder="Alamat" name="address">
            <input class="form-control mb-3" type="text" placeholder="Maps" name="maps">
            <textarea class="form-control mb-3" type="text" placeholder="Keterangan" name="description"></textarea>
            <input class="form-control mb-3" type="number" placeholder="Harga Sewa" name="price">
            
            <div class="mb-3">
              <label class="form-label" for="formFile">Gambar</label>
              <input id='image' class="form-control" id="formFile" type="file" name="image" onchange="previewImage()">
              <img class="img-preview img-fluid mt-3 col-sm-6">
            </div>

            <input class="form-control mb-3" type="text" placeholder="Status Kamar" name="bedroom">
            <input class="form-control mb-3" type="text" placeholder="Status Kamar Mandi" name="bathroom">

            <button class="btn btn-primary" type="submit">Tambah</button>
            <a href="/admin/kosntrak" class="btn btn-outline-secondary ml-3">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function previewImage() {
    const image = document.querySelector('#image')
    const imgPreview = document.querySelector('.img-preview')

    imgPreview.style.display = 'block'

    const oFReader = new FileReader()
    oFReader.readAsDataURL(image.files[0])

    console.log(oFReader)

    oFReader.onload = function (oFREvent) {
      console.log(oFREvent.target.result)
      imgPreview.src = oFREvent.target.result
    }
  }
</script>

@endsection