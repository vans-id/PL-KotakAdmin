<nav class="navbar navbar-expand-lg navbar-light bg-color-w shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="#"> <img src="{{ url('custom/images/image-logokotak.png') }}" alt="" width="40" class="d-inline-block align-text-center" /> </a>
      <span class="fs-4 fw-bold" href="">Kotak</span>

      <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
          <div class="navbar-nav">
              <a class="nav-link px-3" aria-current="page" href="#">Home</a>
              <a class="nav-link px-3" href="#">Pencarian</a>
              <a class="nav-link px-3" href="#">Sewaku</a>
              <a class="nav-link px-3" href="#">FAQ</a>
              <a class="nav-link px-3" href="#">About</a>
          </div>
      </div>
      <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle rounded-pill px-4 shd-blue" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="/admin">Dashboard</a></li>
              <li><a class="dropdown-item" href="/admin/kosntrak">Kos dan Kontrak</a></li>
              <li><a class="dropdown-item" href="/admin/transactions">Transaksi</a></li>
              <li><a class="dropdown-item" href="/admin/users">Pengguna</a></li>
              <li><a class="dropdown-item" href="/admin">Profile</a></li>
              <form action="/logout" method="POST" class="d-inline">
                @csrf
                <li><button type="submit" class="dropdown-item" href="#">Logout</button></li>
              </form>
             
          </ul>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
  </div>
</nav>

{{-- <header class="header header-sticky mb-4">
  <div class="container-fluid">
    <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
      <svg class="icon icon-lg">
        <use xlink:href="{{ url('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
      </svg>
    </button>
    
    <div>
      <span>
        Selamat datang, {{ auth()->user()->name }}
      </span>
      <form action="/logout" method="POST" class="d-inline">
        @csrf
        <button class="ml-auto btn btn-outline-danger ml-3" type="submit">
          Logout
        </button>
      </form>
    </div>
    
  </div>
  <div class="header-divider"></div>
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-0 ms-2">
        <li class="breadcrumb-item">
          <span>Admin</span>
        </li>
        <li class="breadcrumb-item active"><span>{{ $title }}</span></li>
      </ol>
    </nav>
  </div>
</header> --}}