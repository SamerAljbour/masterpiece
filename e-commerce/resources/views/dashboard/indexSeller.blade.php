@extends('dashboardLayout.navAndsidebar')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                 @if(Auth::user()->role_id == 3)
                 <h3 class="fw-bold mb-3">Welcome Admin {{  Auth::user()->name}}
                 @endif

                 @if(Auth::user()->role_id == 2)
                 <h3 class="fw-bold mb-3">Welcome Seller {{  Auth::user()->name}}
                 @endif



                </h3>
                <h6 class="op-7 mb-2"></h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a> --}}
              </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-md-4">
                    <div class="card card-stats card-round">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                              <i class="fas fa-tag"></i>
                            </div>
                          </div>
                          <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                              <p class="card-category">Sold Products</p>
                              <h4 class="card-title">{{ $countOfSoldProduct }}</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-8 col-md-4">
                    <div class="card card-stats card-round">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                              <i class="fas fa-box" style="font-size: 24px; color: #d10024;"></i> <!-- Example of a red product icon -->
                            </div>
                          </div>
                          <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                              <p class="card-category">Total Products</p>
                              <h4 class="card-title">{{ $productCount }}</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-8 col-md-4">
                    <div class="card card-stats card-round">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-icon">
                            <div class="icon-big text-center">
                              <i class="icon-wallet text-success"></i>
                            </div>
                          </div>
                          <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                              <p class="card-category">Total Sales</p>
                              <h4 class="card-title">JOD {{ number_format($totalSales, 0) }}</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


              {{-- <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Order</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Weekly Sales</div>
                      {{-- <div class="card-tools">
                        <a
                          href="#"
                          class="btn btn-label-success btn-round btn-sm me-2"
                        >
                          <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                          </span>
                          Export
                        </a>
                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                          <span class="btn-label">
                            <i class="fa fa-print"></i>
                          </span>
                          Print
                        </a>
                      </div> --}}
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
            <canvas id="salesChart" style="height: 400px;"></canvas>
                    </div>
                    <div id="myChartLegend"></div>
                  </div>
                </div>
            </div>
              {{--  --}}

            <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Daily Sales</div>
                  </div>
                  <div class="card-body">
                    <div class="chart-container">
                      <canvas id="lineChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>


            <div class="row">

                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Reviews</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table
                              id="basic-datatables"
                              class="display table table-striped table-hover"
                            >
                              <thead>
                                <tr>
                                  <th>Reviewer Name</th>
                                  <th>Product Name</th>
                                  <th>Comment</th>
                                  <th>Rate</th>
                                  <th>Date</th>

                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                    <th>Reviewer Name</th>
                                    <th>Product Name</th>
                                    <th>Comment</th>
                                    <th>Rate</th>
                                    <th>Date</th>

                                </tr>
                              </tfoot>
                              <tbody>
                                @foreach ($reviews as $review )

                                <tr>
                                  <td>{{$review->user->name}}</td>
                                  <td>{{$review->product->name}}</td>
                                  <td>{{$review->comment}}</td>
                                  <td>{{$review->rating}}</td>
                                  <td>{{$review->created_at}}</td>

                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
            <div class="row">
              {{-- <div class="col-md-4">
                <div class="card card-round">
                  <div class="card-body">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">New Customers</div>
                      <div class="card-tools">
                        <div class="dropdown">
                          <button
                            class="btn btn-icon btn-clean me-0"
                            type="button"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-ellipsis-h"></i>
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                          >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-list py-4">
                      <div class="item-list">
                        <div class="avatar">
                          <img
                            src="assets/img/jm_denis.jpg"
                            alt="..."
                            class="avatar-img rounded-circle"
                          />
                        </div>
                        <div class="info-user ms-3">
                          <div class="username">Jimmy Denis</div>
                          <div class="status">Graphic Designer</div>
                        </div>
                        <button class="btn btn-icon btn-link op-8 me-1">
                          <i class="far fa-envelope"></i>
                        </button>
                        <button class="btn btn-icon btn-link btn-danger op-8">
                          <i class="fas fa-ban"></i>
                        </button>
                      </div>
                      <div class="item-list">
                        <div class="avatar">
                          <span
                            class="avatar-title rounded-circle border border-white"
                            >CF</span
                          >
                        </div>
                        <div class="info-user ms-3">
                          <div class="username">Chandra Felix</div>
                          <div class="status">Sales Promotion</div>
                        </div>
                        <button class="btn btn-icon btn-link op-8 me-1">
                          <i class="far fa-envelope"></i>
                        </button>
                        <button class="btn btn-icon btn-link btn-danger op-8">
                          <i class="fas fa-ban"></i>
                        </button>
                      </div>
                      <div class="item-list">
                        <div class="avatar">
                          <img
                            src="assets/img/talha.jpg"
                            alt="..."
                            class="avatar-img rounded-circle"
                          />
                        </div>
                        <div class="info-user ms-3">
                          <div class="username">Talha</div>
                          <div class="status">Front End Designer</div>
                        </div>
                        <button class="btn btn-icon btn-link op-8 me-1">
                          <i class="far fa-envelope"></i>
                        </button>
                        <button class="btn btn-icon btn-link btn-danger op-8">
                          <i class="fas fa-ban"></i>
                        </button>
                      </div>
                      <div class="item-list">
                        <div class="avatar">
                          <img
                            src="assets/img/chadengle.jpg"
                            alt="..."
                            class="avatar-img rounded-circle"
                          />
                        </div>
                        <div class="info-user ms-3">
                          <div class="username">Chad</div>
                          <div class="status">CEO Zeleaf</div>
                        </div>
                        <button class="btn btn-icon btn-link op-8 me-1">
                          <i class="far fa-envelope"></i>
                        </button>
                        <button class="btn btn-icon btn-link btn-danger op-8">
                          <i class="fas fa-ban"></i>
                        </button>
                      </div>
                      <div class="item-list">
                        <div class="avatar">
                          <span
                            class="avatar-title rounded-circle border border-white bg-primary"
                            >H</span
                          >
                        </div>
                        <div class="info-user ms-3">
                          <div class="username">Hizrian</div>
                          <div class="status">Web Designer</div>
                        </div>
                        <button class="btn btn-icon btn-link op-8 me-1">
                          <i class="far fa-envelope"></i>
                        </button>
                        <button class="btn btn-icon btn-link btn-danger op-8">
                          <i class="fas fa-ban"></i>
                        </button>
                      </div>
                      <div class="item-list">
                        <div class="avatar">
                          <span
                            class="avatar-title rounded-circle border border-white bg-secondary"
                            >F</span
                          >
                        </div>
                        <div class="info-user ms-3">
                          <div class="username">Farrah</div>
                          <div class="status">Marketing</div>
                        </div>
                        <button class="btn btn-icon btn-link op-8 me-1">
                          <i class="far fa-envelope"></i>
                        </button>
                        <button class="btn btn-icon btn-link btn-danger op-8">
                          <i class="fas fa-ban"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
              <div class="col-md-12" id="pagination-section" >
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Transaction History For My Products</div>
                      <div class="card-tools">
                        {{-- <div class="dropdown">
                          <button
                            class="btn btn-icon btn-clean me-0"
                            type="button"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-ellipsis-h"></i>
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                          >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </div>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div  class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Payment Number</th>
                                    <th scope="col" class="text-end">Amount</th>
                                    <th scope="col" class="text-end">Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $item)
                                    <tr>
                                        <th scope="row">
                                            <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            Payment from #{{ $item->id }}
                                        </th>
                                        <td class="text-end">{{ number_format($item->amount , 1) }} JOD</td>
                                        <td class="text-end">{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div  class="ms-3 me-3 mt-3">
                            {{ $transactions->links('pagination::bootstrap-5', ['#pagination']) }}
                        </dic>
                    </div>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>

      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      <!-- End Custom template -->
    </div>



    <script>
        // for scrolling when choose a pagination
        window.onload = function() {
        // Scroll to the pagination section after the page has fully loaded
        if (window.location.hash === '#pagination-section') {
            const paginationSection = document.getElementById('pagination-section');
            if (paginationSection) {
                paginationSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        // Attach event listeners to pagination links
        const paginationLinks = document.querySelectorAll('#pagination-section a');

        paginationLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link action
                const url = this.getAttribute('href'); // Get the URL from the link
                // Redirect to the URL and append the hash
                window.location.href = url + '#pagination-section';
            });
        });
    };
        //  daily
var lineChart = document.getElementById("lineChart").getContext("2d");
var gradientFill = lineChart.createLinearGradient(0, 0, 0, 400); // Adjust height as necessary
gradientFill.addColorStop(0, "rgba(29, 122, 243, 0.4)");  // Start color (light blue)
gradientFill.addColorStop(1, "rgba(29, 122, 243, 0)");   // End color (transparent)
var myLineChart = new Chart(lineChart, {
  type: "line",
  data: {
    labels: {!! json_encode($dailyLabels) !!}, // Pass daily labels from Laravel
    datasets: [
      {
        label: "Daily Sales",
        borderColor: "#1d7af3",
        pointBorderColor: "#FFF",
        pointBackgroundColor: "#1d7af3",
        pointBorderWidth: 2,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 1,
        pointRadius: 4,
        backgroundColor: gradientFill,
        fill: true,
        tension: 0.4,
        borderWidth: 2,
        data: {!! json_encode($dailyData) !!}, // Pass daily sales data from Laravel
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: "bottom",
      labels: {
        padding: 10,
        fontColor: "#1d7af3",
      },
    },
    tooltips: {
      bodySpacing: 4,
      mode: "nearest",
      intersect: 0,
      position: "nearest",
      xPadding: 10,
      yPadding: 10,
      caretPadding: 10,
    },
    layout: {
      padding: { left: 15, right: 15, top: 15, bottom: 15 },
    },
  },
});

    var salesChart = document.getElementById("salesChart").getContext("2d");

// Create the gradients for the line stroke
var gradientStroke2 = salesChart.createLinearGradient(0, 0, 0, 400);
gradientStroke2.addColorStop(0, "#f3545d"); // Start color
gradientStroke2.addColorStop(1, "#ff8990"); // End color

// Create the gradient for the fill area
var gradientFill2 = salesChart.createLinearGradient(0, 0, 0, 400);
gradientFill2.addColorStop(0, "rgba(243, 84, 93, 0.7)"); // Start color
gradientFill2.addColorStop(1, "rgba(255, 137, 144, 0.3)"); // End color

// Create the chart (using weekly labels)
var chart = new Chart(salesChart, {
    type: 'line',
    data: {
        labels: @json($weeklyLabels),  // Weekly labels
        datasets: [{
            label: 'Weekly Sales',
            data: @json($weeklyData),  // Weekly sales data
            borderColor: gradientStroke2, // Use the gradient stroke for the line
            backgroundColor: gradientFill2, // Use the gradient fill for the area under the line
            fill: true, // Enable filling under the line
            tension: 0.4, // Adjusts the curvature of the line (0 = straight, 1 = fully curved)
            pointRadius: 4, // Size of the points on the line
            pointBackgroundColor: '#ff3545', // Set to a solid color matching the gradient
            pointHoverRadius: 6, // Size of the point when hovered
            pointBorderColor: gradientStroke2, // Set the border color of points to match the gradient
            pointBorderWidth: 2 // Width of the border around points
        }]
    },
    options: {
        responsive: true, // Makes the chart responsive
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: "rgba(0, 0, 0, 0.1)" // Color for the y-axis grid lines
                }
            },
            x: {
                grid: {
                    color: "rgba(0, 0, 0, 0.1)" // Color for the x-axis grid lines
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top', // Position of the legend
                labels: {
                    boxWidth: 20, // Width of the legend box
                    padding: 20, // Padding around the legend
                }
            }
        }
    }
});

// Generate HTML legend
var myLegendContainer = document.getElementById("myChartLegend");
myLegendContainer.innerHTML = chart.generateLegend();

// Bind onClick event to all LI-tags of the legend
var legendItems = myLegendContainer.getElementsByTagName("li");
for (var i = 0; i < legendItems.length; i += 1) {
    legendItems[i].addEventListener("click", legendClickCallback, false);
}


      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
      document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
            });
        @endif
        @if(session('successRegister'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('successRegister') }}",
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Errors',
                html: '<ul>' +
                    @foreach ($errors->all() as $error)
                        '<li>{{ $error }}</li>' +
                    @endforeach
                '</ul>',
            });
        @endif
    });

    </script>
  </body>
</html>
@endsection
