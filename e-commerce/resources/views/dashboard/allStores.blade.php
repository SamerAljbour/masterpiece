@extends('dashboardLayout.navAndsidebar')
@section('content')
<div class="container">
    <div class="page-inner">
<div class="row">
    @foreach ($allSellers as $seller)
    <div class="col-md-4">
        <div class="card card-profile">
          <div
            class="card-header"
            style="background-image: url('{{ $seller->store_thumbnail? Storage::url( $seller->store_thumbnail) : 'assets/img/blogpost.jpg' }}')"
          >
            <div class="profile-picture">
              <div class="avatar avatar-xl">
                <img
                  src="{{ Storage::url($seller->user->user_image) }}"
                  alt="..."
                  class="avatar-img rounded-circle"
                />
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="user-profile text-center">
              <div class="name">{{ $seller->user->name }}</div>
              <div class="job">{{ $seller->store_name }}</div>
              <div class="desc">{{ $seller->store_description }}</div>
              <div class="social-media">


              </div>
              <div class="view-profile">
                <a href="{{ route('viewStore' , $seller->id) }}" class="btn btn-secondary w-100"
                  >View Full Store</a
                >
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row user-stats text-center">
              <div class="col">
                <div class="number">{{ $seller->rating }}</div>
                <div class="title">Rating</div>
              </div>
              <div class="col">
                <div class="number">{{ $seller->products_count }}</div>
                <div class="title">Products</div>
              </div>
              <div class="col">
                <div class="number">134</div>
                <div class="title"># of Reviews</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @endforeach


</div>
</div>

</div>
@endsection
