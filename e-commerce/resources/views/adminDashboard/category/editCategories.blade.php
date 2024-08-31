@extends('adminLayout.navAndsidebar')
@section('content')
<style>
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
<form action="{{ route('updateCategories' ,$category->id) }}" method="POST">
    @csrf
    @method("PUT")
        <div id="centerTable" class="col-md-12">
            <div class="form-group">
              <label for="name">Category Name</label>
              <input
              name="name"
                type="text"
                class="form-control"
                id="name"
                placeholder="Enter Category Name"
                value="{{ $category->name }}"
              />

            </div>

            <div class="form-group" id="btnLeft">
            <button

              class="btn btn-black btn-round ms-auto"
            >
              <i class="fa far fa-user"></i>
              update category
            </button>
        </div>




    </div>
</form>

@endsection
