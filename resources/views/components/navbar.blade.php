<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-lg shadow-sm" style="background: linear-gradient(90deg, #db7bc3ff, #062452ff);">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand fw-bold" href="/">Tugas Web Lanjut</a>

    <!-- Toggle button -->
    <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link px-3" href="/user">List User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="/user/create">Add User</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  .navbar {
    font-family: 'Poppins', sans-serif;
  }

  .navbar-brand,
  .navbar .nav-link {
    color: #ffffff !important;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: 0.3s;
  }

  .navbar .nav-link:hover {
    color: #ffdd57 !important; /* kuning keemasan pas hover */
    transform: translateY(-2px);
  }

  .navbar-brand {
    font-size: 1.3rem;
  }
</style>
