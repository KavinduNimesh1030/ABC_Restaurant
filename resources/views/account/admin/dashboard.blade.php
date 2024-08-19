@extends('account.layouts.default')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">

  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <!-- Statistics -->
      <div class="col-xl-12 mb-4 col-lg-12 col-12">
        <div class="card h-100">
          <div class="card-header">
            <div class="d-flex justify-content-between mb-3">
              <h5 class="card-title mb-0">Statistics</h5>
              <small class="text-muted">Updated 1 month ago</small>
            </div>
          </div>
          <div class="card-body">
            <div class="row gy-3">
              <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-primary me-3 p-2">
                    <i class="ti ti-chart-pie-2 ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">230k</h5>
                    <small>Sales</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-info me-3 p-2">
                    <i class="ti ti-users ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">8.549k</h5>
                    <small>Customers</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-danger me-3 p-2">
                    <i class="ti ti-shopping-cart ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">1.423k</h5>
                    <small>Products</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-success me-3 p-2">
                    <i class="ti ti-currency-dollar ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">$9745</h5>
                    <small>Revenue</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

