@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-6 col-md-8 col-12 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Detail Kosntrak</h5>

          <form action="/admin/kosntrak/{{ $kosntrak->id }}" class="mt-4" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <input class="form-control @error('type') is-invalid @enderror" type="text" placeholder="Tipe (Kos/Kontrakan)" name="type" value="{{ $kosntrak->type }}">
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <input class="form-control @error('name') is-invalid @enderror  " type="text" placeholder="Nama Tempat" name="name" value="{{ $kosntrak->name }}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('address') is-invalid @enderror  " type="text" placeholder="Alamat" name="address" value="{{ $kosntrak->address }}">
              @error('address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('maps') is-invalid @enderror  " type="text" placeholder="Maps" name="maps" value="{{ $kosntrak->maps }}">
              @error('maps')
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
              name="description">{{ $kosntrak->description }}</textarea>
              @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('name') is-invalid @enderror " type="number" placeholder="Harga Sewa" name="price" value="{{ $kosntrak->price }}">
              @error('price')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="formFile">Gambar</label>
              <input id='image' class="form-control @error('image') is-invalid @enderror" type="file" name="image" 
              onchange="previewImage()">
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror

              @if ($kosntrak->image)
              <img src="{{ asset('storage/' . $kosntrak->image) }}" class="img-preview img-fluid mt-3 col-sm-6 d-block">
              @else
              <img class="img-preview img-fluid mt-3 col-sm-6">
              @endif
              <input type="hidden" name="oldImage" value="{{ $kosntrak->image }}">
            </div>

            <div class="mb-3">
              <input class="form-control @error('bedroom') is-invalid @enderror" type="text" placeholder="Status Kamar" name="bedroom" value="{{ $kosntrak->bedroom }}" />
              @error('bedroom')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('bathroom') is-invalid @enderror" type="text" placeholder="Status Kamar Mandi" name="bathroom" value="{{ $kosntrak->bathroom }}" />
              @error('bathroom')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

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