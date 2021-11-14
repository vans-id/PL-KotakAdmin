@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Detail Kosntrak</h5>

          <form action="/admin/kosntrak/{{ $kosntrak->id }}" class="mt-3" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <input class="form-control mb-3" type="text" placeholder="Tipe (Kos/Kontrakan)" name="type" value="{{ $kosntrak->type }}">
            <input class="form-control mb-3" type="text" placeholder="Nama Tempat" name="name" value="{{ $kosntrak->name }}">
            <input class="form-control mb-3" type="text" placeholder="Alamat" name="address" value="{{ $kosntrak->address }}">
            <input class="form-control mb-3" type="text" placeholder="Maps" name="maps" value="{{ $kosntrak->maps }}">
            <textarea class="form-control mb-3" type="text" placeholder="Keterangan" name="description">
              {{ $kosntrak->description }}
            </textarea>
            <input class="form-control mb-3" type="number" placeholder="Harga Sewa" name="price" value="{{ $kosntrak->price }}">
           
           
            <div class="mb-3">
              <label class="form-label" for="formFile">Gambar</label>
              <input id='image' class="form-control" type="file" name="image" onchange="previewImage()">

              @if ($kosntrak->image)
              <img src="{{ asset('storage/' . $kosntrak->image) }}" class="img-preview img-fluid mt-3 col-sm-6 d-block">
              @else
              <img class="img-preview img-fluid mt-3 col-sm-6">
              @endif
              <input type="hidden" name="oldImage" value="{{ $kosntrak->image }}">
            </div>

            <input class="form-control mb-3" type="text" placeholder="Status Kamar" name="bedroom" value="{{ $kosntrak->bedroom }}">
            <input class="form-control mb-3" type="text" placeholder="Status Kamar Mandi" name="bathroom" value="{{ $kosntrak->bathroom }}">

            <button class="btn btn-primary" type="submit">Simpan</button>
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