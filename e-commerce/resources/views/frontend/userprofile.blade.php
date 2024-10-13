@extends('layout.mainTwo')
@section('content')
    <style>


        .main-content {
            background-color: #fff;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }
        .btn-primary {
            background-color: #c8a165;
            border-color: #b89158;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #b89158;
            border-color: #a8834c;
        }
        .modal-content {
            border-radius: 0;
        }
        .user-info {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        .user-info p {
            margin-bottom: 10px;
        }
        h2, h3 {
            color: #c8a165;
            margin-bottom: 20px;
        }
        .table-hover > tbody > tr:hover {
            background-color: #f5f5f5;
        }
        .label-success {
            background-color: #5cb85c;
        }
        .label-info {
            background-color: #5bc0de;
        }
        .user-avatar {
            text-align: center;
            margin-bottom: 20px;
        }
        .user-avatar img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #f0f0f0;
            transition: all 0.3s ease;
        }
        .user-avatar img:hover {
            transform: scale(1.05);
            border-color: #c8a165;
        }
        .custom-button {
        background-color: #c8a165; /* Original button color */
        border-color: #c8a165; /* Border color */
        color: white; /* Text color */
        padding: 5px 10px; /* Smaller padding */
        font-size: 14px; /* Smaller font size */
        transition: background-color 0.3s; /* Smooth transition effect */
    }

    .custom-button:hover {
        background-color: #9f7b4a; /* Darker shade of #c8a165 for hover */
        border-color: #9f7b4a; /* Update border color on hover */
        color: white; /* Keep text color white */
    }
        .custom-cancel {

        color: white; /* Text color */
        padding: 5px 10px; /* Smaller padding */
        font-size: 14px; /* Smaller font size */
        transition: background-color 0.3s; /* Smooth transition effect */
    }


    </style>
</head>
<body>


    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="user-avatar">
                        <img src="{{ Storage::url( Auth::user()->user_image) }}" alt="User Avatar">
                    </div>
                    <h3 class="text-center">{{ Auth::user()->name }}</h3>
                    <p class="text-center text-muted">{{ Auth::user()->email }}</p>
                </div>
                <div class="col-md-8">
                    <h2>User Profile
                        <button class="btn btn-primary pull-right custom-button"  data-toggle="modal" data-target="#editProfileModal">
                            Edit Profile
                        </button>
                    </h2>
                                        <div class="user-info">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Address:</strong> 123 Main St, Anytown, USA</p>
                                <p><strong>Member Since:</strong> January 1, 2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Purchase History</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1001</td>
                        <td>2024-03-15</td>
                        <td>Sofa, Coffee Table</td>
                        <td>$549.99</td>
                        <td><span class="label label-success">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>#1002</td>
                        <td>2024-02-28</td>
                        <td>Dining Chair (x4)</td>
                        <td>$299.99</td>
                        <td><span class="label label-info">Shipped</span></td>
                    </tr>
                    <tr>
                        <td>#1003</td>
                        <td>2024-01-10</td>
                        <td>Bookshelf, Floor Lamp</td>
                        <td>$249.99</td>
                        <td><span class="label label-success">Delivered</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Profile</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('updateUserProfile') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" name="password" id="email" value="">
                            <small class="form-text text-muted">Leave blank if you do not wish to change the password.</small>

                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Image</label>
                            <input type="file" class="form-control" name="user_image" style="width:100%" id="address" value="" >
                        </div>
                        {{-- <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" value="123 Main St, Anytown, USA">
                        </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger  custom-cancel rounded-4" data-dismiss="modal">Cancel</button>
                    <button type="submit" class=" btn btn-primary custom-button " >Save changes</button>
                </div>
            </div>
        </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
     @endsection

