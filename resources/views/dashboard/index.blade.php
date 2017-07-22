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
              <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
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
                  <table id="tutor_list">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Tutor Identity</th>
                          <th>Qualification</th>
                          <th>Subject</th>
                          <th>Skills</th>
                          <th>Per Hour Charges</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                  </table>
                  <div class="position-relative" id="traffic-sources"></div>
              </div>
              <!-- /traffic sources -->

          </div>
      </div>
      <div class="modal fade" id="viewTutor" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
           <div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title" id="myModalLabel">More About Tutor</h4>
					</div>
					<div class="modal-body">
						<div class="text-center" style="align-content: center">
							<img src="" name="aboutme" width="140" height="140" border="0" class="img-circle tutor_pic"></a>

							<a class="tutor_id" href="#"><h3 class="media-heading tutor_name"></h3></a>
									<span><strong>Subject: </strong></span>
									<span class="label label-warning tutor_subject"></span>
									<br>
									<br>
									<span><strong>Skills: </strong></span>
									<span class="label label-success tutor_skills"></span>
						</div>
							<hr>
							<div class="text-center" style="align-content: center">
							<p class="text-left"><strong>About Tutor: </strong><br>
							<span class="tutor_about"></span>
							</p>
							<br>
							</div>
					</div>
						<div class="modal-footer">
							<div class="text-center" style="align-content: center">
							<span class="transcript">
									<a href="#" download="" class="btn btn-outline-success download_link" style="padding: 10% 15%">Download Transcript <i class="glyphicon glyphicon-download-alt stroked"></i></a>
							</span>
							</div>
							<div class="text-center" style="align-content: center">
							<a class="btn btn-info tutor_approval">Approve</a>
							<a class="btn btn-danger delete_tutor">Delete</a>
							</div>
						</div>
				</div>
			</div>
		</div>
      <!-- /main charts -->


      <!-- Dashboard content -->

      <!-- /dashboard content -->


      <!-- Footer -->
  <!-- /content area -->
      <script>
          $(document).ready(function() {
              var url = '{{route('tutor_list')}}';
              oTable = $('#tutor_list').DataTable({
                  "processing": true,
                  "serverSide": true,
                  "ajax": url,
                  "columns": [{data: 'tutor_id', name: 'tutor_id'},
                      {data: 'tutor_unique', name: 'tutor_unique'},
                      {data: 'tutor_qualification', name: 'tutor_qualificaion'},
                      {data: 'tutor_majors', name: 'tutor_majors'},
                      {data: 'tutor_skills', name: 'tutor_skills'},
                      {data: 'per_hour_charges', name: 'per_hour_charges'},
                      {data: 'status', name: 'status'},
                      {data: 'action', name: 'action'}
                  ]
              });
	var g_tutor_id = "";
	$('body').on('click','.tutorRecord',function(){
		var url = $(this).attr('url');
		var id = $(this).attr('tutor_id');
		g_tutor_id = id;
		 $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });

		     $.ajax({
                url: url,
                type: 'post',
				data: {'id':id},
                cache: true,
                success: function( data ) {
					console.log(data.tutorRecord);
					$('#viewTutor').find('.tutor_pic').attr('src',"{{asset('/public/profile_pics/')}}"+'/'+ data.tutorRecord.profile_pic);
					$('#viewTutor').find('.tutor_name').text(data.tutorRecord.tutor_unique);
					$('#viewTutor').find('.tutor_skills').text(data.tutorRecord.tutor_skills);
					$('#viewTutor').find('.tutor_subject').text(data.tutorRecord.tutor_majors);
					$('#viewTutor').find('.tutor_about').text(data.tutorRecord.tutor_about);

					if(data.tutorRecord.admin_approval == 1){
						$('.tutor_approval').hide();
					}
					else{
						$('.tutor_approval').show();
					}
					if(data.tutorRecord.tutor_transcript != ""){
						var down = "http://localhost/rod/rod/download/"+data.tutorRecord.tutor_transcript;
						var href = "http://localhost/rod/rod/public/tutor_transcripts/"+data.tutorRecord.tutor_transcript;
						$html = '<a href="'+href+'" download="'+down+'" class="btn btn-outline-success download_link" style="padding: 10% 15%">Download Transcript <i class="glyphicon glyphicon-download-alt stroked"></i></a>';
						$('#viewTutor').find('.transcript').html($html);
					}
					else{
						$('#viewTutor').find('.transcript').html("No transcript available");
					}
                },
                error:function( data ) {
					console.log(data.tutor)
                }
            });
	});
	$('.tutor_approval').on('click',function(e){
		e.preventDefault();
		var url = "tutor_approval/"+g_tutor_id;
            $.get(url,function(data){
                toastr.success('Tutor Approved');
                location.reload();
            })
	});
	$('.delete_tutor').on('click',function(e){
		e.preventDefault();
		var url = "deleteTutor/"+g_tutor_id;
            $.get(url,function(data){
                toastr.success('Tutor Approved');
                location.reload();
            })
	});

          });
      </script>
@endsection
