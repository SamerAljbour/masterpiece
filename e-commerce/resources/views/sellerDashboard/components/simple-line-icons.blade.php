@extends('adminLayout.navAndsidebar')
@section('content')
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Icons</h3>
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
                  <a href="#">Line Awesome</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Simple Line Icons</div>
                    <div class="card-category">
                      Simple and Minimal Line Icons from
                      <a
                        class="link"
                        href="https://github.com/thesabbir/simple-line-icons"
                        >Simple Line Icons</a
                      >
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="row-demo-icon" class="row"></div>
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
<!-- Core JS Files -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/setting-demo2.js') }}"></script>

    <script>
      var iconClass = [
        "icon-user",
        "icon-people",
        "icon-user-female",
        "icon-user-follow",
        "icon-user-following",
        "icon-user-unfollow",
        "icon-login",
        "icon-logout",
        "icon-emotsmile",
        "icon-phone",
        "icon-call-end",
        "icon-call-in",
        "icon-call-out",
        "icon-map",
        "icon-location-pin",
        "icon-direction",
        "icon-directions",
        "icon-compass",
        "icon-layers",
        "icon-menu",
        "icon-list",
        "icon-options-vertical",
        "icon-options",
        "icon-arrow-down",
        "icon-arrow-left",
        "icon-arrow-right",
        "icon-arrow-up",
        "icon-arrow-up-circle",
        "icon-arrow-left-circle",
        "icon-arrow-right-circle",
        "icon-arrow-down-circle",
        "icon-check",
        "icon-clock",
        "icon-plus",
        "icon-close",
        "icon-trophy",
        "icon-screen-smartphone",
        "icon-screen-desktop",
        "icon-plane",
        "icon-notebook",
        "icon-mustache",
        "icon-mouse",
        "icon-magnet",
        "icon-energy",
        "icon-disc",
        "icon-cursor",
        "icon-cursor-move",
        "icon-crop",
        "icon-chemistry",
        "icon-speedometer",
        "icon-shield",
        "icon-screen-tablet",
        "icon-magic-wand",
        "icon-hourglass",
        "icon-graduation",
        "icon-ghost",
        "icon-game-controller",
        "icon-fire",
        "icon-eyeglass",
        "icon-envelope-open",
        "icon-envelope-letter",
        "icon-bell",
        "icon-badge",
        "icon-anchor",
        "icon-wallet",
        "icon-vector",
        "icon-speech",
        "icon-puzzle",
        "icon-printer",
        "icon-present",
        "icon-playlist",
        "icon-pin",
        "icon-picture",
        "icon-handbag",
        "icon-globe-alt",
        "icon-globe",
        "icon-folder-alt",
        "icon-folder",
        "icon-film",
        "icon-feed",
        "icon-drop",
        "icon-drawer",
        "icon-docs",
        "icon-doc",
        "icon-diamond",
        "icon-cup",
        "icon-calculator",
        "icon-bubbles",
        "icon-briefcase",
        "icon-book-open",
        "icon-basket-loaded",
        "icon-basket",
        "icon-bag",
        "icon-action-undo",
        "icon-action-redo",
        "icon-wrench",
        "icon-umbrella",
        "icon-trash",
        "icon-tag",
        "icon-support",
        "icon-frame",
        "icon-size-fullscreen",
        "icon-size-actual",
        "icon-shuffle",
        "icon-share-alt",
        "icon-share",
        "icon-rocket",
        "icon-question",
        "icon-pie-chart",
        "icon-pencil",
        "icon-note",
        "icon-loop",
        "icon-home",
        "icon-grid",
        "icon-graph",
        "icon-microphone",
        "icon-music-tone-alt",
        "icon-music-tone",
        "icon-earphones-alt",
        "icon-earphones",
        "icon-equalizer",
        "icon-like",
        "icon-dislike",
        "icon-control-start",
        "icon-control-rewind",
        "icon-control-play",
        "icon-control-pause",
        "icon-control-forward",
        "icon-control-end",
        "icon-volume-1",
        "icon-volume-2",
        "icon-volume-off",
        "icon-calendar",
        "icon-bulb",
        "icon-chart",
        "icon-ban",
        "icon-bubble",
        "icon-camrecorder",
        "icon-camera",
        "icon-cloud-download",
        "icon-cloud-upload",
        "icon-envelope",
        "icon-eye",
        "icon-flag",
        "icon-heart",
        "icon-information",
        "icon-key",
        "icon-link",
        "icon-lock",
        "icon-lock-open",
        "icon-magnifier",
        "icon-magnifier-add",
        "icon-magnifier-remove",
        "icon-paper-clip",
        "icon-paper-plane",
        "icon-power",
        "icon-refresh",
        "icon-reload",
        "icon-settings",
        "icon-star",
        "icon-symbol-female",
        "icon-symbol-male",
        "icon-target",
        "icon-credit-card",
        "icon-paypal",
        "icon-social-tumblr",
        "icon-social-twitter",
        "icon-social-facebook",
        "icon-social-instagram",
        "icon-social-linkedin",
        "icon-social-pinterest",
        "icon-social-github",
        "icon-social-gplus",
        "icon-social-reddit",
        "icon-social-skype",
        "icon-social-dribbble",
        "icon-social-behance",
        "icon-social-foursqare",
        "icon-social-soundcloud",
        "icon-social-spotify",
        "icon-social-stumbleupon",
        "icon-social-youtube",
        "icon-social-dropbox",
      ];
      var rowDemoIcon = "#row-demo-icon";
      for (i = 0; i < iconClass.length; i++) {
        $(rowDemoIcon).append(
          '<div class="col-md-3"> <div class="demo-icon"> <div class="icon-preview"><i class="' +
            iconClass[i] +
            '"></i></div> <div class="icon-class">' +
            iconClass[i] +
            "</div> </div> </div>"
        );
      }
    </script>
  </body>
</html>
@endsection
