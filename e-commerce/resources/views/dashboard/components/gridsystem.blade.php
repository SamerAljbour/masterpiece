@extends('dashboardLayout.navAndsidebar')
@section('content')
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Grid System</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Base</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Grid System</a>
                </li>
              </ul>
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mt-3">XL Grid</h4>
                <div class="row row-demo-grid">
                  <div class="col-xl-4">
                    <div class="card">
                      <div class="card-body"><code>.col-xl-4</code></div>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="card">
                      <div class="card-body"><code>.col-xl-4</code></div>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="card">
                      <div class="card-body"><code>.col-xl-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">LG Grid (Collapsed at 992px)</h4>
                <div class="row row-demo-grid">
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body"><code>.col-lg-4</code></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body"><code>.col-lg-4</code></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body"><code>.col-lg-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">MD Grid (Collapsed at 768px)</h4>
                <div class="row row-demo-grid">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body"><code>.col-md-4</code></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body"><code>.col-md-4</code></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body"><code>.col-md-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">SM Grid (Collapsed at 576px)</h4>
                <div class="row row-demo-grid">
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body"><code>.col-sm-4</code></div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body"><code>.col-sm-4</code></div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body"><code>.col-sm-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">XS Grid</h4>
                <div class="row row-demo-grid">
                  <div class="col-4">
                    <div class="card">
                      <div class="card-body"><code>.col-4</code></div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card">
                      <div class="card-body"><code>.col-4</code></div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card">
                      <div class="card-body"><code>.col-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">Equality Width</h4>
                <div class="row row-demo-grid">
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                </div>
                <div class="row row-demo-grid">
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">Setting one column width</h4>
                <div class="row row-demo-grid">
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card">
                      <div class="card-body"><code>col-6</code></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">
                  Mix and Match (Showing different sizes on different screens)
                </h4>
                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row row-demo-grid">
                  <div class="col-12 col-md-8">
                    <div class="card">
                      <div class="card-body"><code>col-12 col-md-8</code></div>
                    </div>
                  </div>
                  <div class="col-6 col-md-4">
                    <div class="card">
                      <div class="card-body"><code>col-6 col-md-6</code></div>
                    </div>
                  </div>
                </div>

                <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                <div class="row row-demo-grid">
                  <div class="col-sm-6 col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <code>col-sm-6 col-md-3</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <code>col-sm-6 col-md-3</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <code>col-sm-6 col-md-3</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <code>col-sm-6 col-md-3</code>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Columns are always 50% wide, on mobile and desktop -->
                <div class="row row-demo-grid">
                  <div class="col-6">
                    <div class="card">
                      <div class="card-body"><code>col-6</code></div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card">
                      <div class="card-body"><code>col-6</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">
                  Offset Grid (Adding some space when needed)
                </h4>
                <div class="row row-demo-grid">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-4</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 ms-auto">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-4 ms-auto</code>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row row-demo-grid">
                  <div class="col-md-4 ms-auto me-auto">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-4 ms-auto me-auto</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 ms-auto me-auto">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-4 ms-auto me-auto</code>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row row-demo-grid">
                  <div class="col-md-6 ms-auto me-auto">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-6 ms-auto me-auto</code>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com">
                    ThemeKita
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>
        </footer>
      </div>

      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Moment JS -->
<script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/setting-demo2.js') }}"></script>

  </body>
</html>
@endsection
