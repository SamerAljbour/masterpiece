@extends('dashboardLayout.navAndsidebar')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Restore Products</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if (Auth::user()->role_id == 3)


                <table
                  id="basic-datatables"
                  class="display table table-striped table-hover"
                >
                  <thead>
                    <tr>
                        <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Delete At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Delete At</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($deletedProductsForSeller as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <th><img src="{{ Storage::url($product->image_url) }}" width="100px"  height="100px" alt=""></th>
                        <th>{{ $product->name }}</th>
                        <th>{{ $product->price }}</th>
                        <th>{{ $product->deleted_at }}</th>
                        <th>
                            <form action="{{ route('restoreProduct') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <button type="submit"> <i class="fa fa-window-restore"></i></button>
                            </form>
                        </th>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
                @else


                <table
                  id="basic-datatables"
                  class="display table table-striped table-hover"
                >
                  <thead>
                    <tr>
                        <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Delete At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Delete At</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($deletedProducts as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <th><img src="{{ Storage::url($product->image_url) }}" width="100px"  height="100px" alt=""></th>
                        <th>{{ $product->name }}</th>
                        <th>{{ $product->price }}</th>
                        <th>{{ $product->deleted_at }}</th>
                        <th>
                            <form action="{{ route('restoreProduct') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <button type="submit"class ="btn btn-link"> <i class="fa fa-undo"></i></button>
                            </form>
                        </th>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection
