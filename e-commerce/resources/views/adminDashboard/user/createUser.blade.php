@extends('adminLayout.navAndsidebar')
@section('content')
<style>
#centerTable{
    width: 60%;
    margin-left: 20%
}
#btnLeft{
    margin-left: 74%;
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
<form action="{{ route('storeUser') }}" method="POST">
    @csrf
        <div id="centerTable" class="col-md-12">
            <div class="form-group">
              <label for="name">Name</label>
              <input
              name="name"
                type="text"
                class="form-control"
                id="name"
                placeholder="Enter Name"
              />

            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input
              name="email"
                type="email"
                class="form-control"
                id="password"
                placeholder="Email"
              /><small id="emailHelp2" class="form-text text-muted"
              >We'll never share your email with anyone
              else.</small
            >
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input
              name="password"
                type="password"
                class="form-control"
                id="password"
                placeholder="Password"
              />
            </div>

            <div class="form-group">
                <label for="defaultSelect">Default Select</label>
                <select
                name="role_id"
                  class="form-select form-control"
                  id="defaultSelect"
                >
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
                </select>
              </div>
            <div class="form-group" id="btnLeft">
            <button
            href="{{ route('createUser') }}"
              class="btn btn-black btn-round ms-auto"
            >
              <i class="fa far fa-user"></i>
              create user
            </button>
        </div>




    </div>
</form>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/setting-demo.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
@endsection
