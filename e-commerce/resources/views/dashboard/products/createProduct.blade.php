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
    .variant-group {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .remove-variant-btn {
        margin-top: 26px;
        margin-left: 10px;
    }
    .btn-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    /* Responsive Styles */
    @media (max-width: 768px) {
        #centerTable {
            width: 90%;
            margin-left: 5%;
        }
        .variant-group {
            flex-direction: column;
            align-items: flex-start;
        }
        .variant-group .form-group {
            width: 100%;
            margin-bottom: 10px;
        }
        .remove-variant-btn {
            align-self: flex-end;
            margin-top: 10px;
        }
        .btn-container {
            flex-direction: column;
            align-items: flex-start;
        }
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
    <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="centerTable" class="col-md-12">
            @if (Auth::user()->role_id  == 3)


            <div class="form-group">
                <label for="name">Append this Product to </label>
                <select name="toSeller"  class="form-select" style="width: 100%;">
                    <option value="">Select seller</option>
                    @foreach ($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->user->name }}</option>
                    @endforeach
                </select>            </div>
                @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter Product Name" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Description of the product" rows="4"></textarea>
            </div>
            <div class="form-group">
                        <label for="price">Price</label>
                        <input name="price" type="number" class="form-control" placeholder="Enter Product price" />
            </div>
            <div class="form-group">
                        <label for="price">On sale</label>
                        <input    id="onSale" name="on_sale" type="number" class="form-control" min="0.01" max="0.99"  step="0.01" placeholder="Enter The Amount Of The Sale ex: 0.25" />
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="category_id">Categories</label>
                <select name="category_id" id="selectedCat" onchange="toggleVariantSection()" class="form-select" style="width: 100%;">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="image_url">Main Image</label>
                <input name="image_url" type="file" class="form-control" placeholder="Main image of the product" />
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="images">Secondary Images</label>
                <input name="images[]" type="file" class="form-control" placeholder="Secondary images of the product" multiple />
            </div>
            {{-- <div class="form-group">
                <input name="variance" type="checkbox" onclick="toggleVariantSection()" id="variance" />
                <label for="variance">Has Variance?</label>
            </div> --}}


            <div id="variantInputs" style="display:none">
                <div class="variant-group">
                   {{-- here show the variant --}}
                </div>
            </div>
            <div class="btn-container" id="addVariantButtonContainer" style="display: block;">
                <button type="button" class="btn btn-secondary" onclick="addVariant()">Add Another Variant</button>
            </div>
            <div class="form-group" style="width: 100%;" id="btnLeft">
                <button class="btn btn-black btn-round ms-auto">
                    <i class="fas fa-tag"></i>
                    Create Product
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    // this to the onsale input
    const onSaleInput = document.getElementById('onSale');

onSaleInput.addEventListener('input', function() {
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
    var current ; // to pass it to the function add variant to add the needed variant
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
                    <option value="Grey">Grey</option>
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
                <option value="intel_i3">Intel i3</option>
                <option value="intel_i5">Intel i5</option>
                <option value="intel_i7">Intel i7</option>
                <option value="intel_i9">Intel i9</option>
                <option value="amd_ryzen_3">AMD Ryzen 3</option>
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
                <option value="amd_ryzen_3">AMD Ryzen 3</option>
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
