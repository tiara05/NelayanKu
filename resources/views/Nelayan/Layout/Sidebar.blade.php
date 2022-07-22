<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              
              <span class="app-brand-text demo menu-text fw-bolder ms-2">NELAYANKU</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{ route('dashboardnelayan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-item ">
              <a href="{{ route('produknelayan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Analytics">Data Produk</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Data Order</span>
            </li>

            <li class="menu-item ">
              <a href="{{ route('ordernelayan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Data Order</div>
              </a>
            </li>

            <li class="menu-item ">
              <a href="{{ route('transaksinelayan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Analytics">Data Transaksi</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Penjualan</span>
            </li>

            <li class="menu-item ">
              <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Analytics">Omzet Penjualan</div>
              </a>
            </li>

        </aside>
        <!-- / Menu -->