@extends('dashboardLayout.navAndsidebar')
@section('content')
<style>
    .emptyRow{
        text-align: center;
        font-size: 1.3rem !important;
    }
    #centerTable{
        display: flex;
        flex-direction: row;
        /* align-content: center; */
        margin-left: 20%;
        width: 100%
    }
    #btnLeft{
        margin-left: 4%;
        margin-top: 27px;
        align-content: center;
    }
     .form-group{
        width: 80%;
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
<form action="{{ route('storeCategories') }}" method="POST">
    @csrf
        <div id="centerTable" class="col-md-12">
            <div class="form-group">
              <label for="name">Category Name</label>
              <input
              name="name"
                type="text"
                class="form-control"
                id="name"
                placeholder="Enter Category Name"
              />

            </div>

            <div class="form-group" id="btnLeft">
            <button

              class="btn btn-black btn-round ms-auto"
            >
              <i class="fa far fa-user"></i>
              create category
            </button>
        </div>




    </div>
</form>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Categories</h4>

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
              <table
                id="add-row"
                class="display table table-striped table-hover"
              >
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th style="width: 10%;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th style="width: 10%;">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                    @if (count($categories) > 0)


                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>

                        <td>
                            <div class="form-button-action">
                                <a href="{{ route('editCategories', $category->id)}}" class="btn btn-link btn-primary btn-lg">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('deleteCategories', $category->id) }}" method="POST">
                                    @csrf
                                    <button  type="submit" class="btn btn-link btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @endforeach
                @else
                <tr>

                    <th colspan="3" class="emptyRow">No data found</th>
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
