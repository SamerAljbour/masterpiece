@extends('dashboardLayout.navAndsidebar')
@section('content')
<style>
#centerTable{
    width: 60%;
    margin-left: 20%
}
#btnLeft{
    display: flex;
   justify-content: end
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
                <label for="defaultSelect">Role</label>
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

@endsection
