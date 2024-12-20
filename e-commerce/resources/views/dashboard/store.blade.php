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
            <div class="row align-items-center mb-5">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div
                        class="d-flex align-items-center justify-content-around m-4"
                    >
                        <div class="text-center">
                            <i class="fa fa-shopping-cart fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1">{{ $countOfSoldProduct }}</h4>
                            <p class="mb-0 fs-4">sold products</p>
                        </div>
                        {{-- <div class="text-center">
                            <i class="fa fa-user fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1">3,586</h4>
                            <p class="mb-0 fs-4">Followers</p>
                        </div> --}}
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
            {{-- <ul
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
            </ul> --}}
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
                            </form>
                                <a href="{{ route('editProduct', $product->id) }}" style="right:40px; color:white" class="btn btn-warning remove-button" title="Edit">
                                    <i class="fa fa-edit"></i> <!-- Font Awesome Edit Icon -->
                                </a>

                                <button type="button" style="right:80px" data-bs-toggle="modal" data-bs-target="#modalView-{{ $product->id }}" class="btn btn-info remove-button" title="View">
                                    <i class="fa fa-eye"></i> <!-- Font Awesome Eye Icon -->
                                </button>

                                <div class="modal fade" id="modalView-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel">{{ $product->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Carousel for images -->
                                                <div id="carousel-{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner" style=" width:100%"> <!-- Fixed height for the carousel -->
                                                        @foreach ($product->photos as $index => $photo)
                                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                                <img
                                                                src="{{ Storage::url($photo->photo_url) }}"
                                                                class="product-image img-fluid w-100 "
                                                                alt="Image of {{ $product->name }}"
                                                                style="height: 90vh; width 300px !importent; "
                                                            />
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

                                                <div class="mt-4 d-flex flex-column">
                                                    <span class="text-dark fs-5  "> <span class="fw-bold">   Description:</span> {{ $product->description }}</span>
                                                    <span class="text-dark fs-5 "> <span class="fw-bold">  Category:</span>  {{ $product->category->name}}</span>
                                                    <span class="text-dark fs-5 "> <span class="fw-bold">  Price:</span> {{ $product->price }} JOD</span>
                                                    <span class="text-dark fs-5 "> <span class="fw-bold">  Rating:</span>  {{ $product->reviews->avg('rating') == 0 ? "0" : $product->reviews->avg('rating') }} of 5</span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" style="right:120px" data-bs-toggle="modal" data-bs-target="#modalUpdate-{{ $product->id }}" class="btn btn-info remove-button" title="View">
                                    <i class="fa fa-cubes"></i> <!-- Font Awesome Eye Icon -->
                                </button>

                                <div class="modal fade" id="modalUpdate-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel">update <b>{{ $product->name }}</b> quantity</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">


                                                    @foreach ($product->variants as $variant)
                                                    <form action="{{ route('updateStock' , $variant->id) }}" method="POST">
                                                        @csrf
                                                        @method("PUT")
                                                    <label for="">
                                                        Stock for the variant:
                                                        <b>
                                                            {{
                                                                $variant->variant_options->size ?? '' }}
                                                            {{
                                                                $variant->variant_options->color ?? ' ' }}
                                                            {{
                                                                $variant->variant_options->type ?? ' ' }}
                                                            {{
                                                                $variant->variant_options->resolution ?? '' }}
                                                            {{
                                                                $variant->variant_options->processor ?? ' ' }}
                                                            {{
                                                                $variant->variant_options->flavor ?? ' ' }}
                                                            {{
                                                                $variant->variant_options->material ?? ' ' }}
                                                        </b>
                                                    </label>
                                                    <input type="number" value="{{ $variant->stock }}" name="newStock">
                                                    <button type="submit" class="btn btn-primary"> update variant</button>
                                                </form>
                                                    @endforeach


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" style="right:160px" data-bs-toggle="modal" data-bs-target="#modalad-{{ $product->id }}" class="btn btn-info remove-button" title="View">
                                    <i class="fa fa-ad"></i> <!-- Font Awesome Eye Icon -->
                                </button>

                                <div class="modal fade" id="modalad-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <form action="{{ route('storeAdRequest') }}" method="POST">
                                        @csrf
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel"> <b>{{ $product->name }}</b> </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">


                                                    <div id="centerTable" class="col-md-12">
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="name">Product</label>
                                                                    <input
                                                                        name="code"
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="name"
                                                                        placeholder="{{ $product->name }}"
                                                                        readonly
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="discount_amount-{{ $product->id }}">Total Price</label>
                                                                    <input name="price" type="number" class="form-control" id="discount_amount-{{ $product->id }}" placeholder="0" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="valid_from-{{ $product->id }}">Valid From</label>
                                                            <input name="ad_from" min="{{ \Carbon\Carbon::now()->toDateString() }}" type="date" id="valid_from-{{ $product->id }}" class="form-control" onchange="updateValidUntilMin({{ $product->id }})" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="valid_until-{{ $product->id }}">Valid Until</label>
                                                            <input name="ad_to" type="date" id="valid_until-{{ $product->id }}" class="form-control" onchange="updatePrice({{ $product->id }})" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="location-{{ $product->id }}">Select Page Location</label>
                                                            <select name="location" id="location-{{ $product->id }}" class="form-control" onchange="updatePrice({{ $product->id }})">
                                                                <option value="homepage">Homepage (20 JOD/Day)</option>
                                                                <option value="productpage">Product Page (15 JOD/Day)</option>
                                                                <option value="productlist">Product List (10 JOD/Day)</option>
                                                            </select>
                                                        </div>


                                                        {{-- <div class="form-group">
                                                            <input
                                                                onchange="toggleCheckbox()"
                                                                type="checkbox"
                                                                class="form-check-input"
                                                                id="with_on_sale"
                                                                value=""
                                                            />
                                                            <input type="hidden" name="with_on_sale" value="0" id="passedValue">
                                                            <label style="margin-left: 7px" class="form-check-label" for="with_on_sale">
                                                                Do you want this discount to be used with products that have sales?
                                                            </label>
                                                        </div> --}}
                                                        <div class="form-group" id="btnLeft">

                                                        </div>
                                                    </div>



                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success rounded-5" data-bs-dismiss="modal">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>


                        <div class="card hover-img overflow-hidden rounded-2" style="height: 400px">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-center">

                                    <img src="{{ Storage::url($product->image_url) }}" alt class="product-image img-fluid  " style="height: 300px; "  />
                                </div>
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
    function toggleCheckbox() {
    let checkbox = document.getElementById('with_on_sale');
    let passedValue = document.getElementById('passedValue');

    // If the checkbox is checked, set hidden input value to 1, otherwise 0
    if (checkbox.checked) {
        passedValue.value = 1;
    } else {
        passedValue.value = 0;
    }


}
function updateValidUntilMin(productId) {
    // Get the value of the valid_from date for this specific product
    let validFromDate = document.getElementById(`valid_from-${productId}`).value;
    let validUntilDateInput = document.getElementById(`valid_until-${productId}`);

    if (validFromDate) {
        // Set the min attribute for valid_until based on valid_from
        validUntilDateInput.min = validFromDate;

        // Parse validFromDate into a Date object
        let fromDate = new Date(validFromDate);

        // Set valid_until to the day after valid_from
        fromDate.setDate(fromDate.getDate() + 1);
        validUntilDateInput.value = fromDate.toISOString().split('T')[0];

        // Recalculate price
        calculatePrice(validFromDate, validUntilDateInput.value, productId);
    }
}

function updatePrice(productId) {
    // Get the values of the valid_from and valid_until dates for this specific product
    const validFromDate = document.getElementById(`valid_from-${productId}`).value;
    const validUntilDate = document.getElementById(`valid_until-${productId}`).value;

    // Call calculatePrice to ensure it's updating correctly
    calculatePrice(validFromDate, validUntilDate, productId);
}

function calculatePrice(validFrom, validUntil, productId) {
    if (validUntil) {
        const fromDate = new Date(validFrom);
        const untilDate = new Date(validUntil);

        const timeDiff = untilDate - fromDate;
        const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

        const location = document.getElementById(`location-${productId}`).value;
        let dailyRate;

        if (location === "homepage") {
            dailyRate = 20;
        } else if (location === "productpage") {
            dailyRate = 15;
        } else {
            dailyRate = 10;
        }

        const totalPrice = daysDiff > 0 ? daysDiff * dailyRate : 0;
        document.getElementById(`discount_amount-${productId}`).value = totalPrice;
    } else {
        document.getElementById(`discount_amount-${productId}`).value = '';
    }
}



// this to the discount input
const DiscountInput = document.getElementById('discount_amount');

DiscountInput.addEventListener('input', function() {
    // Use a regex to ensure input format of 0.xx
    this.value = this.value.replace(/^(0\.\d{0,2})|^0\.|[^0-9.]/g, '$1');

    // If the input is a valid number
    let value = parseFloat(this.value);
    if (!isNaN(value)) {
        // Check if the value is less than the minimum
        if (value < 0.01) {
            this.value = '0.01'; // Set to minimum value
        }
        // Check if the value is greater than the maximum
        else if (value > 0.99) {
            this.value = '0.99'; // Set to maximum value
        } else {
            // Ensure value is displayed with two decimal places
            this.value = value.toFixed(2);
        }
    }
});
    </script>



@endsection

