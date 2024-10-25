@extends('dashboardLayout.navAndsidebar')
@section('content')
<div class="container">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Pending Sellers</h4>


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

                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>

                  {{-- <th>phone</th>
                  <th>address</th> --}}
                  {{-- <th>role</th> --}}
                  <th style="width: 10%;">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  {{-- <th>phone</th>
                  <th>address</th> --}}
                  {{-- <th>role</th> --}}
                  <th style="width: 10%;">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @if ($pendingSellers->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">
                            <strong>No pending sellers available.</strong>
                        </td>
                    </tr>
                @else
                    @foreach ($pendingSellers as $seller)
                        <tr>
                            <td>{{ $seller->id }}</td>
                            <td>{{ $seller->name }}</td>
                            <td>{{ $seller->email }}</td>
                            @if ($seller->seller->is_setup)
                                <td > <span class="badge badge-success">Setup Completed</span> </td>
                            @else
                                <td > <span class="badge badge-danger">Setup Incomplete</span> </td>
                            @endif
                            <td>
                                <form action="{{ route('approveSeller', $seller->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-button-action">
                                        <button type="submit" class="btn btn-link btn-primary btn-lg">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('rejectSeller', $seller->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-link btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
@endsection
