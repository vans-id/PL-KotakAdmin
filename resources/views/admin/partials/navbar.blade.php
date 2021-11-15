<header class="header header-sticky mb-4">
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
</header>