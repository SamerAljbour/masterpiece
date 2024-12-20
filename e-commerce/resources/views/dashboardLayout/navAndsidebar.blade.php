<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link
  rel="icon"
  href="{{ asset('assets/img/logo.png') }}"
  type="image/x-icon"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Load Chart.js -->
   <!--   Core JS Files   -->
   <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
   <script src="../assets/js/core/popper.min.js"></script>
   {{-- <script src="../assets/js/core/bootstrap.min.js"></script> --}}

   <!-- jQuery Scrollbar -->
   <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
   <!-- Datatables -->
   <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
   <!-- Kaiadmin JS -->
   <script src="../assets/js/kaiadmin.min.js"></script>
   <!-- Kaiadmin DEMO methods, don't include it in your project! -->
   <script src="../assets/js/setting-demo2.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMcZ6ZKKjCz3WXABHgPfcu7z5aGA4m1ZZkFfgzL" crossorigin="anonymous">

    <!-- Fonts and icons -->
    <base href="{{ url('/') }}/">

    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <!-- Sweet Alert -->
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert@1.1.3/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert@1.1.3/dist/sweetalert.css">
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .modal-header {
            background-color: #4e73df;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 1rem 1.5rem;
        }
        .btn-close {
            filter: brightness(0) invert(1);
        }
        .modal-body {
            padding: 2rem;
        }
        .form-label {
            color: #4e73df;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #e3e6f0;
            padding: 0.75rem;
            margin-bottom: 1rem;
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        .btn {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-success {
            background-color: #1cc88a;
            border: none;
        }
        .btn-success:hover {
            background-color: #169b6b;
            transform: translateY(-2px);
        }
    </style>
<!-- CSS Files -->
<base href="{{ url('/') }}/">

<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/css/plugins.min.css" />
<link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
<link rel="stylesheet" href="css/app.css">
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> --}}
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script> --}}
<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css" />


  </head>
  <body>
    {{-- for notification  --}}
    @if (Auth::user()->role_id == 2)
    @php
    // Call the method to get low stock products and notifications
    $lowStockData = \App\Models\Product::checkLowStockAndNotify();
    $lowStockProducts = $lowStockData['lowStockProducts'];
    $outOfStockProducts = $lowStockData['outOfStockProducts'];

    // Sort low stock products by stock level (ascending)
    $sortedLowStockProducts = $lowStockProducts->sortBy('stock_level'); // Assuming 'stock_level' is the column name

    // Sort out of stock products by name or any other criteria (you can adjust the key as needed)
    $sortedOutOfStockProducts = $outOfStockProducts->sortBy('name'); // Assuming 'name' is the column name

    // Count of notifications from the low stock data
    $countOfNotifications = $lowStockData['countOfNotifications'];

    // Count unread low stock notifications
    $unreadOutOfStockNotificationsLow = \App\Models\Notification::where('user_id', Auth::id())
        ->where('type', 'low_stock')
        ->whereNull('read_at') // Count only unread notifications
        ->count();
    // Count unread out of stock notifications
    $unreadOutOfStockNotificationsOut = \App\Models\Notification::where('user_id', Auth::id())
        ->where('type', 'out_of_stock')
        ->whereNull('read_at') // Count only unread notifications
        ->count();
        $allCount =  $unreadOutOfStockNotificationsLow +  $unreadOutOfStockNotificationsOut;
@endphp



    @else
    @php
    // Retrieve 'account_created' and 'bad_review' notifications only for admin
    $accountCreationNotifications = \App\Models\Notification::where('user_id', Auth::id())
        ->where('type', 'account_created')
        ->where('admin', 1)
        ->get();

    $badReviewNotifications = \App\Models\Notification::where('user_id', Auth::id())
        ->where('type', 'bad_review')
        ->where('admin', 1)
        ->get();

    // Combine notifications and sort unread ones first
    $allNotifications = $accountCreationNotifications->merge($badReviewNotifications);
    $sortedNotifications = $allNotifications->sortBy(function ($notification) {
        return $notification->read_at ? 1 : 0; // Sort unread first
    });

    // Count unread notifications
    $notifyCount = $accountCreationNotifications->whereNull('read_at')->count() + $badReviewNotifications->whereNull('read_at')->count();
    @endphp



    @endif
<!-- Edit Profile Modal -->
<form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone }}" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" required>{{ Auth::user()->address }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Profile Image</label>
                        <input type="file" class="form-control" name="user_image">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success rounded-5">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    <div class="wrapper">

     <!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img
                    src="assets/img/logo.png"
                    alt="navbar brand"
                    class="navbar-brand"
                    {{-- height="20" --}}
                />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->routeIs('sellerDashboard') || request()->routeIs('adminDashboard') ? 'active' : '' }}">
                    @if (Auth::user()->role_id == 2)
                    <a href="{{ route('sellerDashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                        <span class=""></span>
                    </a>
                    @else
                    <a href="{{ route('adminDashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                        <span class=""></span>
                    </a>
                    @endif
                </li>

                @if (Auth::user()->role_id == 2)
                <li class="nav-item {{ request()->routeIs('profileStore') ? 'active' : '' }}">
                    <a href="{{ route('profileStore') }}">
                        <i class="fas fa-store"></i>
                        <p> My Store</p>
                        <span class=""></span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role_id == 3)
                <li class="nav-item {{ request()->routeIs('allUsers') ? 'active' : '' }}">
                    <a href="{{ route('allUsers') }}">
                        <i class="fas fa-user-circle"></i>
                        <p>Manage Users</p>
                        <span class=""></span>
                    </a>
                </li>
                @endif

                <li class="nav-item {{ request()->routeIs('allStores') ? 'active' : '' }}">
                    @if (Auth::user()->role_id == 3)
                    <a href="{{ route('allStores') }}">
                        <i class="fas fa-store"></i>
                        <p>All Stores</p>
                        <span class=""></span>
                    </a>
                    @endif
                </li>

                <li class="nav-item {{ request()->routeIs('alldiscounts') || request()->routeIs('allsellerdiscounts') ? 'active' : '' }}">
                    @if (Auth::user()->role_id == 3)
                    <a href="{{ route('alldiscounts') }}">
                        <i class="fas fa-money-bill-wave"></i>
                        <p>Manage Discounts</p>
                        <span class=""></span>
                    </a>
                    @elseif (Auth::user()->role_id == 2)
                    <a href="{{ route('allsellerdiscounts', Auth::user()->id) }}">
                        <i class="fas fa-money-bill-wave"></i>
                        <p>Manage Discounts</p>
                        <span class=""></span>
                    </a>
                    @endif
                </li>

                @if (Auth::user()->role_id == 3)
                <li class="nav-item {{ request()->routeIs('allCategories') ? 'active' : '' }}">
                    <a href="{{ route('allCategories') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Manage Categories</p>
                        <span class=""></span>
                    </a>
                </li>
                @endif

                <li class="nav-item {{ request()->routeIs('allProducts') ? 'active' : '' }}">
                   @if (Auth::user()->role_id == 3)
                   <a href="{{ route('allProducts') }}">
                    <i class="fas fa-tag"></i>
                    <p>Manage Products</p>
                    <span class=""></span>
                </a>
                   @endif
                </li>

                @if (Auth::user()->role_id == 3)
                <li class="nav-item {{ request()->routeIs('allreviews') ? 'active' : '' }}">
                    <a href="{{ route('allreviews') }}">
                        <i class="fas fa-comments"></i>
                        <p>Manage Reviews</p>
                        <span class=""></span>
                    </a>
                </li>
                @endif

                <li class="nav-item {{ request()->routeIs('restoreProducts') ? 'active' : '' }}">
                    <a href="{{ route('restoreProducts') }}">
                        <i class="fas fa-history"></i>
                        <p>Restore Products</p>
                        <span class=""></span>
                    </a>
                </li>



                <li class="nav-item {{ request()->routeIs('allAdsRequest') ? 'active' : '' }}">
                    <a href="{{ route('allAdsRequest') }}">
                        <i class="fas fa-bullhorn"></i>
                        <p>Ads Requests</p>
                        <span class=""></span>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-arrow-left"></i>
                        <p>Back To Home</p>
                        <span class=""></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="" class="logo">
                <img
                  src="assets/img/adshere.png"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              {{-- <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav> --}}

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  {{-- <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a> --}}
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>

                @if (Auth::user()->role_id == 3)


                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="notifDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-bell"></i>
                    <span class="notification">{{$notifyCount}}</span>
                  </a>
                  <ul
                    class="dropdown-menu notif-box animated fadeIn"
                    aria-labelledby="notifDropdown"
                  >
                    <li>
                      <div class="dropdown-title">
                        You have {{ $notifyCount  }} new notification
                      </div>
                    </li>
                    <li>
                      <div class="notif-scroll scrollbar-outer">
                        <div class="notif-center">
                            @foreach($sortedNotifications as $notfiy)
    <a style="background-color: {{ is_null($notfiy->read_at) ? '#e0f7fa' : 'white' }};">
        <div class="notif-icon notif-success">
            <i class="fa fa-check"></i>
        </div>
        <div class="notif-content w-75">
            <span class="block">Seller, {{ $notfiy->user->name }}: {{ json_decode($notfiy->data)->message }}</span>
            <span class="time">{{ $notfiy->created_at->diffForHumans() }}</span>
            @if(is_null($notfiy->read_at))
                <form action="{{ route('notifications.markAsRead', $notfiy->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-link fs-0" style="font-size: 0.75rem; margin-left:12%; position: relative;">Mark as Read</button>
                </form>
            @endif
        </div>
    </a>
@endforeach
{{-- @foreach($badReviewNotifications as $notify)
<a style="background-color: {{ is_null($notify->read_at) ? '#e0f7fa' : 'white' }};">
    <div class="notif-icon notif-warning">
        <i class="fa fa-exclamation-triangle"></i> <!-- Changed to indicate a warning -->
    </div>
    <div class="notif-content">
        <span class="block"> {{ json_decode($notify->data)->message }}{{ json_decode($notify->data)->review_id }}</span> <!-- Adjusted to show the actual message -->
        <span class="time">{{ $notify->created_at->diffForHumans() }}</span>
        @if(is_null($notify->read_at))
            <form action="{{ route('notifications.markAsRead', $notify->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-link fs-0" style="font-size: 0.75rem; margin-left:12%; position: relative;">Mark as Read</button>
            </form>
        @endif
    </div>
</a>
@endforeach --}}




                          {{-- <a href="#">
                            <div class="notif-icon notif-success">
                              <i class="fa fa-comment"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Rahmad commented on Admin
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/profile2.jpg"
                                alt="Img Profile"
                              />
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Reza send messages to you
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-icon notif-danger">
                              <i class="fa fa-heart"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> Farrah liked Admin </span>
                              <span class="time">17 minutes ago</span>
                            </div>
                          </a> --}}
                        </div>
                      </div>
                    </li>
                    {{-- <li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all notifications<i class="fa fa-angle-right"></i>
                      </a>
                    </li> --}}
                  </ul>
                </li>
                @else
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="notifDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-bell"></i>
                    <span class="notification">{{$allCount}}</span>
                  </a>
                  <ul
                    class="dropdown-menu notif-box animated fadeIn"
                    aria-labelledby="notifDropdown"
                  >
                    <li>
                      <div class="dropdown-title">
                        You have {{ $allCount  }} new notification
                      </div>
                    </li>
                    <li>
                      <div class="notif-scroll scrollbar-outer">
                        <div class="notif-center">
                            @foreach($lowStockProducts as $product)
    <a  style="background-color: {{ is_null($product->notification) || !is_null($product->notification->read_at) ? 'white' : '#e0f7fa' }};">
        <div class="notif-icon notif-warning" >
            <i class="fa fa-warning"></i>
        </div>
        <div class="notif-content" style="width:80%">
            <span class="block">{{ $product->name }}: Only {{ $product->total_stock }} left in stock.</span>
            <span class="time">{{ $product->created_at->diffForHumans() }}</span>
            @if($product->notification && is_null($product->notification->read_at))
                <form action="{{ route('notifications.markAsRead', $product->notification->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-link fs-0" style="font-size: 0.75rem; margin-left:12%;position: absolute;">Mark as Read</button>
                </form>
            @endif
        </div>
    </a>
@endforeach

@foreach($outOfStockProducts as $product)
    <a  style="background-color: {{ is_null($product->notification) || !is_null($product->notification->read_at) ? 'white' : '#e0f7fa   ' }};">
        <div class="notif-icon notif-danger">
            <i class="fa fa-warning"></i>
        </div>
        <div class="notif-content">
            <span class="block">{{ $product->name }}: Out of stock.</span>
            <span class="time">{{ $product->created_at->diffForHumans() }}</span>
            @if($product->notification && is_null($product->notification->read_at))
                <form action="{{ route('notifications.markAsRead', $product->notification->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-link fs-0" style="font-size: 0.75rem; margin-left:12% ;position: absolute;">Mark as Read</button>
                </form>
            @endif
        </div>
    </a>
@endforeach


                          {{-- <a href="#">
                            <div class="notif-icon notif-success">
                              <i class="fa fa-comment"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Rahmad commented on Admin
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/profile2.jpg"
                                alt="Img Profile"
                              />
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Reza send messages to you
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-icon notif-danger">
                              <i class="fa fa-heart"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> Farrah liked Admin </span>
                              <span class="time">17 minutes ago</span>
                            </div>
                          </a> --}}
                        </div>
                      </div>
                    </li>
                    {{-- <li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all notifications<i class="fa fa-angle-right"></i>
                      </a>
                    </li> --}}
                  </ul>
                </li>

                @endif


                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="{{ Storage::url(Auth::user()->user_image) }}"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      {{-- <span class="op-7">Hi,</span> --}}
                      <span class="fw-bold">{{ Auth::user()->name }}</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="{{ Storage::url(Auth::user()->user_image) }}"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>{{ Auth::user()->name }}</h4>
                            <p class="text-muted">{{ Auth::user()->email }}</p>
                            <button type="button" class="btn btn-xs btn-secondary btn-s" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                <i class="fas fa-edit me-2"></i>Edit Profile
                            </button>


                          </div>
                        </div>
                      </li>
                      <li>
                        {{-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('dashProfile') }}">My Profile</a>
                        <a class="dropdown-item" href="#">My Balance</a>
                        <a class="dropdown-item" href="#">Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Account Setting</a> --}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

@yield('content')
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

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
<script src="{{ asset('assets/js/setting-demo.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
<script>
    var SweetAlert2Demo = (function () {
        //== Demos
        var initDemos = function () {
          //== Sweetalert Demo 1
          $("#alert_demo_1").click(function (e) {
            swal("Good job!", {
              buttons: {
                confirm: {
                  className: "btn btn-success",
                },
              },
            });
          });

          //== Sweetalert Demo 2
          $("#alert_demo_2").click(function (e) {
            swal("Here's the title!", "...and here's the text!", {
              buttons: {
                confirm: {
                  className: "btn btn-success",
                },
              },
            });
          });

          //== Sweetalert Demo 3
          $("#alert_demo_3_1").click(function (e) {
            swal("Good job!", "You clicked the button!", {
              icon: "warning",
              buttons: {
                confirm: {
                  className: "btn btn-warning",
                },
              },
            });
          });

          $("#alert_demo_3_2").click(function (e) {
            swal("Good job!", "You clicked the button!", {
              icon: "error",
              buttons: {
                confirm: {
                  className: "btn btn-danger",
                },
              },
            });
          });

          $("#alert_demo_3_3").click(function (e) {
            swal("Good job!", "You clicked the button!", {
              icon: "success",
              buttons: {
                confirm: {
                  className: "btn btn-success",
                },
              },
            });
          });

          $("#alert_demo_3_4").click(function (e) {
            swal("Good job!", "You clicked the button!", {
              icon: "info",
              buttons: {
                confirm: {
                  className: "btn btn-info",
                },
              },
            });
          });

          //== Sweetalert Demo 4
          $("#alert_demo_4").click(function (e) {
            swal({
              title: "Good job!",
              text: "You clicked the button!",
              icon: "success",
              buttons: {
                confirm: {
                  text: "Confirm Me",
                  value: true,
                  visible: true,
                  className: "btn btn-success",
                  closeModal: true,
                },
              },
            });
          });

          $("#alert_demo_5").click(function (e) {
            swal({
              title: "Input Something",
              html: '<br><input class="form-control" placeholder="Input Something" id="input-field">',
              content: {
                element: "input",
                attributes: {
                  placeholder: "Input Something",
                  type: "text",
                  id: "input-field",
                  className: "form-control",
                },
              },
              buttons: {
                cancel: {
                  visible: true,
                  className: "btn btn-danger",
                },
                confirm: {
                  className: "btn btn-success",
                },
              },
            }).then(function () {
              swal("", "You entered : " + $("#input-field").val(), "success");
            });
          });

          $("#alert_demo_6").click(function (e) {
            swal("This modal will disappear soon!", {
              buttons: false,
              timer: 3000,
            });
          });

          $("#alert_demo_7").click(function (e) {
            swal({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              type: "warning",
              buttons: {
                confirm: {
                  text: "Yes, delete it!",
                  className: "btn btn-success",
                },
                cancel: {
                  visible: true,
                  className: "btn btn-danger",
                },
              },
            }).then((Delete) => {
              if (Delete) {
                swal({
                  title: "Deleted!",
                  text: "Your file has been deleted.",
                  type: "success",
                  buttons: {
                    confirm: {
                      className: "btn btn-success",
                    },
                  },
                });
              } else {
                swal.close();
              }
            });
          });

          $("#alert_demo_8").click(function (e) {
            swal({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              type: "warning",
              buttons: {
                cancel: {
                  visible: true,
                  text: "No, cancel!",
                  className: "btn btn-danger",
                },
                confirm: {
                  text: "Yes, delete it!",
                  className: "btn btn-success",
                },
              },
            }).then((willDelete) => {
              if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                  buttons: {
                    confirm: {
                      className: "btn btn-success",
                    },
                  },
                });
              } else {
                swal("Your imaginary file is safe!", {
                  buttons: {
                    confirm: {
                      className: "btn btn-success",
                    },
                  },
                });
              }
            });
          });
        };

        return {
          //== Init
          init: function () {
            initDemos();
          },
        };
      })();
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });


      });

      //== Class Initialization
      jQuery(document).ready(function () {
        SweetAlert2Demo.init();
      });
      document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Errors',
                html: '<ul>' +
                    @foreach ($errors->all() as $error)
                        '<li>{{ $error }}</li>' +
                    @endforeach
                '</ul>',
            });
        @endif
    });
</script>
  </body>
</html>
