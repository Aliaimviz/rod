@extends('masterlayout')
@section('content')

<div class="container">
    <div class="col-md-12 min-height">
        <div class="container-fluid text-center trans-text">
            <h3>Student Requests</h3>
        </div>
        <table id="tutor_booking">
            <thead>
            <tr>
                <th>Student Name</th>
                <th>Note</th>
                <th>Payment Status</th>
                <th>Amount Paid</th>
                <th>Date</th>
            </tr>
            </thead>
        </table>
    </div>
    </div>
<script>
$(document).ready(function() {
  var url = '{{route('tutorbooking_datatable')}}';
  oTable = $('#tutor_booking').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": url,
      "columns": [{data: 'username', name: 'username'},
          {data: 'note_title', name: 'note_title'},
          {data: 'status', name: 'status'},
          {data: 'amount', name: 'amount'},
          {data: 'booking_date', name: 'booking_date'},
      ]
  });
    });
    </script>
@endsection
