@extends('dashboard.masterDashboardLayout')
@section('content')
  {{--<a href="{{ route('profile_index') }}">View Profile</a>--}}
   {{--<a href="{{route('dashboard')}}">Dashboard</a>--}}
   {{--<a href="{{route('payment_index')}}">Payment</a>  --}}
   {{--<a href="{{route('requestsView')}}">Your Requests</a>--}}


   {{--<h1>Dashboard</h1>--}}

  <!-- Page header -->
  <div class="page-header page-header-default">
      <div class="page-header-content">
          <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
          </div>

          <div class="heading-elements">
              <div class="heading-btn-group">
                  <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                  <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                  <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
          </div>
      </div>

      <div class="breadcrumb-line">
          <ul class="breadcrumb">
              <li><a href="{{route('dashboardTransaction')}}"><i class="icon-home2 position-left"></i> Transactions</a></li>
              <li class="active">Dashboard</li>
          </ul>

          <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-gear position-left"></i>
                      Settings
                      <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                      <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                      <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
  <!-- /page header -->

  <!-- Content area -->
  <div class="content">

      <!-- Main charts -->
      <div class="row">
          <div class="col-lg-12">

              <!-- Traffic sources -->
              <div class="panel panel-flat">
                  <div class="panel-heading">
                      <h6 class="panel-title">Tutors' List</h6>
                      <div class="heading-elements">
                          <form class="heading-form" action="#">
                              <div class="form-group">
                                  <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                      <input type="checkbox" class="switch" checked="checked">
                                      Live update:
                                  </label>
                              </div>
                          </form>
                      </div>
                  </div>
                  <table id="transaction_list">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>User ID</th>
                          <th>Amount</th>
                          <th>Pay For</th>
                          <th>Date</th>
                      </tr>
                      </thead>
                  </table>
                  <div class="position-relative" id="traffic-sources"></div>
              </div>
              <!-- /traffic sources -->

          </div>
      </div>
      <script>
      $(document).ready(function() {
          var url = '{{route('transaction_datatable')}}';
          oTable = $('#transaction_list').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": url,
              "columns": [{data: 'id', name: 'id'},
                  {data: 'user_id', name: 'user_id'},
                  {data: 'amount', name: 'amount'},
                  {data: 'pay_for', name: 'pay_for'},
                  {data: 'created_at', name: 'created_at'},
              ]
          });
          });
          </script>
      <!-- /main charts -->
@endsection
