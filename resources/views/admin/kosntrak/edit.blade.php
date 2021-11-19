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

            @if ($kosntrak->user)
            <input type="hidden" value="{{ $kosntrak->user->id }}" name="user_id">
            <input class="form-control mb-3" type="text" placeholder="Nama Pemilik"  value="{{ $kosntrak->user->name }}" disabled>
            @else
            <input class="form-control mb-3" type="text" placeholder="ID Pemilik" name="user_id">
            @endif

            <div class="mb-3">
              <select class="form-select @error('jenis') is-invalid @enderror" name="jenis">
                <option selected disabled>Jenis</option>
                <option value="kos" {{ $kosntrak->jenis == "kos" ? 'selected' : '' }}>Kos</option>
                <option value="kontrakan" {{ $kosntrak->jenis == "kontrakan" ? 'selected' : '' }}>Kontrakan</option>
              </select>
              @error('jenis')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <input class="form-control @error('nama_tempat') is-invalid @enderror  " type="text" placeholder="Nama Tempat" name="nama_tempat" value="{{ $kosntrak->nama_tempat }}">
              @error('nama_tempat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('alamat') is-invalid @enderror  " type="text" placeholder="Alamat" name="alamat" value="{{ $kosntrak->alamat }}">
              @error('alamat')
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
              class="form-control @error('keterangan') is-invalid @enderror " 
              type="text" 
              placeholder="Keterangan" 
              name="keterangan">{{ $kosntrak->keterangan }}</textarea>
              @error('keterangan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('harga_sewa') is-invalid @enderror " type="number" placeholder="Harga Sewa" name="harga_sewa" value="{{ $kosntrak->harga_sewa }}">
              @error('harga_sewa')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="formFile">Gambar</label>
              <input id='gambar' class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" 
              onchange="previewImage()">
              @error('gambar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror

              @if ($kosntrak->gambar)
              <img src="{{ asset('storage/' . $kosntrak->gambar) }}" class="img-preview img-fluid mt-3 col-sm-6 d-block">
              @else
              <img class="img-preview img-fluid mt-3 col-sm-6">
              @endif
              <input type="hidden" name="oldImage" value="{{ $kosntrak->gambar }}">
            </div>

            <div class="mb-3">
              <input class="form-control @error('status_kamar') is-invalid @enderror" type="text" placeholder="Status Kamar" name="status_kamar" value="{{ $kosntrak->status_kamar }}" />
              @error('status_kamar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('status_kamarmandi') is-invalid @enderror" type="text" placeholder="Status Kamar Mandi" name="status_kamarmandi" value="{{ $kosntrak->status_kamarmandi }}" />
              @error('status_kamarmandi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('wifi') is-invalid @enderror" type="text" placeholder="Kecepatan Wifi (Jika tidak ada)" name="wifi" value="{{ $kosntrak->wifi }}">
              @error('wifi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('laundry') is-invalid @enderror" type="text" placeholder="Laundry" name="laundry" value="{{ $kosntrak->laundry }}">
              @error('laundry')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <input class="form-control @error('warung_makan') is-invalid @enderror" type="number" placeholder="Status Kamar Mandi" name="warung_makan" value="{{ $kosntrak->warung_makan }}">
              @error('warung_makan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <textarea 
              class="form-control @error('peraturan') is-invalid @enderror " 
              type="text" 
              placeholder="Peraturan Kos" 
              name="peraturan">{{ $kosntrak->peraturan }}</textarea>
              @error('peraturan')
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
    const image = document.querySelector('#gambar')
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