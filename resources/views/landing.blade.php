<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PPDB SLB-B DHARMA WANITA SIDOARJO</title>
  <!-- Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS */
    /* HERO RESPONSIVE */
.hero {
  background: url('{{asset("assets/images/Background-Landing-Page.webp")}}') no-repeat center center;
  background-size: cover;
  color: white;
  min-height: 420px;
  height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 20px;
}

.hero h1 {
  font-size: 2.5rem;
  font-weight: bold;
}

.hero p {
  font-size: 1.2rem;
}

/* MOBILE ADJUSTMENT */
@media (max-width: 768px) {
  .hero h1 {
    font-size: 1.8rem;
  }
  .hero p {
    font-size: 1rem;
  }
}


/* FEATURES ICON RESPONSIVE */
#features img {
  width: 100%;
  max-width: 150px;
  height: auto;
}


/* CAROUSEL RESPONSIVE */
.carousel-inner img {
  width: 100%;
  max-height: 450px;
  object-fit: contain;
  padding: 10px;
  border-radius: 12px;
}

@media (max-width: 768px) {
  .carousel-inner img {
    max-height: 260px;
  }
}

/* CONTROLS RESPONSIVE */
.carousel-control-prev,
.carousel-control-next {
  width: 10%;
  filter: brightness(0);
}

@media (max-width: 768px) {
  .carousel-control-prev,
  .carousel-control-next {
    width: 15%;
    filter: brightness(0) invert(0);
  }
}

/* BUTTON */
.btn-clean {
  background-color: #0d6efd;
  color: white;
  border-radius: 0.5rem;
  padding: 0.65rem 1.5rem;
  font-weight: 500;
  transition: background-color 0.3s, transform 0.2s;
}

.btn-clean:hover {
  background-color: #0b5ed7;
  transform: translateY(-2px);
}



  </style>

  {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.ico') }}" />
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}"> <img
                    src="{{ asset('assets/images/logo.png') }}"
                    alt="Logo"
                    width="32"
                    height="32"
                    class="me-2"
                />PPDB SLB-B
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-item">
          <a class="nav-link mx-2"
            style="font-weight: 600; border-bottom: 2px solid transparent;"
            onmouseover="this.style.borderBottom='2px solid #fff'"
            onmouseout="this.style.borderBottom='2px solid transparent'"
            href="
                  @if(Auth::user()->role == 'staff')
                      {{ route('admin.dashboard') }}
                  @elseif(Auth::user()->role == 'guru')
                      {{ route('guru.dashboard') }}
                  @else
                      {{ route('dashboard.pendaftar') }}
                  @endif
            ">
              Dashboard
          </a>
      </li>
              
        <li class="nav-item">
            <span class="nav-link">Halo, {{ Auth::user()->nama }}</span>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-sm btn-light">Logout</button>
            </form>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Daftar</a>
        </li>
        @endauth
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div>
      <h1>Selamat Datang di PPDB SLB-B Dharma Wanita Sidoarjo</h1>
      <p class="lead">Sistem Pendaftaran Online untuk Calon Peserta Didik Berkebutuhan Khusus Kategori B</p>
      <a href="{{ route('register') }}" class="btn btn-clean btn-lg mt-3">Daftar Sekarang</a>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-5 text-center">
  <div class="container">
    <h2 class="mb-5">Jenjang Pendidikan Kami</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <img src="{{asset('assets/images/icon-sd.png')}}" alt="SD" class="img-fluid" style="width:150px; height:250px;">
        <h4>SD</h4>
      </div>
      <div class="col-md-4 mb-4">
        <img src="{{asset('assets/images/icon-smp.png')}}" alt="SMP" class="img-fluid" style="width:150px; height:250px;">
        <h4>SMP</h4>
      </div>
      <div class="col-md-4 mb-4">
        <img src="{{asset('assets/images/icon-sma.png')}}" alt="SMA" class="img-fluid" style="width:150px; height:250px;">
        <h4>SMA</h4>
      </div>
    </div>
  </div>
</section>


  <!-- Testimonial Section -->
 <section id="testimonials" class="py-5 bg-light">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="{{ asset('assets/images/brosur3.jpg') }}" class="d-block w-100" alt="Brosur 3">
      </div>

      <div class="carousel-item">
        <img src="{{ asset('assets/images/brosur2.jpg') }}" class="d-block w-100" alt="Brosur 2">
      </div>

      <div class="carousel-item">
        <img src="{{ asset('assets/images/brosur4.jpg') }}" class="d-block w-100" alt="Brosur 4">
      </div>

    </div>

    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>
</section>



  <!-- Footer -->
  <footer id="contact" class="bg-dark text-white py-4">
    <div class="container text-center">
      <p>&copy; 2025 SLB-B DHARMA WANITA SIDOARJO</p>
      <p>Alamat: Jl. Pahlawan GG. Pahlawan, Sidokumpul, Kec. Sidoarjo Kabupaten Sidoarjo | Email: slbdwsda@onklas.id | Kontak: 085731271050</p>
    </div>
  </footer>

  <!-- Bootstrap 4 JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
