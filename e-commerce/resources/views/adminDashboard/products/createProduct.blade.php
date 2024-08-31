@extends('adminLayout.navAndsidebar')
@section('content')
<style>
#centerTable {
    width: 60%;
    margin-left: 20%
}
#btnLeft {
   display: flex;
   justify-content: end
}
#widthGroup {
    width: 100% !important
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
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter Product Name" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Description of the product" rows="4"></textarea>
            </div>
            <div class="form-group">
                <div style="display: flex; gap:4%;">
                    <div class="form-group" id="widthGroup">
                        <label for="price">Price</label>
                        <input name="price" type="number" class="form-control" placeholder="Enter Product price" />
                    </div>
                    <div class="form-group" id="widthGroup">
                        <label for="quantity">Quantity</label>
                        <input name="stock_quantity" type="number" class="form-control" placeholder="Enter quantity" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="category_id">Categories</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image_url">Main Image</label>
                <input name="image_url" type="file" class="form-control" placeholder="Main image of the product" />
            </div>
            <div class="form-group">
                <label for="images">Secondary Images</label>
                <input name="images[]" type="file" class="form-control" placeholder="Secondary images of the product" multiple />
            </div>
            <div class="form-group" id="btnLeft">
                <button class="btn btn-black btn-round ms-auto">
                    <i class="fa far fa-user"></i>
                    Create Product
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
