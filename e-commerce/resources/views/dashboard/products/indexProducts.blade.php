@extends('dashboardLayout.navAndsidebar')
@section('content')
<style>
    #btnLeft{
        margin-left: 4%;

    }
    .outlined-button {
    color: #d9534f; /* Red color for the text */
    border: 2px solid #d9534f; /* Red border */
    background-color: transparent; /* Transparent background */
    padding: 5px 10px; /* Adjust padding to make it look like a button */
    border-radius: 5px; /* Rounded corners */
    text-align: center; /* Center the text */
    display: inline-block; /* Inline block to fit the content */
    font-weight: bold; /* Make the text bold */
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


      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Products</h4>

                  <a
                    href="{{ route('createProduct') }}"
                    class="btn btn-black btn-round ms-auto"
                  >
                  <i class="fas fa-tag"></i>
                  Create Product
                  </a>


            </div>

          </div>
          <div class="card-body">
            <!-- Modal -->
            <div
              class="modal fade"
              id="addRowModal"
              tabindex="-1"
              role="dialog"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold"> New</span>
                      <span class="fw-light"> Row </span>
                    </h5>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="small">
                      Create a new row using this form, make sure you
                      fill them all
                    </p>
                    <form>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label>Name</label>
                            <input
                              id="addName"
                              type="text"
                              class="form-control"
                              placeholder="fill name"
                            />
                          </div>
                        </div>
                        <div class="col-md-6 pe-0">
                          <div class="form-group form-group-default">
                            <label>Position</label>
                            <input
                              id="addPosition"
                              type="text"
                              class="form-control"
                              placeholder="fill position"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Office</label>
                            <input
                              id="addOffice"
                              type="text"
                              class="form-control"
                              placeholder="fill office"
                            />
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer border-0">
                    <button
                      type="button"
                      id="addRowButton"
                      class="btn btn-primary"
                    >
                      Add
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      data-dismiss="modal"
                    >
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>


            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th style="width:20%">Description</th>
                            <th>Price</th>
                            <th>Category Name</th>
                            <th>Stock Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th style="width:20%">Description</th>
                            <th>Price</th>
                            <th>Category Name</th>
                            <th>Stock Quantity</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td style="width:20%">{{ Str::limit($product->description, 150) }}
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    @if ($product->total_stock)
                                        <td class="text-center">{{ $product->total_stock }}</td>
                                    @else
                                        <td class="text-center">
                                            <span class="badge badge-success">Out of Stock</span>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('editProduct', $product->id) }}" class="btn btn-link btn-primary btn-md">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            {{-- <form action="" method="POST">
                                                @csrf
                                                <button type="submit" href="{{ route('editProduct', $product->id) }}" class="btn btn-link btn-primary btn-md">
                                                    <i class="fa fa-bullhorn"></i>
                                                </button>
                                            </form> --}}
                                            <form action="{{ route('deleteProduct', $product->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-link btn-danger btn-md">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="7" class="emptyRow">No data found</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

          </div>
        </div>
      </div>



    <script>
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

  // Wait for the document to be fully loaded
  document.addEventListener('DOMContentLoaded', function () {
    // Select all delete buttons and add click event listener
    document.querySelectorAll('#deleteDiscount').forEach(function (button) {
      button.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent default form submission

        const form = this.closest('form'); // Get the closest form element
        const url = form.getAttribute('action'); // Get form action URL

        // Show SweetAlert2 confirmation dialog
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit(); // Submit the form if confirmed
          }
        });
      });
    });
  });


</script>


    </script>

  </body>
</html>
@endsection
