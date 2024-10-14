@extends('dashboardLayout.navAndsidebar')
@section('content')

<style>
    /* .d-flex {
    display: none !important;
}
.page-item:last-child .page-link {
    display: none;

} */


</style>
 <link
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
            rel="stylesheet"
        />
        <style type="text/css">
        .remove-button {
    z-index: 10;
    position: absolute;
    top: 0;
    right: 0;
    margin: 0.5rem; /* Adjust margin as needed */
    border-radius: 50%; /* Circular button */
    height: 30px; /* Fixed height */
    width: 30px; /* Fixed width */
    display: flex; /* Flexbox for centering */
    align-items: center; /* Center vertically */
    justify-content: center; /* Center horizontally */
    padding: 0; /* Remove default padding */
    border: none; /* Remove border */
    margin-right: 15px
}
.remove-button:hover {
    background-color: #c82333 !important; /* Darker red on hover */
}
.remove-button.btn-warning:hover {
    background-color: #e0a800 !important; /* Darker yellow on hover for edit */
}

.remove-button.btn-info:hover {
    background-color: #17a2b8 !important; /* Darker cyan on hover for view */
}
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
    src="{{ Storage::url($sellerInfo->store_thumbnail) }}"
    alt="Store Thumbnail"
    class="img-fluid"
    style="width: 1352px; height: 300px; object-fit: cover;"
/>
            <div class="row align-items-center">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div
                        class="d-flex align-items-center justify-content-around m-4"
                    >
                        <div class="text-center">
                            <i class="fa fa-shopping-cart fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1">{{ $countOfSoldProduct }}</h4>
                            <p class="mb-0 fs-4">sold products</p>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-user fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1">3,586</h4>
                            <p class="mb-0 fs-4">Followers</p>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-star fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">{{ $sellerInfo->rating }}</h4>
                            <p class="mb-0 fs-4">rating</p>
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


                        <li>
                            <form action="{{ route('updateStoreInfo') }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf



                         <button type="button" class="btn btn-primary rounded-5" data-bs-toggle="modal" data-bs-target="#largeModal">Edit store</button>

                         <!-- Large Modal -->
                         <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                           <div class="modal-dialog modal-lg">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title" id="myLargeModalLabel">Setup Your Store</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body" class="margin:2%">
                                <div class="form-group">
                                    <label for="email2">Store name</label>
                                    <input
                                      type="text"
                                      name="store_name"
                                      class="form-control"
                                      id="email2"
                                      placeholder="Enter Store Name"
                                    />
                                  </div>
                                  <div style="">
                                      <div class="form-group">
                                          <label for="comment"> Store description</label>
                                          <textarea
                                          name="store_description"
                                          class="form-control" id="comment" rows="6"  placeholder="Enter Store Name"
                                          ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment"> Store location</label>
                                        <select class="form-select" name="store_location" id="location">
                                          <option value="" disabled selected>Select location</option>
                                          <option value="Amman">Amman</option>
                                          <option value="Irbid">Irbid</option>
                                          <option value="Zarqa">Zarqa</option>
                                          <option value="Aqaba">Aqaba</option>
                                          <option value="Ma’an">Ma’an</option>
                                          <option value="Karak">Karak</option>
                                          <option value="Tafileh">Tafileh</option>
                                          <option value="Ajloun">Ajloun</option>
                                          <option value="Jerash">Jerash</option>
                                          <option value="Mafraq">Mafraq</option>
                                          <option value="Salt">Salt</option>
                                      </select>
                                </div>
                                    <div class="form-group">
                                        <label for="email2">Store thumbnail</label>
                                        <input
                                          type="file"
                                          class="form-control"
                                          id="email2"
                                          placeholder="Enter Email"
                                          name="store_thumbnail"
                                        />
                                        <p >  <span style="color: red"> <i class="fas fa-exclamation-circle"></i> Important !</span> The recommended store thumbnail is 1352 X 300</p>
                                      </div>
                                </div>
                               <div class="modal-footer">
                                 {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                 <button type="submit" class="btn btn-secondary rounded-5">Save changes</button>
                               </div>
                             </div>
                           </div>
                         </div>
                        </form>
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
                    My Products
                    <span
                        class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2"
                        >{{ $products->count() }}</span
                    >
                </h3>
                <form method="POST" action="{{ route('searchAboutProduct') }}" class="position-relative" style="display: flex; gap:10px">
                    <a  href="{{ route('createProduct') }}" class="btn btn-icon btn-round btn-primary" ><i class="fas fa-plus"></i></a>
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
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-4 position-relative ">
                        <form action="{{ route('deleteProduct', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                            @csrf
                            {{-- @method('DELETE') <!-- Use DELETE method for product deletion --> --}}
                            <div class="button-group d-flex">
                                <button type="button" class="btn btn-danger remove-button" title="Remove" onclick="confirmDelete(event)">
                                    <i class="fa fa-times"></i> <!-- Font Awesome Times Icon -->
                                </button>

                                <a href="{{ route('editProduct', $product->id) }}" style="right:40px; color:white" class="btn btn-warning remove-button" title="Edit">
                                    <i class="fa fa-edit"></i> <!-- Font Awesome Edit Icon -->
                                </a>

                                <button type="button" style="right:80px" data-bs-toggle="modal" data-bs-target="#modal-{{ $product->id }}" class="btn btn-info remove-button" title="View">
                                    <i class="fa fa-eye"></i> <!-- Font Awesome Eye Icon -->
                                </button>

                                <div class="modal fade" id="modal-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel">{{ $product->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Carousel for images -->
                                                <div id="carousel-{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner" style="height: 300px;"> <!-- Fixed height for the carousel -->
                                                        @foreach ($product->photos as $index => $photo)
                                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                                <img src="{{ Storage::url($photo->photo_url) }}" class="d-block w-100" alt="Image of {{ $product->name }}" style="height: 300px; object-fit: cover;">
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- Centered button container -->
                                                    <div class="d-flex justify-content-center">
                                                        <button class="carousel-control-prev rounded-circle" type="button" data-bs-target="#carousel-{{ $product->id }}" data-bs-slide="prev" >
                                                            <span style="border-radius: 50%;
    background-color: black;" class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next rounded-circle" type="button" data-bs-target="#carousel-{{ $product->id }}" data-bs-slide="next" >
                                                            <span style="border-radius: 50%;
    background-color: black;" class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <span class="text-dark fs-3 fw-bold m-2">Product description: {{ $product->description }}</span><br> <!-- Increased font size -->
                                                    <span class="text-dark fs-5 m-3"> Product Price: JOD {{ $product->price }}</span><br> <!-- Increased font size -->
                                                    <span class="text-dark fs-5 m-3">Product :Rating: {{ $product->reviews->avg('rating') == 0 ? "0" : $product->reviews->avg('rating') }} of 5</span> <!-- Increased font size -->
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="{{ Storage::url($product->image_url) }}" alt class="img-fluid w-100 object-fit-cover" style="height: 220px" />
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-5">{{ $product->name }}</h6>

                                        <span class="text-dark fs-4">JOD {{ $product->price }}</span><br>
                                        {{-- <span class="text-dark fs-4">Rating: {{ $product->reviews->avg('rating') == 0 ? "0" : $product->reviews->avg('rating') }} of 5</span> --}}
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0)">Ip docmowe vemremrif.jpg</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $products->links('pagination::bootstrap-5') }}
                    @else
                <div class="text-center mt-5">
                    <h1 class="text-danger fw-bold">No product with this name</h1>
                    <p class="text-muted mb-2">Please try a different search term or check back later.</p>
                    <p class="text-muted">We searched over <strong>{{ $productCount }}</strong> products</p>
                </div>
            @endif

            </div>
        </div>
    </div>
    </div>
    <script>

    function confirmDelete(event) {
        event.preventDefault(); // Prevent the default form submission
        const confirmed = confirm("Are you sure you want to delete this product?");
        if (confirmed) {
            event.target.closest('form').submit(); // Submit the form if confirmed
        }
    }

    </script>



@endsection

