@extends('dashboardLayout.navAndsidebar')

@section('content')
<style>
    #centerTable {
        width: 60%;
        margin-left: 20%;
    }
    #btnLeft {
        display: flex;
        justify-content: end;
    }
    #widthGroup {
        width: 100% !important;
    }
    .image-container {
        display: flex;
        flex-wrap: wrap;
            gap: 10px; /* Adjust the gap between image items */
    }
    /* .image-container img {
    flex-basis: calc(33.33% - 10px); /* Adjust to set the width of each image */
} */
    .image-item {
        display: flex;
        align-items: center;
    }
    .icons {
        display: flex;
        flex-direction: column;
        margin-left: 10px; /* Adjust the space between the image and the icons */
        gap: 5px; /* Adjust the gap between the icons */
    }
    .icons i {
        cursor: pointer;
    }
</style>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Add this line for the PUT method -->
        <div id="centerTable" class="col-md-12">
        @if (Auth::user()->role_id  == 3)



            <div class="form-group">
                <label for="name">Append this Product to </label>
                <select name="toSeller"  class="form-select" style="width: 100%;">
                    <option value="{{ $product->seller_id }}" selected>{{ $product->seller_id }}</option>
                    {{-- @foreach ($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->user->name }}</option>
                    @endforeach --}}
                </select>            </div>
                @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" value="{{ old('name', $product->name) }}" type="text" class="form-control" id="name" placeholder="Enter Product Name" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Description of the product" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">On sale</label>
                <input    id="onSale" name="on_sale" value="{{ $product->on_sale }}" type="number" class="form-control" min="0.01" max="0.99"  step="0.01" placeholder="Enter The Amount Of The Sale ex: 0.25" />
    </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input name="price" value="{{ old('price', $product->price) }}" type="number" class="form-control" placeholder="Enter Product price" />
    </div>



            <div class="form-group">
                <label for="category_id">Categories</label>
                <select name="category_id" id="selectedCat" onchange="toggleVariantSection()" class="form-select" style="width: 100%;">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

                <label for="variants">Variants</label>

                    @foreach ($product->variants as $variant)

                    @if($product->category_id == 1)
                      <!-- Category 1 Options -->
    <div class="form-group" style="width: 100%;">
        <label for="material">Material</label>
        <select name="material[]" id="furnitureMaterial" class="form-select">
            <option value="">Select Material</option>
            <option value="wood" {{ (isset($variant->variant_options->material) && $variant->variant_options->material == 'wood') ? 'selected' : '' }}>Wood</option>
            <option value="metal" {{ (isset($variant->variant_options->material) && $variant->variant_options->material == 'metal') ? 'selected' : '' }}>Metal</option>
            <option value="plastic" {{ (isset($variant->variant_options->material) && $variant->variant_options->material == 'plastic') ? 'selected' : '' }}>Plastic</option>
            <option value="fabric" {{ (isset($variant->variant_options->material) && $variant->variant_options->material == 'fabric') ? 'selected' : '' }}>Fabric</option>
        </select>
    </div>
    <div class="form-group" style="width: 100%;">
        <label for="color">Color</label>
        <select name="colors[]" class="form-select" style="width: 100%;" id="colorSelect">
            <option value="">Select Color</option>
            <option value="Red" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'Red') ? 'selected' : '' }}>Red</option>
            <option value="Green" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'Green') ? 'selected' : '' }}>Green</option>
            <option value="Blue" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'Blue') ? 'selected' : '' }}>Blue</option>
            <option value="Yellow" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'Yellow') ? 'selected' : '' }}>Yellow</option>
            <option value="Magenta" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'Magenta') ? 'selected' : '' }}>Magenta</option>
            <option value="Cyan" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'Cyan') ? 'selected' : '' }}>Cyan</option>
            <option value="Black" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'Black') ? 'selected' : '' }}>Black</option>
            <option value="White" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'White') ? 'selected' : '' }}>White</option>
        </select>
    </div>
    <div class="form-group" style="width: 100%;">
        <label for="furnitureSize">Size</label>
        <select name="sizes[]" id="furnitureSize" class="form-select">
            <option value="">Select Size</option>
            <option value="small" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'small') ? 'selected' : '' }}>Small</option>
            <option value="medium" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'medium') ? 'selected' : '' }}>Medium</option>
            <option value="large" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'large') ? 'selected' : '' }}>Large</option>
            <option value="custom" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'custom') ? 'selected' : '' }}>Custom Dimensions (Width x Depth x Height)</option>
        </select>
    </div>
                @elseif($product->category_id == 2)
                <div class="form-group" style="width: 100%;">
                    <label for="material">Material</label>
                    <select name="material[]" id="furnitureMaterial" class="form-select">
                        <option value="">Select Material</option>
                        <option value="stainless_steel" {{ (isset($variant->variant_options->material) && $variant->variant_options->material == 'stainless_steel') ? 'selected' : '' }}>Stainless Steel</option>
                        <option value="plastic" {{ (isset($variant->variant_options->material) && $variant->variant_options->material == 'plastic') ? 'selected' : '' }}>Plastic</option>
                        <option value="glass" {{ (isset($variant->variant_options->material) && $variant->variant_options->material == 'glass') ? 'selected' : '' }}>Glass</option>
                        <option value="ceramic" {{ (isset($variant->variant_options->material) && $variant->variant_options->material == 'ceramic') ? 'selected' : '' }}>Ceramic</option>
                        <option value="granite" {{ (isset($variant->variant_options->material) && $variant->variant_options->material == 'granite') ? 'selected' : '' }}>Granite</option>
                    </select>
                </div>
                <div class="form-group" style="width: 100%;">
                    <label for="color">Color</label>
                    <select name="colors[]" class="form-select" style="width: 100%;" id="colorSelect">
                        <option value="">Select Color</option>
                        <option value="red" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'red') ? 'selected' : '' }}>Red</option>
                        <option value="black" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'black') ? 'selected' : '' }}>Black</option>
                        <option value="white" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'white') ? 'selected' : '' }}>White</option>
                        <option value="silver" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'silver') ? 'selected' : '' }}>Silver</option>
                    </select>
                </div>
                <div class="form-group" style="width: 100%;">
                    <label for="furnitureSize">Size</label>
                    <select name="sizes[]" id="furnitureSize" class="form-select">
                        <option value="">Select Size</option>
                        <option value="standard" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'standard') ? 'selected' : '' }}>Standard</option>
                        <option value="large" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'large') ? 'selected' : '' }}>Large</option>
                        <option value="compact" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'compact') ? 'selected' : '' }}>Compact</option>
                    </select>
                </div>
                @elseif($product->category_id == 3)
                <div class="form-group" style="width: 100%;">
                    <label for="size">Type</label>
                    <select name="type[]" id="furnitureType" class="form-select">
                        <option value="">Select Type</option>
                        <option value="led" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'led') ? 'selected' : '' }}>LED</option>
                        <option value="halogen" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'halogen') ? 'selected' : '' }}>Halogen</option>
                        <option value="fluorescent" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'fluorescent') ? 'selected' : '' }}>Fluorescent</option>
                    </select>
                </div>

                <div class="form-group" style="width: 100%;">
                    <label for="color">Color Temperature</label>
                    <select name="colors[]" class="form-select" style="width: 100%;" id="colorSelect">
                        <option value="">Select Color Temperature</option>
                        <option value="warm_white" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'warm_white') ? 'selected' : '' }}>Warm White</option>
                        <option value="cool_white" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'cool_white') ? 'selected' : '' }}>Cool White</option>
                        <option value="daylight" {{ (isset($variant->variant_options->color) && $variant->variant_options->color == 'daylight') ? 'selected' : '' }}>Daylight</option>
                    </select>
                </div>

                <div class="form-group" style="width: 100%;">
                    <label for="furnitureSize">Size</label>
                    <select name="sizes[]" id="furnitureSize" class="form-select">
                        <option value="">Select Size</option>
                        <option value="table_lamp" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'table_lamp') ? 'selected' : '' }}>Table Lamp</option>
                        <option value="floor_lamp" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'floor_lamp') ? 'selected' : '' }}>Floor Lamp</option>
                        <option value="ceiling_light" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == 'ceiling_light') ? 'selected' : '' }}>Ceiling Light</option>
                    </select>
                </div>

                @endif
                @if($product->category_id == 4)
    <div class="form-group" style="width: 100%;">
        <label for="type">Type</label>
        <select name="type[]" id="furnitureMaterial" class="form-select">
            <option value="">Select Type</option>
            <option value="ips" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'ips') ? 'selected' : '' }}>IPS</option>
            <option value="led" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'led') ? 'selected' : '' }}>LED</option>
            <option value="oled" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'oled') ? 'selected' : '' }}>OLED</option>
        </select>
    </div>

    <div class="form-group" style="width: 100%;">
        <label for="resolution">Resolution</label>
        <select name="resolution[]" class="form-select" style="width: 100%;">
            <option value="">Select Resolution</option>
            <option value="full_hd" {{ (isset($variant->variant_options->resolution) && $variant->variant_options->resolution == 'full_hd') ? 'selected' : '' }}>Full HD</option>
            <option value="4k" {{ (isset($variant->variant_options->resolution) && $variant->variant_options->resolution == '4k') ? 'selected' : '' }}>4K</option>
            <option value="8k" {{ (isset($variant->variant_options->resolution) && $variant->variant_options->resolution == '8k') ? 'selected' : '' }}>8K</option>
        </select>
    </div>

    <div class="form-group" style="width: 100%;">
        <label for="sizes">Size</label>
        <select name="sizes[]" id="furnitureSize" class="form-select">
            <option value="">Select Screen Size</option>
            <option value="24" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == '24') ? 'selected' : '' }}>24"</option>
            <option value="27" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == '27') ? 'selected' : '' }}>27"</option>
            <option value="32" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == '32') ? 'selected' : '' }}>32"</option>
        </select>
    </div>
@endif
                @if($product->category_id == 5)
                <div class="form-group" style="width: 100%;">
                    <label for="type">Storage Type</label>
                    <select name="type[]" id="furnitureMaterial" class="form-select">
                        <option value="">Select Storage Type</option>
                        <option value="ssd" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'ssd') ? 'selected' : '' }}>SSD</option>
                        <option value="hdd" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'hdd') ? 'selected' : '' }}>HDD</option>
                        <option value="hybrid" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'hybrid') ? 'selected' : '' }}>Hybrid</option>
                    </select>
                </div>

                <div class="form-group" style="width: 100%;">
                    <label for="processor">Processor</label>
                    <select name="processor[]" class="form-select" style="width: 100%;">
                        <option value="">Select Processor</option>
                        <option value="intel_i5" {{ (isset($variant->variant_options->processor) && $variant->variant_options->processor == 'intel_i5') ? 'selected' : '' }}>Intel i5</option>
                        <option value="intel_i7" {{ (isset($variant->variant_options->processor) && $variant->variant_options->processor == 'intel_i7') ? 'selected' : '' }}>Intel i7</option>
                        <option value="intel_i9" {{ (isset($variant->variant_options->processor) && $variant->variant_options->processor == 'intel_i9') ? 'selected' : '' }}>Intel i9</option>
                        <option value="amd_ryzen_5" {{ (isset($variant->variant_options->processor) && $variant->variant_options->processor == 'amd_ryzen_5') ? 'selected' : '' }}>AMD Ryzen 5</option>
                        <option value="amd_ryzen_7" {{ (isset($variant->variant_options->processor) && $variant->variant_options->processor == 'amd_ryzen_7') ? 'selected' : '' }}>AMD Ryzen 7</option>
                    </select>
                </div>

                <div class="form-group" style="width: 100%;">
                    <label for="furnitureSize">RAM Size</label>
                    <select name="sizes[]" id="furnitureSize" class="form-select">
                        <option value="">Select RAM Size</option>
                        <option value="8gb" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == '8gb') ? 'selected' : '' }}>8GB</option>
                        <option value="16gb" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == '16gb') ? 'selected' : '' }}>16GB</option>
                        <option value="32gb" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == '32gb') ? 'selected' : '' }}>32GB</option>
                    </select>
                </div>

            @endif
            @if($product->category_id == 6)
    <div class="form-group" style="width: 100%;">
        <label for="type">Type</label>
        <select name="type[]" id="furnitureMaterial" class="form-select">
            <option value="">Select Type</option>
            <option value="ips" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'ips') ? 'selected' : '' }}>IPS</option>
            <option value="led" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'led') ? 'selected' : '' }}>LED</option>
            <option value="oled" {{ (isset($variant->variant_options->type) && $variant->variant_options->type == 'oled') ? 'selected' : '' }}>OLED</option>
        </select>
    </div>

    <div class="form-group" style="width: 100%;">
        <label for="color">Color</label>
        <select name="resolution[]" class="form-select" style="width: 100%;">
            <option value="">Select Resolution</option>
            <option value="full_hd" {{ (isset($variant->variant_options->resolution) && $variant->variant_options->resolution == 'full_hd') ? 'selected' : '' }}>Full HD</option>
            <option value="4k" {{ (isset($variant->variant_options->resolution) && $variant->variant_options->resolution == '4k') ? 'selected' : '' }}>4K</option>
            <option value="8k" {{ (isset($variant->variant_options->resolution) && $variant->variant_options->resolution == '8k') ? 'selected' : '' }}>8K</option>
        </select>
    </div>

    <div class="form-group" style="width: 100%;">
        <label for="sizes">Size</label>
        <select name="sizes[]" id="furnitureSize" class="form-select">
            <option value="">Select Screen Size</option>
            <option value="24" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == '24') ? 'selected' : '' }}>24"</option>
            <option value="27" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == '27') ? 'selected' : '' }}>27"</option>
            <option value="32" {{ (isset($variant->variant_options->size) && $variant->variant_options->size == '32') ? 'selected' : '' }}>32"</option>
        </select>
    </div>
@endif

<div class="form-group" style="">
                        <label for="category_id">Variant Stock</label>

                            <input type="number" name="variant_stock[]" value="{{ $variant->stock }}" placeholder="Stock" class="form-control" />
                            <form action="{{ route('deleteVariant', $variant->id) }}" method="POST">
                                @csrf

                                <button type="submit" onclick="removeVariant({{ $variant->id }})" class="btn btn-danger w-100">Remove</button>
                            </form>
                        </div>
                    @endforeach
                    <div class="form-group" style="">
                        <div id="variantInputs" style="">
                            <div class="variant-group">
                               {{-- here show the variant --}}
                            </div>
                            <div class="btn-container" id="addVariantButtonContainer" style="display: block;">
                                <button type="button" class="btn btn-secondary" onclick="addVariant()">Add Another Variant</button>
                            </div>
                        </div>
                        </div>
                {{-- <button type="button" onclick="addVariant({{ $product->category_id }})" class="btn btn-secondary">Add Variant</button> --}}

            <div class="form-group">
                <label for="image_url">Main Image</label>
                <input name="image_url" type="file" class="form-control" />
                <img src="{{ Storage::url($product->image_url) }}" alt="Product Image" width="280px" height="250px">
            </div>
            <div class="form-group">
                <label for="images">Secondary Images</label>
                <input name="images[]" type="file" class="form-control" multiple />
                <div class="image-container">
                    @foreach ($product->photos as $photo)
                        <div class="image-item">
                            <img src="{{ Storage::url($photo->photo_url) }}" alt="Product Image" width="240px" height="250px">
                            <div class="icons">

                                {{-- <button class="fa fa-times" onclick="deleteImage('{{ route('deleteProductImage', ['productId' => $product->id, 'imageId' => $photo->id]) }}')"></button> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group" id="btnLeft">
                <button class="btn btn-black btn-round ms-auto">
                    <i class="fas fa-tag"></i>
                    Update Product
                </button>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function deleteImage(url) {
    if (confirm('Are you sure you want to delete this image?')) {
        fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
            }
        })
        .then(response => {
            // Check if the response is okay
            if (response.ok) {
                return response.json(); // Parse JSON if response is okay
            } else {
                // Throw an error for non-2xx responses
                return response.json().then(err => { throw new Error(err.message || 'Error deleting image'); });
            }
        })
        .then(data => {
            // Show success message
            const messageArea = document.getElementById('messageArea');
            messageArea.className = 'alert alert-success'; // Success styling
            messageArea.innerHTML = 'Image deleted successfully.';
            messageArea.style.display = 'block'; // Show the message
            // location.reload(); // Refresh the page to see changes
        })
        .catch(error => {
            // Show error message
            const messageArea = document.getElementById('messageArea');
            messageArea.className = 'alert alert-danger'; // Error styling
            messageArea.innerHTML = 'Error deleting image: ' + error.message;
            messageArea.style.display = 'block'; // Show the message
            console.error('Delete image error:', error); // Log the error to the console
        });
    }
}
var current = {{ $variant->id }} ; // to pass it to the function add variant to add the needed variant
    function toggleVariantSection() {
        // let variance = document.getElementById('variance');
        let variance = document.getElementById('selectedCat');
        console.log(variance.value)
        let variantInputs = document.getElementById('variantInputs');
        let addVariantButtonContainer = document.getElementById('addVariantButtonContainer');
         current = document.getElementById('selectedCat').value;
        if (variance.value ) {
            variantInputs.style.display = "block"; // Show variant inputs
            addVariantButtonContainer.style.display = "flex"; // Show add variant button
            addVariant()
        } else {
            variantInputs.style.display = "none"; // Hide variant inputs
            addVariantButtonContainer.style.display = "none"; // Hide add variant button
        }
    }
function removeVariant(button) {
        button.parentElement.remove(); // Remove the variant group
    }

    function addVariant() {
        console.log(current)
        let variantInputs = document.getElementById('variantInputs');
    let newVariantGroup = document.createElement('div');
    newVariantGroup.classList.add('variant-group');
        if(current == 1)
        newVariantGroup.innerHTML = `
            <div class="form-group" style="width: 100%;" >
                <label for="size">Material</label>
                <select name="material[]" id="furnitureMaterial" class="form-select" id="colorSelect">
                <option value="">Select Material</option>
                <option value="wood">Wood</option>
                <option value="metal">Metal</option>
                <option value="plastic">Plastic</option>
                <option value="fabric">Fabric</option>
            </select>
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="color">Color</label>
                <select name="colors[]" class="form-select" style="width: 100%;" id="colorSelect">
                    <option value="">Select Color</option>
                    <option value="Red">Red</option>
                    <option value="Green">Green</option>
                    <option value="Blue">Blue</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Magenta">Magenta</option>
                    <option value="Cyan">Cyan</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                </select>
            </div>
            <div class="form-group" style="width: 100%;" >
                <label for="furnitureSize">Size</label>
            <select name="sizes[]" id="furnitureSize" class="form-select"
id="colorSelect">
                <option value="">Select Size</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
                <option value="custom">Custom Dimensions (Width x Depth x Height)</option>
            </select>
            </div>

            <div class="form-group" style="width: 100%;">
                <label for="variant_stock">Variant Stock</label>
                <input name="variant_stock[]" type="number" class="form-control" placeholder="Enter variant stock" />
            </div>
            <button type="button" class="btn btn-danger remove-variant-btn" onclick="removeVariant(this)">Remove</button>
        `;
        else if (current == 2)
        newVariantGroup.innerHTML = `
             <div class="form-group" style="width: 100%;" >
                <label for="size">Material</label>
                <select name="material[]" id="furnitureMaterial" class="form-select" id="colorSelect">
                <option value="">Select Material</option>
                <option value="stainless_steel">Stainless Steel</option>
                <option value="plastic">Plastic</option>
                <option value="glass">Glass</option>
                <option value="ceramic">Ceramic</option>
                <option value="granite">granite </option>
            </select>
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="color">Color</label>
                <select name="colors[]" class="form-select" style="width: 100%;" id="colorSelect">
                                  <option value="">Select Color</option>
                <option value="red">Red</option>
                <option value="black">Black</option>
                <option value="white">White</option>
                <option value="silver">Silver</option>

                </select>
            </div>
            <div class="form-group" style="width: 100%;" >
                <label for="furnitureSize">Size</label>
            <select name="sizes[]" id="furnitureSize" class="form-select" id="colorSelect">
                <option value="">Select Size</option>
                 <option value="">Select Size</option>
                <option value="standard">Standard</option>
                <option value="large">Large</option>
                <option value="compact">Compact</option>
            </select>
            </div>

            <div class="form-group" style="width: 100%;">
                <label for="variant_stock">Variant Stock</label>
                <input name="variant_stock[]" type="number" class="form-control" placeholder="Enter variant stock" />
            </div>
            <button type="button" class="btn btn-danger remove-variant-btn" onclick="removeVariant(this)">Remove</button>
        `;
        else if (current  == 3)
        newVariantGroup.innerHTML = `
             <div class="form-group" style="width: 100%;" >
                <label for="size">Type</label>
                <select name="type[]" id="furnitureMaterial" class="form-select" id="colorSelect">
                 <option value="">Select Type</option>
                <option value="led">LED</option>
                <option value="halogen">Halogen</option>
                <option value="fluorescent">Fluorescent</option>
            </select>
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="color">Color</label>
                <select name="colors[]" class="form-select" style="width: 100%;" id="colorSelect">
               <option value="">Select Color Temperature</option>
                <option value="warm_white">Warm White</option>
                <option value="cool_white">Cool White</option>
                <option value="daylight">Daylight</option>

                </select>
            </div>
            <div class="form-group" style="width: 100%;" >
                <label for="furnitureSize">Size</label>
            <select name="sizes[]" id="furnitureSize" class="form-select" id="colorSelect">
                  <option value="">Select Size</option>
                <option value="table_lamp">Table Lamp</option>
                <option value="floor_lamp">Floor Lamp</option>
                <option value="ceiling_light">Ceiling Light</option>
            </select>
            </div>

            <div class="form-group" style="width: 100%;">
                <label for="variant_stock">Variant Stock</label>
                <input name="variant_stock[]" type="number" class="form-control" placeholder="Enter variant stock" />
            </div>
            <button type="button" class="btn btn-danger remove-variant-btn" onclick="removeVariant(this)">Remove</button>
        `;
        else if (current  == 4)
        newVariantGroup.innerHTML = `
             <div class="form-group" style="width: 100%;" >
                <label for="size">Type</label>
                <select name="type[]" id="furnitureMaterial" class="form-select" id="colorSelect">
                 <option value="">Select Type</option>
                <option value="ips">IPS</option>
                <option value="led">LED</option>
                <option value="oled">OLED</option>
            </select>
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="color">Color</label>
                <select name="resolution[]" class="form-select" style="width: 100%;" id="colorSelect">
              <option value="">Select Resolution</option>
                <option value="full_hd">Full HD</option>
                <option value="4k">4K</option>
                <option value="8k">8K</option>

                </select>
            </div>
            <div class="form-group" style="width: 100%;" >
                <label for="furnitureSize">Size</label>
            <select name="sizes[]" id="furnitureSize" class="form-select" id="colorSelect">
                <option value="">Select Screen Size</option>
                <option value="24">24"</option>
                <option value="27">27"</option>
                <option value="32">32"</option>
            </select>
            </div>

            <div class="form-group" style="width: 100%;">
                <label for="variant_stock">Variant Stock</label>
                <input name="variant_stock[]" type="number" class="form-control" placeholder="Enter variant stock" />
            </div>
            <button type="button" class="btn btn-danger remove-variant-btn" onclick="removeVariant(this)">Remove</button>
        `;
        else if (current  == 5)
        newVariantGroup.innerHTML = `
             <div class="form-group" style="width: 100%;" >
                <label for="size">Storage Type</label>
                <select name="type[]" id="furnitureMaterial" class="form-select" id="colorSelect">
                  <option value="">Select Storage Type</option>
                <option value="ssd">SSD</option>
                <option value="hdd">HDD</option>
                <option value="hybrid">Hybrid</option>
            </select>
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="color">Processor</label>
                <select name="processor[]" class="form-select" style="width: 100%;" id="colorSelect">
                 <option value="">Select processor </option>
                <option value="intel_i5">Intel i5</option>
                <option value="intel_i7">Intel i7</option>
                <option value="intel_i9">Intel i9</option>
                <option value="amd_ryzen_5">AMD Ryzen 5</option>
                <option value="amd_ryzen_7">AMD Ryzen 7</option>

                </select>
            </div>
            <div class="form-group" style="width: 100%;" >
                <label for="furnitureSize">RAM Size</label>
            <select name="sizes[]" id="furnitureSize" class="form-select" id="colorSelect">
               <option value="">Select RAM Size</option>
                <option value="8gb">8GB</option>
                <option value="16gb">16GB</option>
                <option value="32gb">32GB</option>
            </select>
            </div>

            <div class="form-group" style="width: 100%;">
                <label for="variant_stock">Variant Stock</label>
                <input name="variant_stock[]" type="number" class="form-control" placeholder="Enter variant stock" />
            </div>
            <button type="button" class="btn btn-danger remove-variant-btn" onclick="removeVariant(this)">Remove</button>
        `;
        else if (current  == 6)
        newVariantGroup.innerHTML = `
             <div class="form-group" style="width: 100%;" >
                <label for="size">Storage Type</label>
                <select name="type[]" id="furnitureMaterial" class="form-select" id="colorSelect">
                  <option value="">Select Storage Type</option>
                <option value="ssd">SSD</option>
                <option value="hdd">HDD</option>
                <option value="hybrid">Hybrid</option>
            </select>
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="color">Processor</label>
                <select name="processor[]" class="form-select" style="width: 100%;" id="colorSelect">
                 <option value="">Select Processor</option>
                <option value="intel_i3">Intel i3</option>
                <option value="intel_i5">Intel i5</option>
                <option value="intel_i7">Intel i7</option>
                <option value="amd_ryzen_5">AMD Ryzen 5</option>
                <option value="amd_ryzen_7">AMD Ryzen 7</option>

                </select>
            </div>
            <div class="form-group" style="width: 100%;" >
                <label for="furnitureSize">screen    Size</label>
            <select name="sizes[]" id="furnitureSize" class="form-select" id="colorSelect">
               <option value="">select screen size"</option>
               <option value="13">13"</option>
                <option value="15">15"</option>
                <option value="17">17"</option>
            </select>
            </div>

            <div class="form-group" style="width: 100%;">
                <label for="variant_stock">Variant Stock</label>
                <input name="variant_stock[]" type="number" class="form-control" placeholder="Enter variant stock" />
            </div>
            <button type="button" class="btn btn-danger remove-variant-btn" onclick="removeVariant(this)">Remove</button>
        `;
        else if (current  == 7) // food
        newVariantGroup.innerHTML = `
             <div class="form-group" style="width: 100%;" >
                <label for="size">food Type</label>
                <select name="type[]" id="furnitureMaterial" class="form-select" id="colorSelect">
                    <option value="">Select Type</option>
                <option value="fresh">Fresh</option>
                <option value="frozen">Frozen</option>
                <option value="canned">Canned</option>
            </select>
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="color">flavor</label>
                <select name="flavor[]" class="form-select" style="width: 100%;" id="colorSelect">
                 <option value="">Select Flavor</option>
                <option value="sweet">Sweet</option>
                <option value="spicy">Spicy</option>
                <option value="savory">Savory</option>

                </select>
            </div>


            <div class="form-group" style="width: 100%;">
                <label for="variant_stock">Variant Stock</label>
                <input name="variant_stock[]" type="number" class="form-control" placeholder="Enter variant stock" />
            </div>
            <button type="button" class="btn btn-danger remove-variant-btn" onclick="removeVariant(this)">Remove</button>
        `;

        variantInputs.appendChild(newVariantGroup);
    }
</script>
@endsection
