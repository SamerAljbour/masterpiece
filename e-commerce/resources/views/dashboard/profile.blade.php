@extends('dashboardLayout.navAndsidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> --}}
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-header {
            background-color: #4e73df;
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }
        .stat-icon.blue { background-color: #4e73df; }
        .stat-icon.green { background-color: #1cc88a; }
        .stat-icon.yellow { background-color: #f6c23e; }
        .stat-icon.cyan { background-color: #36b9cc; }
        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
        }
        .stat-label {
            color: #858796;
            margin: 0;
        }
        .info-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }
        .info-title {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        .info-label {
            color: #858796;
            margin-bottom: 0.25rem;
        }
        .info-value {
            margin-bottom: 1rem;
        }
        .activity-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        .activity-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }
        .activity-icon.success { background-color: #1cc88a; }
        .activity-icon.primary { background-color: #4e73df; }
        .activity-icon.warning { background-color: #f6c23e; }
        .activity-content {
            flex: 1;
        }
        .activity-date {
            color: #858796;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<div class="container-fluid mt-5">
    <div class="profile-header text-center ">
        <img src="{{ Storage::url($sellerInfo->user_image) }}" width="130px" height="130px" class="rounded-circle mb-3 mt-2" alt="Profile Picture">
        <h2>{{ $sellerInfo->name }}</h2>
        {{-- <p>Professional Web Developer</p> --}}
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card d-flex align-items-center">
                    <div class="stat-icon blue text-white">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="stat-value">1,294</h4>
                        <p class="stat-label">Followers</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card d-flex align-items-center">
                    <div class="stat-icon green text-white">
                        <i class="fas fa-chart-line fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="stat-value">47</h4>
                        <p class="stat-label">Projects</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card d-flex align-items-center">
                    <div class="stat-icon yellow text-white">
                        <i class="fas fa-star fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="stat-value">4.8</h4>
                        <p class="stat-label">Rating</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card d-flex align-items-center">
                    <div class="stat-icon cyan text-white">
                        <i class="fas fa-tasks fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="stat-value">156</h4>
                        <p class="stat-label">Completed</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="info-card">
                    <h3 class="info-title">Profile Information</h3>
                    <div>
                        <p class="info-label">Full Name</p>
                        <p class="info-value">{{ $sellerInfo->name }}</p>

                        <p class="info-label">Email</p>
                        <p class="info-value">{{ $sellerInfo->email }}</p>

                        <p class="info-label">Phone</p>
                        <p class="info-value">{{ $sellerInfo->phone }}</p>

                        <p class="info-label">Address</p>
                        <p class="info-value">{{ $sellerInfo->address }}</p>
                    </div>
                    <button class="btn btn-primary rounded-5" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fas fa-edit me-2"></i>Edit Profile
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <h3 class="info-title">Recent Activity</h3>
                    <div class="activity-item">
                        <div class="activity-icon success text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="activity-content">
                            <p class="mb-0">Completed project "E-commerce Website"</p>
                            <p class="activity-date">2 days ago</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon primary text-white">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <p class="mb-0">Gained 50 new followers</p>
                            <p class="activity-date">1 week ago</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon warning text-white">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="activity-content">
                            <p class="mb-0">Won "Developer of the Month" award</p>
                            <p class="activity-date">2 weeks ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
    <form action="{{ route('updateProfile') }}" method="POST"  enctype="multipart/form-data">
    <div class="modal fade" id="editProfileModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control"name="name" value="{{ $sellerInfo->name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $sellerInfo->email }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control"name="password" value="{{ $sellerInfo->password }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" value="{{ $sellerInfo->phone }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address">{{ $sellerInfo->address }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control"name="user_image" value="{{ $sellerInfo->user_image }}">
                        </div>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger rounded-5" data-bs-dismiss="modal">Cancel</button> --}}
                    <button type="submit" class="btn btn-success rounded-5">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    </form>
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert@1.1.3/dist/sweetalert.min.js"></script> --}}
</body>
</html>

@endsection
