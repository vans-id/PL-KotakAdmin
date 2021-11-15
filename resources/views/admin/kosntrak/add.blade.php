@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Kosntrak</h5>

          <form action="/admin/kosntrak" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <input class="form-control @error('type') is-invalid @enderror" type="text" placeholder="Tipe (Kos/Kontrakan)" name="type">
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <input class="form-control @error('name') is-invalid @enderror  " type="text" placeholder="Nama Tempat" name="name">
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('address') is-invalid @enderror  " type="text" placeholder="Alamat" name="address">
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('maps') is-invalid @enderror  " type="text" placeholder="Maps" name="maps">
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <textarea 
              class="form-control @error('description') is-invalid @enderror " 
              type="text" 
              placeholder="Keterangan" 
              name="description"></textarea>
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('name') is-invalid @enderror " type="number" placeholder="Harga Sewa" name="price">
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="formFile">Gambar</label>
              <input id='image' class="form-control @error('image') is-invalid @enderror" type="file" name="image" 
              onchange="previewImage()">
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <img class="img-preview img-fluid mt-3 col-sm-6">
            </div>

            <div class="mb-3">
              <input class="form-control @error('bedroom') is-invalid @enderror" type="text" placeholder="Status Kamar" name="bedroom">
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('bathroom') is-invalid @enderror" type="text" placeholder="Status Kamar Mandi" name="bathroom">
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
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