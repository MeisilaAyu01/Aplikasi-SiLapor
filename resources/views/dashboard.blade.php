<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('asset/') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('asset/vendor/js/helpers.js') }}"></script>

    <!-- Config -->
    <script src="{{ asset('asset/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('layouts.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('layouts.navbar')

          <style>
              .container {
                  max-width: 1100px;
              }
          
              .card {
                  border-radius: 15px;
                  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                  transition: all 0.3s ease-in-out;
              }
          
              .card:hover {
                  transform: scale(1.02);
              }
          
              .table {
                  border-radius: 10px;
                  overflow: hidden;
              }
          
              body.modal-open {
              padding-right: 0px !important;
              }
          
              .modal {
                  animation: none !important;
                  transform: none !important;
              }
          
              .modal-body input {
                  width: 100%;
              }
          
              .table thead {
                  background: linear-gradient(to right,#87CEEB, #007bff);
                  color: white;
              }
          
              .btn-primary, .btn-danger, .btn-success, .btn-warning {
                  border-radius: 8px;
                  font-weight: bold;
              }
          
              .btn-danger:hover {
                  background-color: #c82333;
              }
          
              .img-thumbnail {
                  border-radius: 10px;
              }
          
          </style>
          
          <div class="container mt-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                  <h1 class="h3 fw-bold text-primary">Daftar Laporan</h1>
                  <a href="{{ route('laporan.create') }}" class="btn btn-success shadow-sm">
                      <i class="bi bi-plus-circle"></i> Tambah Laporan
                  </a>
              </div>
          
              @if (session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              @endif
          
              <div class="card">
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-hover table-bordered">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Nama Kegiatan</th>
                                      <th>Gambar</th>
                                      <th>Tanggal</th>
                                      <th>Lokasi</th>
                                      <th>Tanggapan</th>
                                      <th class="text-center">Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($laporan as $index => $item)
                                      <tr>
                                          <td>{{ $index + 1 }}</td>
                                          <td class="fw-bold">{{ $item->nama_kegiatan }}</td>
                                          <td class="text-center">
                                              @if ($item->image)
                                                  <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar" class="img-thumbnail" width="60">
                                              @else
                                                  <span class="text-muted">Tidak ada gambar</span>
                                              @endif
                                          </td>
                                          <td>{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}</td>
                                          <td>{{ $item->lokasi }}</td>
                                          <td>{{ optional($item->tanggapan)->tanggapan ?? 'Belum ada' }}</td>
                                          <td class="text-center">
                                                  <div class="d-flex flex-column">
                                                      <a href="{{ route('laporan.show', $item->laporanID) }}" class="btn btn-sm btn-info mb-1" title="Lihat">
                                                          <i class="fas fa-eye"></i> Detail
                                                      </a>
                                                      <!-- Tampilkan Button Lihat PDF Jika Sudah Ada -->
                                                      @if ($item->pdf_file)
                                                      <a href="{{ Storage::url($item->pdf_file) }}" target="_blank" class="btn btn-warning btn-sm">
                                                          <i class="bi bi-file-earmark-pdf"></i> Lihat PDF
                                                      </a>
                                                    @else
                                                      <span class="text-muted">Tidak ada PDF</span>
                                                    @endif
                                                      
                                                         
                                                   
                                                      <button class="btn btn-primary dropdown-toggle w-100" type="button" id="dropdownEmail" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; justify-content: center;">
                                                          <i class="bx bx-envelope"></i> Kirim Email
                                                      </button>
                                                      <ul class="dropdown-menu shadow-lg" aria-labelledby="dropdownEmail" style="min-width: 350px; border-radius: 8px; padding: 10px; list-style: none;">
                                                          <div>
                                                              <h6 class="dropdown-header text-center m-0">Masukkan Email Tujuan</h6>
                                                          </div>
                                                          <form action="{{ route('laporan.kirimEmail', $item->laporanID) }}" method="POST">
                                                              @csrf
                                                              <div class="mb-2">
                                                                  <label for="email" class="form-label">Email Tujuan:</label>
                                                                  <input type="text" name="email" id="email" class="form-control" required placeholder="Pisahkan dengan koma jika lebih dari satu">
                                                              </div>
                                                              <button type="submit" class="btn btn-success w-100 d-flex align-items-center justify-content-center">
                                                                  <i class="bx bx-send me-2"></i> Kirim
                                                              </button>
                                                          </form>
                                                      </ul>
                                                  
                                                                                                                                                                                                           
                                                      @if(in_array(auth()->user()->role, ['user', 'admin']))
                                                      @if (!$item->tanggapan)
                                                          <!-- Misal di dalam foreach($laporans as $laporan) -->
                                                          <a href="{{ route('tanggapan.create', $item->laporanID) }}" class="btn btn-success">
                                                              Buat Tanggapan
                                                          </a>
                                                      @endif
                                                      @endif
          
                                                    
                                                  </div>
                                          </td>
                                      </tr>
                                  @endforeach
          
                                  <script>
                                      document.addEventListener("DOMContentLoaded", function() {
                                          // Tangkap semua tombol kirim email
                                          document.querySelectorAll('.btn-kirim-email').forEach(button => {
                                              button.addEventListener('click', function() {
                                                  var laporanID = this.getAttribute('data-laporan-id');
                                                  var form = document.getElementById('emailForm');
                                  
                                                  // Set action form sesuai laporan yang diklik
                                                  form.action = "/laporan/" + laporanID + "/kirim-email";
                                              });
                                          });
                                      });
                                  </script>
                                  
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
                <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
              
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
   

    <!-- Core JS -->
    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('asset/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('asset/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('asset/js/dashboards-analytics.js') }}"></script>

    <!-- GitHub Buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
