@extends('dashboardLayout.navAndsidebar')
@section('content')
<style>
    #btnLeft{
        margin-left: 4%;

    }

    </style>

<div class="container">


      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title w-100"
              >{{ Auth::user()->role_id == 2 ? "My Ads Request" : "Ads Request" }}
            </h4>
              <h4 class="card-title w-100 fs-5"
              >
               homepage ?/5 | Products ?/1 | Product Detail ? /1

            </h4>

                  {{-- <a
                    href="{{ route('createProduct') }}"
                    class="btn btn-black btn-round ms-auto"
                  >
                    <i class="fa far fa-user"></i>
                    create products
                  </a> --}}


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
                            <th>Product Image</th>
                            @if (Auth::user()->role_id == 3)
                            <th>seller</th>
                            @endif
                            <th >Product Name</th>
                            <th >location</th>
                            @if (Auth::user()->role_id == 3)
                            <th>Ad Type</th>
                            @endif
                            <th>status</th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Product Image</th>
                            @if (Auth::user()->role_id == 3)
                            <th>seller</th>
                            @endif
                            <th >Product Name</th>
                            <th >location</th>
                            @if (Auth::user()->role_id == 3)
                            <th>Ad Type</th>
                            @endif
                            <th>status</th>

                            <th>Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @if (count($adsRequest) > 0)
                            @foreach ($adsRequest as $request)
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td><img src="{{ Storage::url($request->product->image_url) }}" height="150px" width="150px" alt="{{ $request->product->name }} image"></td>
                                    @if (Auth::user()->role_id == 3)
                                    <td>{{ $request->user->name }}</td>
                                    @endif
                                    <td>{{ $request->product->name }}</td>
                                    <td>{{ $request->location }}</td>
                                    @if (Auth::user()->role_id == 3)
                                    <td>{{ $request->ad_type }}</td>
                                    @endif

                                    <td class="text-center">
                                        @switch($request->status)
                                            @case('pending')
                                                <span class="badge badge-warning">Pending</span>
                                                @break
                                            @case('active')
                                                <span class="badge badge-success">Active</span>
                                                @break
                                            @case('expired')
                                                <span class="badge badge-secondary">Expired</span>
                                                @break
                                            @case('rejected')
                                                <span class="badge badge-danger">Rejected</span>
                                                @break
                                        @endswitch
                                    </td>

                                    <td>
                                        <form action="{{ route('deleteAdRequest', $request->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link btn-danger btn-md">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @if (Auth::user()->role_id == 3)
                                        <div class="form-button-action">
                                            <a href="{{ route('acceptAdRequest', $request->id) }}" class="btn btn-link btn-primary btn-md">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="{{ route('rejectAdRequest', $request->id) }}" class="btn btn-link btn-primary btn-md">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="{{ Auth::user()->role_id == 3 ? 7 : 6 }}" class="emptyRow">No data found</th>
                            </tr>
                        @endif
                    </tbody>

                </table>
            </div>

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
