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
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" value="{{ old('name', $product->name) }}" type="text" class="form-control" id="name" placeholder="Enter Product Name" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Description of the product" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="form-group">
                <div style="display: flex; gap:4%;">
                    <div class="form-group" id="widthGroup">
                        <label for="price">Price</label>
                        <input name="price" value="{{ old('price', $product->price) }}" type="number" class="form-control" placeholder="Enter Product price" />
                    </div>
                    <div class="form-group" id="widthGroup">
                        <label for="quantity">Quantity</label>
                        <input name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" type="number" class="form-control" placeholder="Enter quantity" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="category_id">Categories</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
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
                            <img src="{{ Storage::url($photo->photo_url) }}" alt="Product Image" width="280px" height="250px">
                            <div class="icons">
                                <a href=""><i class="fa fa-edit"></i></a>
                                <button class="fa fa-times" onclick="deleteImage('{{ route('deleteProductImage', ['productId' => $product->id, 'imageId' => $photo->id]) }}')"></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group" id="btnLeft">
                <button class="btn btn-black btn-round ms-auto">
                    <i class="fa far fa-user"></i>
                    Update Product
                </button>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // transfaer it to js fetch
    function deleteImage(url) {
        if (confirm('Are you sure you want to delete this image?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    alert('Image deleted successfully');
                    location.reload(); // Refresh the page to see changes
                },
                error: function(xhr) {
                    alert('Error deleting image: ' + xhr.responseText);
                }
            });
        }
    }
</script>
@endsection
