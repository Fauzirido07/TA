<!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('assets/images/logo.ico') }}"
              alt="Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">PPDB SLB-B</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                  <i class="nav-icon bi bi-house"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.jadwal') }}" class="nav-link">
                  <i class="nav-icon bi bi-calendar"></i>
                  <p>Kelola Jadwal Asesmen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link">
                  <i class="nav-icon bi bi-person"></i>
                  <p>Manajemen Guru & Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.prosedur') }}" class="nav-link">
                  <i class="nav-icon bi bi-pin"></i>
                  <p>Kelola Prosedur Pendaftaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.chart') }}" class="nav-link">
                  <i class="nav-icon bi bi-bar-chart"></i>
                  <p>Monitoring Asesmen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.pendaftar') }}" class="nav-link">
                  <i class="nav-icon bi bi-clipboard"></i>
                  <p>Manajemen Pendaftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.ubah_asesmen.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-pen"></i>
                  <p>Ubah Form Asesmen</p>
                </a>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->