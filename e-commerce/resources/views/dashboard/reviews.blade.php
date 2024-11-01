@extends('dashboardLayout.navAndsidebar')
@section('content')

<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Multi Filter Select</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="multi-filter-select"
            class="display table table-striped table-hover"
          >
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
                @if ($reviews->count() > 0)

                @foreach ($reviews as $review)
              <tr>


                <td>{{ $review->id }}</td>
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->comment }}</td>
                <td>{{ $review->rating }}</td>
                <td>
                    <form action="{{ route('deletereview', $review->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link"> <i class="fa fa-times" style="color: red"></i></button>
                    </form>
                </td>

            </tr>
            @endforeach



            </tbody>

        @endif
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
