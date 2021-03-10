<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> @yield('title') </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select.bootstrap4.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-app94034622-3');
</script>
<!-- /END GA --></head>

<body>
  @include('sweetalert::alert')
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <!-- <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
            <div class="d-sm-none d-lg-inline-block">
                @isset(Auth::user()->nama_operator)
                    {{ Auth::user()->nama_operator }}
                @endisset
                @isset(Auth::user()->nama_admin)
                    {{ Auth::user()->nama_admin }}
                @endisset
            </div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> -->
              <div class="dropdown-divider"></div>
                <form id="logoutForm" action="/logout" method="post">
                    @csrf
                    <a class="dropdown-item has-icon text-danger" href="javascript:;" onclick="document.getElementById('logoutForm').submit()"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('parkir.index') }}">Mallking</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('parkir.index') }}">MK</a>
          </div>
          <ul class="sidebar-menu">
            <li class="
              @if (Str::contains(url()->current(), 'parkir'))
                active
              @endif
            "><a class="nav-link" href="{{ route('parkir.index') }}"><i class="fas fa-parking"></i> <span>Parkir</span></a></li>
            @if (Auth::guard('admin')->check())
            <li class="dropdown
              @if (Str::contains(url()->current(), 'jenis_kendaraan'))
                active
              @elseif (Str::contains(url()->current(), 'kapasitas'))
                active
              @elseif (Str::contains(url()->current(), 'tarif'))
                active
              @endif
            ">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Konfigurasi Parkir</span></a>
              <ul class="dropdown-menu">
                <li class="
                  @if (Str::contains(url()->current(), 'jenis_kendaraan'))
                    active
                  @endif
                "><a class="nav-link" href="{{ route('jenis_kendaraan.index') }}">Jenis Kendaraan</a></li>
                <li class="
                  @if (Str::contains(url()->current(), 'kapasitas'))
                    active
                  @endif
                "><a class="nav-link" href="{{ route('kapasitas.index') }}">Kapasitas Parkir</a></li>
                <li class="
                  @if (Str::contains(url()->current(), 'tarif'))
                    active
                  @endif
                "><a class="nav-link" href="{{ route('tarif.index') }}">Tarif Parkir</a></li>
              </ul>
            </li>
            <li class="
              @if (Str::contains(url()->current(), 'operator'))
                active
              @endif
            "><a class="nav-link" href="{{ route('operator.index') }}"><i class="fas fa-users"></i> <span>Operator</span></a></li>
            <li class="
              @if (Str::contains(url()->current(), 'admin'))
                active
              @endif
            "><a class="nav-link" href="{{ route('admin.index') }}"><i class="fas fa-user-tie"></i> <span>Admin</span></a></li>
            @endif
          </ul>

          <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div> -->
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('header')</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 @yield('size')">
                <div class="card">
                  <div class="card-header">
                    @yield('add')
                  </div>
                  <div class="card-body">
                      @yield('content')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="">Rito</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

    

  <!-- General JS Scripts -->
  
  <script src="{{ asset('js/stisla.js') }}"></script>
  <!-- <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.js') }}"></script>
  <script src="{{ asset('js/tooltip.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('js/moment.min.js') }}"></script> -->
  
  
  <!-- JS Libraies -->
  <!-- <script src="{{ asset('js/datatables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.min.js') }}"></script> -->

  <!-- Page Specific JS File -->
  <!-- <script src="{{ asset('js/modules-datatables.js') }}"></script> -->
  
  <!-- Template JS File -->
  <!-- <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script> -->

  <script type="text/javascript">
    $(document).ready(function () {
        $('@yield("table-id")').DataTable({
            dom: 'lfBrtip',
            processing: true,
            serverSide: false,
            buttons: [
              'csv'
            ]
        });
    });
  </script>
</body>
</html>