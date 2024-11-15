@extends('dashboardLayout.navAndsidebar')
@section('content')


        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>

                 <h3 class="fw-bold mb-3">Welcome Admin {{  Auth::user()->name}}




                </h3>
              </div>
              {{-- <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a>
              </div> --}}
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Users</p>
                          <h4 class="card-title">{{ $totalUsers }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Sellers</p>
                          <h4 class="card-title">{{ $totalSellers }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Sales</p>
                          <h4 class="card-title">{{ intval($totalSales) }} JOD</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
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
                          <p class="card-category">Total Orders</p>
                          <h4 class="card-title">{{$totalOrders }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                      <div class="card-title">Monthly & Weekly Sales</div>
                    </div>
                    <div class="card-body">
                      <div class="card-sub">

                      </div>
                      <div class="chart-container">
                        <canvas id="htmlLegendsChart"></canvas>
                      </div>
                      <div id="myChartLegend"></div>
                    </div>
                  </div>
              </div>
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
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Stores</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table
                            id="basic-datatables"
                            class="display table table-striped table-hover"
                          >
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Rate</th>
                                <th>Sales</th>
                                <th>Date</th>

                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Owner</th>
                                  <th>Rate</th>
                                  <th>Sales</th>
                                  <th>Date</th>

                              </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($stores as $store )

                              <tr>
                                <td>{{$store->id}}</td>
                                <td>{{$store->store_name}}</td>
                                <td>{{$store->user->name}}</td>
                                <td>{{$store->rating}}</td>
                                <td>{{$store->paymentHistories->sum('amount')}}</td>
                                <td>{{$store->created_at}}</td>

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
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Feedback </h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table
                            id="basic-datatables"
                            class="display table table-striped table-hover"
                          >
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>

                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>

                              </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($feedbacks as $feedback )

                              <tr>
                                <td>{{$feedback->id}}</td>
                                <td>{{$feedback->name}}</td>
                                <td>{{$feedback->email}}</td>
                                <td>{{$feedback->subject}}</td>
                                <td>{{$feedback->message}}</td>
                                <td>{{$feedback->created_at}}</td>

                              </tr>
                              @endforeach

                            </tbody>
                          </table>
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
    //      window.onload = function() {
    //     var modal = new bootstrap.Modal(document.getElementById('largeModal'));
    //     modal.show();
    // };
    //   $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
    //     type: "line",
    //     height: "70",
    //     width: "100%",
    //     lineWidth: "2",
    //     lineColor: "#177dff",
    //     fillColor: "rgba(23, 125, 255, 0.14)",
    //   });

    //   $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
    //     type: "line",
    //     height: "70",
    //     width: "100%",
    //     lineWidth: "2",
    //     lineColor: "#f3545d",
    //     fillColor: "rgba(243, 84, 93, .14)",
    //   });

    //   $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
    //     type: "line",
    //     height: "70",
    //     width: "100%",
    //     lineWidth: "2",
    //     lineColor: "#ffa534",
    //     fillColor: "rgba(255, 165, 52, .14)",
    //   });
      $(document).ready(function () {
        // $("#basic-datatables").DataTable({});

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


      });
    //   chart

    var salesData = @json($salesData);
    var lineChart = document.getElementById("lineChart").getContext("2d");

// Create a gradient for the fill color
var gradientFill = lineChart.createLinearGradient(0, 0, 0, 400);
gradientFill.addColorStop(0, "rgba(29, 122, 243, 0.4)"); // Start color (light blue with transparency)
gradientFill.addColorStop(1, "rgba(29, 122, 243, 0)"); // End color (transparent)

// Create the chart
var myLineChart = new Chart(lineChart, {
    type: "line",
    data: {
        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        datasets: [
            {
                label: "Daily Sales",
                borderColor: "#1d7af3", // Line color
                pointBorderColor: "#FFF", // Point border color
                pointBackgroundColor: "#1d7af3", // Point fill color
                pointBorderWidth: 2, // Point border thickness
                pointHoverRadius: 5, // Point hover size
                pointHoverBorderWidth: 1,
                pointRadius: 4, // Point size
                backgroundColor: gradientFill, // Area below the curve fill color (gradient)
                fill: true, // Enable fill below the line
                borderWidth: 2, // Line thickness
                tension: 0.4, // Curved line
                data: salesData, // Dynamic sales data
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

// weekly monthly charts
var ctx = document.getElementById('htmlLegendsChart').getContext('2d');

// Monthly sales data (from the Laravel controller)
var monthlySalesData = @json($monthlyData);

// Total weekly sales data (from the Laravel controller)
var totalWeeklySales = @json($totalWeeklySales);

// Set up gradients
var gradientStrokeWeekly = ctx.createLinearGradient(500, 0, 100, 0);
gradientStrokeWeekly.addColorStop(0, "#177dff");
gradientStrokeWeekly.addColorStop(1, "#80b6f4");

var gradientStrokeMonthly = ctx.createLinearGradient(500, 0, 100, 0);
gradientStrokeMonthly.addColorStop(0, "#fdaf4b");
gradientStrokeMonthly.addColorStop(1, "#fdaf4b");

// Chart configuration
var myHtmlLegendsChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            'Weekly Total', // Label for total weekly sales
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' // Monthly labels
        ],
        datasets: [
            {
                label: 'Weekly Sales',
                borderColor: gradientStrokeWeekly,
                pointBackgroundColor: gradientStrokeWeekly,
                pointRadius: 2,
                tension : 0.4 ,
                backgroundColor: 'rgba(23, 125, 255, 0.3)',
                fill: true,
                borderWidth: 1,
                data: [totalWeeklySales].concat(monthlySalesData), // Show total weekly sales followed by monthly sales data
            },
            {
                label: 'Monthly Sales',
                borderColor: gradientStrokeMonthly,
                pointBackgroundColor: gradientStrokeMonthly,
                pointRadius: 2,
                backgroundColor: 'rgba(253, 175, 75, 0.3)',
                fill: true,
                borderWidth: 1,
                tension : 0.4 ,
                data: monthlySalesData, // Use the monthly sales data
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top',
            },
        },
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});

// Custom legend generation
var myLegendContainer = document.getElementById("myChartLegend");
myLegendContainer.innerHTML = myHtmlLegendsChart.legend.legendItems.map(item => {
    return `<li style="color:${item.fillStyle};">${item.text}</li>`;
}).join('');

// Event listener for legend clicks (if needed)
var legendItems = myLegendContainer.getElementsByTagName("li");
for (var i = 0; i < legendItems.length; i += 1) {
    legendItems[i].addEventListener("click", legendClickCallback, false);
}

    </script>
  </body>
</html>
@endsection
