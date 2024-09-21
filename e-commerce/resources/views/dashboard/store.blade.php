@extends('dashboardLayout.navAndsidebar')
@section('content')

 <link
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
            rel="stylesheet"
        /><style type="text/css">
#removeBorder{
        border: 0 !important;
    }
    body{
background:#eee;
/* padding-top:20px; */
}
.img-fluid {
max-width: 100%;
height: auto;
}

.card {
margin-bottom: 30px;
}

.overflow-hidden {
overflow: hidden!important;
}

.p-0 {
padding: 0!important;
}

.mt-n5 {
margin-top: -3rem!important;
}

/* .linear-gradient {
background-image: linear-gradient(#50b2fc,#f44c66);
} */

.rounded-circle {
border-radius: 50%!important;
}

.align-items-center {
align-items: center!important;
}

.justify-content-center {
justify-content: center!important;
}

.d-flex {
display: flex!important;
}

.rounded-2 {
border-radius: 7px !important;
}

.bg-light-info {
--bs-bg-opacity: 1;
background-color: rgba(235,243,254,1)!important;
}

.card {
margin-bottom: 30px;
}

.position-relative {
position: relative!important;
}

.shadow-none {
box-shadow: none!important;
}

.overflow-hidden {
overflow: hidden!important;
}

.border {
border: 1px solid #ebf1f6 !important;
}

.fs-6 {
font-size: 1.25rem!important;
}

.mb-2 {
margin-bottom: 0.5rem!important;
}

.d-block {
display: block!important;
}

a {
text-decoration: none;
}

.user-profile-tab .nav-item .nav-link.active {
color: #5d87ff;
border-bottom: 2px solid #5d87ff;
}

.mb-9 {
margin-bottom: 20px!important;
}

.fw-semibold {
font-weight: 600!important;
}
.fs-4 {
font-size: 1rem!important;
}

.card, .bg-light {
box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}

.fs-2 {
font-size: .75rem!important;
}

.rounded-4 {
border-radius: 4px !important;
}

.ms-7 {
margin-left: 30px!important;
}
</style>
<div class="container">
<div class="container">
    <div class="card overflow-hidden">
        <div class="card-body p-0">
            <img
                src="https://www.bootdey.com/image/1352x300/00FFFF/000000"
                alt
                class="img-fluid"
            />
            <div class="row align-items-center">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div
                        class="d-flex align-items-center justify-content-around m-4"
                    >
                        <div class="text-center">
                            <i class="fa fa-file fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1">938</h4>
                            <p class="mb-0 fs-4">Posts</p>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-user fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1">3,586</h4>
                            <p class="mb-0 fs-4">Followers</p>
                        </div>
                        <div class="text-center">
                            <i
                                class="fa fa-check fs-6 d-block mb-2"
                            ></i>
                            <h4 class="mb-0 fw-semibold lh-1">2,659</h4>
                            <p class="mb-0 fs-4">Following</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                    <div class="mt-n5">
                        <div
                            class="d-flex align-items-center justify-content-center mb-2"
                        >
                            <div
                                class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 110px; height: 110px"
                                ;
                            >
                                <div
                                    class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                    style="width: 100px; height: 100px"
                                    ;
                                >
                                    <img
                                        src="{{ Storage::url(Auth::user()->user_image) }}"
                                        alt
                                        class="w-100 h-100"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="fs-5 mb-0 fw-semibold">
                               {{Auth::user()->name}}
                            </h5>
                            <p class="mb-0 fs-4">{{ $sellerInfo->store_name }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-last">
                    <ul
                        class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-3 gap-3"
                    >
                        <li class="position-relative">
                            <a
                                class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                                href="javascript:void(0)"
                                width="30"
                                height="30"
                            >
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="position-relative">
                            <a
                                class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                href="javascript:void(0)"
                            >
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="position-relative">
                            <a
                                class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                href="javascript:void(0)"
                            >
                                <i class="fa fa-dribbble"></i>
                            </a>
                        </li>
                        <li class="position-relative">
                            <a
                                class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                href="javascript:void(0)"
                            >
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <button class="btn btn-primary">
                                Add To Story
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <ul
                class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-light-info rounded-2"
                id="pills-tab"
                role="tablist"
            >
                <li class="nav-item" role="presentation">
                    <button id = "removeBorder"
                        class="nav-link position-relative rounded-0  d-flex align-items-center justify-content-center bg-transparent fs-6 py-6"
                        id="pills-profile-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-profile"
                        type="button"
                        role="tab"
                        aria-controls="pills-profile"
                        aria-selected="true"
                    >
                        <i class="fa fa-user me-2 fs-3"></i>
                        <span class="d-none d-md-block">Profile</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id = "removeBorder"
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-6 py-6"
                        id="pills-followers-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-followers"
                        type="button"
                        role="tab"
                        aria-controls="pills-followers"
                        aria-selected="false"
                        tabindex="-1"
                    >
                        <i class="fa fa-heart me-2 fs-6"></i>
                        <span class="d-none d-md-block">Followers</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id = "removeBorder"
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-6 py-6"
                        id="pills-friends-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-friends"
                        type="button"
                        role="tab"
                        aria-controls="pills-friends"
                        aria-selected="false"
                        tabindex="-1"
                    >
                        <i class="fa fa-users me-2 fs-6"></i>
                        <span class="d-none d-md-block">Friends</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id = "removeBorder"
                        class="nav-link active position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-6 py-6"
                        id="pills-gallery-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-gallery"
                        type="button"
                        role="tab"
                        aria-controls="pills-gallery"
                        aria-selected="false"
                        tabindex="-1"
                    >
                        <i class="fa fa-photo me-2 fs-6"></i>
                        <span class="d-none d-md-block">Products</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div
            class="tab-pane fade show active"
            id="pills-gallery"
            role="tabpanel"
            aria-labelledby="pills-gallery-tab"
            tabindex="0"
        >
            <div
                class="d-sm-flex align-items-center justify-content-between mt-3 mb-4"
            >
                <h3
                    class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center"
                >
                    Products
                    <span
                        class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2"
                        >{{ $products->count() }}</span
                    >
                </h3>
                <form method="POST" action="{{ route('searchAboutProduct') }}" class="position-relative" style="display: flex; gap:10px">
                    @csrf
                    <input
                        type="text"
                        class="form-control search-chat py-2 ps-5"
                        id="text-srh"
                        placeholder="Search Products"
                        name="search"
                    />
                    <button  class="btn btn-icon btn-round btn-primary" type="submit"><i class="fas fa-search"></i></button>


                    <i
                        class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"
                    ></i>
                </form>
            </div>
            <div class="row">
                {{-- show the products that seller own --}}
                @if ($products->count() > 0)
            @foreach ($products as $product )
            <div class="col-md-6 col-lg-4">
                <div
                    class="card hover-img overflow-hidden rounded-2"
                >
                    <div class="card-body p-0">
                        <img
                            src="{{ Storage::url($product->image_url) }}"
                            alt
                            class="img-fluid w-100 object-fit-cover"
                            style="height: 220px"
                        />
                        <div
                            class="p-4 d-flex align-items-center justify-content-between"
                        >
                            <div>
                                <h6 class="fw-semibold mb-0 fs-4">
                                    {{ $product->name }}
                                </h6>
                                <span class="text-dark fs-2"
                                    >{{ $product->description }}</span
                                ><br>
                                <span class="text-dark fs-2"
                                    >    JOD {{ $product->price }}</span
                                >
                                <br>
                                <span class="text-dark fs-2"
                                    >Rating : {{  $product->reviews->avg('rating') == 0 ? "0" :  $product->reviews->avg('rating')}} of 5 </span
                                >
                            </div>
                            <div class="dropdown">
                                <a
                                    class="text-muted fw-semibold d-flex align-items-center p-1"
                                    href="javascript:void(0)"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <i
                                        class="ti ti-dots-vertical"
                                    ></i>
                                </a>
                                <ul
                                    class="dropdown-menu overflow-hidden"
                                >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="javascript:void(0)"
                                            >Ip docmowe
                                            vemremrif.jpg</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



                @endforeach
                @else
                <div class="text-center mt-5">
                    {{-- <img src="{{ asset('images/search-result-not-found.png') }}" alt="No Results" class="img-fluid mb-4" style="max-width: 300px; height: auto;"> --}}
                    <h1 class="text-danger fw-bold">No product with this name</h1>
                    <p class="text-muted mb-2">Please try a different search term or check back later.</p>
                    <p class="text-muted">We searched over <strong>{{ $productCount }}</strong> products</p>
                </div>

                            @endif
            </div>
        </div>
    </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script> --}}
@endsection

