<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      overflow-x: hidden;
    }
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      overflow-y: auto;
      background-color: #212529;
      z-index: 1000;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .main-content {
      margin-left: 250px;
      padding: 1.5rem;
      width: calc(100% - 250px);
    }
  </style>
</head>
<body>
<div class="d-flex">
  {{-- Sidebar --}}
  <div class="text-white sidebar">
    <div class="p-3">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">KulinerApp</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="/dashboard" class="nav-link text-white {{ request()->is('dashboard') ? 'active bg-primary' : '' }}">
            🏠 Dashboard
          </a>
        </li>
        <li>
          <a href="/tempat-makan" class="nav-link text-white {{ request()->is('tempat-makan*') ? 'active bg-primary' : '' }}">
            🍽️ Tempat Makan
          </a>
        </li>
        <li>
          <a href="/kategori" class="nav-link text-white {{ request()->is('kategori*') ? 'active bg-primary' : '' }}">
            📂 Kategori
          </a>
        </li>
        <li>
          <a href="/ulasan" class="nav-link text-white {{ request()->is('ulasan*') ? 'active bg-primary' : '' }}">
            📝 Ulasan
          </a>
        </li>
        <li>
          <a href="/promo" class="nav-link text-white {{ request()->is('promo*') ? 'active bg-primary' : '' }}">
            🎁 Promosi
          </a>
        </li>
      </ul>
    </div>

    {{-- Profil di bawah --}}
    <div class="p-3 border-top border-secondary">
      @guest
        <a href="{{ route('login') }}" class="btn btn-outline-light w-100">🔐 Login</a>
      @else
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
            <img src="https://github.com/mdo.png" alt="user" width="32" height="32" class="rounded-circle me-2">
            <strong>{{ Auth::user()->name }}</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item">🚪 Keluar</button>
              </form>
            </li>
          </ul>
        </div>
      @endguest
    </div>
  </div>

  {{-- Konten Utama --}}
  <div class="main-content">
    @yield('content')
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
