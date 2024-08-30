@extends('adminLayout.navAndsidebar')
@section('content')
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Buttons</h3>
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
                  <a href="#">Buttons</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Button Original</h4>
                  </div>
                  <div class="card-body">
                    <p class="demo">
                      <button class="btn btn-black">Default</button>

                      <button class="btn btn-primary">Primary</button>

                      <button class="btn btn-secondary">Secondary</button>

                      <button class="btn btn-info">Info</button>

                      <button class="btn btn-success">Success</button>

                      <button class="btn btn-warning">Warning</button>

                      <button class="btn btn-danger">Danger</button>

                      <button class="btn btn-link">Link</button>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Button with Label</h4>
                  </div>
                  <div class="card-body">
                    <p class="demo">
                      <button class="btn btn-black">
                        <span class="btn-label">
                          <i class="fa fa-archive"></i>
                        </span>
                        Default
                      </button>

                      <button class="btn btn-primary">
                        <span class="btn-label">
                          <i class="fa fa-bookmark"></i>
                        </span>
                        Primary
                      </button>

                      <button class="btn btn-secondary">
                        <span class="btn-label">
                          <i class="fa fa-plus"></i>
                        </span>
                        Secondary
                      </button>

                      <button class="btn btn-info">
                        <span class="btn-label">
                          <i class="fa fa-info"></i>
                        </span>
                        Info
                      </button>

                      <button class="btn btn-success">
                        <span class="btn-label">
                          <i class="fa fa-check"></i>
                        </span>
                        Success
                      </button>

                      <button class="btn btn-warning">
                        <span class="btn-label">
                          <i class="fa fa-exclamation-circle"></i>
                        </span>
                        Warning
                      </button>

                      <button class="btn btn-danger">
                        <span class="btn-label">
                          <i class="fa fa-heart"></i>
                        </span>
                        Danger
                      </button>

                      <button class="btn btn-link">
                        <span class="btn-label">
                          <i class="fa fa-link"></i>
                        </span>
                        Link
                      </button>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Button Icon</h4>
                  </div>
                  <div class="card-body">
                    <p class="demo">
                      <button
                        type="button"
                        class="btn btn-icon btn-round btn-black"
                      >
                        <i class="fa fa-align-left"></i>
                      </button>

                      <button
                        type="button"
                        class="btn btn-icon btn-round btn-primary"
                      >
                        <i class="fab fa-twitter"></i>
                      </button>

                      <button
                        type="button"
                        class="btn btn-icon btn-round btn-secondary"
                      >
                        <i class="fa fa-bookmark"></i>
                      </button>

                      <button
                        type="button"
                        class="btn btn-icon btn-round btn-info"
                      >
                        <i class="fa fa-info"></i>
                      </button>

                      <button
                        type="button"
                        class="btn btn-icon btn-round btn-success"
                      >
                        <i class="fa fa-check"></i>
                      </button>

                      <button
                        type="button"
                        class="btn btn-icon btn-round btn-warning"
                      >
                        <i class="fa fa-exclamation-circle"></i>
                      </button>

                      <button
                        type="button"
                        class="btn btn-icon btn-round btn-danger"
                      >
                        <i class="fa fa-heart"></i>
                      </button>

                      <button type="button" class="btn btn-icon btn-link">
                        <i class="fa fa-link"></i>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Disabled Button</h4>
                  </div>
                  <div class="card-body">
                    <p class="demo">
                      <button class="btn btn-black" disabled="disabled">
                        Default
                      </button>

                      <button class="btn btn-primary" disabled="disabled">
                        Primary
                      </button>

                      <button class="btn btn-secondary" disabled="disabled">
                        Secondary
                      </button>

                      <button class="btn btn-info" disabled="disabled">
                        Info
                      </button>

                      <button class="btn btn-success" disabled="disabled">
                        Success
                      </button>

                      <button class="btn btn-warning" disabled="disabled">
                        Warning
                      </button>

                      <button class="btn btn-danger" disabled="disabled">
                        Danger
                      </button>

                      <button class="btn btn-link" disabled>Link</button>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Button Size</h4>
                  </div>
                  <div class="card-body">
                    <p class="demo">
                      <button class="btn btn-primary btn-lg">Large</button>

                      <button class="btn btn-primary">Normal</button>

                      <button class="btn btn-primary btn-sm">Small</button>

                      <button class="btn btn-primary btn-xs">
                        Extra Small
                      </button>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Button Type</h4>
                  </div>
                  <div class="card-body">
                    <p class="demo">
                      <button class="btn btn-primary">Normal</button>
                      <button class="btn btn-primary btn-border">Border</button>

                      <button class="btn btn-primary btn-round">Round</button>

                      <button class="btn btn-primary btn-border btn-round">
                        Round
                      </button>

                      <button class="btn btn-primary btn-link">Link</button>
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Bootstrap Dropdown</h4>
                  </div>
                  <div class="card-body">
                    <div class="demo">
                      <div class="btn-group dropdown">
                        <button
                          class="btn btn-primary dropdown-toggle"
                          type="button"
                          data-bs-toggle="dropdown"
                        >
                          DropDown
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </li>
                        </ul>
                      </div>

                      <div class="btn-group dropup">
                        <button
                          class="btn btn-info dropdown-toggle"
                          type="button"
                          data-bs-toggle="dropdown"
                        >
                          DropUp
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </li>
                        </ul>
                      </div>

                      <div class="btn-group dropend">
                        <button
                          type="button"
                          class="btn btn-success btn-round dropdown-toggle"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          DropRight
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </li>
                        </ul>
                      </div>

                      <div class="btn-group dropstart">
                        <button
                          type="button"
                          class="btn btn-black btn-border dropdown-toggle"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          DropLeft
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Badge</h4>
                  </div>
                  <div class="card-body">
                    <span class="badge badge-count">Count</span>
                    <span class="badge badge-black">Default</span>
                    <span class="badge badge-primary">Primary</span>
                    <span class="badge badge-info">Info</span>
                    <span class="badge badge-success">Success</span>
                    <span class="badge badge-warning">Warning</span>
                    <span class="badge badge-danger">Danger</span>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Nav Pills</h4>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-pills nav-primary">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Pagination</h4>
                  </div>
                  <div class="card-body">
                    <div class="demo">
                      <ul class="pagination pg-primary">
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
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
