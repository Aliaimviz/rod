@extends('masterlayout')
@section('content')
    <style>
        .range {
            display: table;
            position: relative;
            height: 25px;
            margin-top: 20px;
            background-color: rgb(245, 245, 245);
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .range input[type="range"] {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            -ms-appearance: none !important;
            -o-appearance: none !important;
            appearance: none !important;

            display: table-cell;
            width: 100%;
            background-color: transparent;
            height: 25px;
            cursor: pointer;
        }
        .range input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            -ms-appearance: none !important;
            -o-appearance: none !important;
            appearance: none !important;

            width: 11px;
            height: 25px;
            color: rgb(255, 255, 255);
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0px;
            background-color: rgb(153, 153, 153);
        }

        .range input[type="range"]::-moz-slider-thumb {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            -ms-appearance: none !important;
            -o-appearance: none !important;
            appearance: none !important;

            width: 11px;
            height: 25px;
            color: rgb(255, 255, 255);
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0px;
            background-color: rgb(153, 153, 153);
        }

        .range output {
            display: table-cell;
            padding: 3px 5px 2px;
            min-width: 40px;
            color: rgb(255, 255, 255);
            background-color: rgb(153, 153, 153);
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            width: 1%;
            white-space: nowrap;
            vertical-align: middle;

            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            -ms-transition: all 0.5s ease;
            transition: all 0.5s ease;

            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: -moz-none;
            -o-user-select: none;
            user-select: none;
        }
        .range input[type="range"] {
            outline: none;
        }
        .range.range-primary input[type="range"]::-webkit-slider-thumb {
            background-color: rgb(19, 64, 99);
        }
        .range.range-primary input[type="range"]::-moz-slider-thumb {
            background-color: rgb(66, 139, 202);
        }
        .range.range-primary output {
            background-color: rgb(66, 139, 202);
        }
        .range.range-primary input[type="range"] {
            outline-color: rgb(66, 139, 202);
        }
    </style>
    {{--{{dd($requests)}}--}}

    <div class="container-fluid text-center trans-text">
        <h3>All Requests</h3>
    </div>




    <div class="container">
        <div class="col-md-12 min-height">

            <div class="request-menu" style="display:none;">
                <div class="row">
                    <div class="col-lg-2">
                        <p class="active"><img src="{{asset('/public/images/allrequests.png')}}"> All Requests</p>
                    </div>
                    <div class="col-lg-6">
                        <p><img src="{{asset('/public/images/waitingrequest.png')}}"> Waiting for a Response from the tutor
                            <img src="{{asset('public/images/checkmark.png')}}"> Accepted
                            <img src="{{asset('/public/images/star.png')}}" class="starmargin"> Paid</p>
                    </div>

                    <div class="col-lg-2">
                        &nbsp;
                    </div>
                    <div class="col-lg-2">
                        <p><img src="{{asset('/public/images/cancel-icon2.png')}}"> Declined</p>
                    </div>
                </div>
            </div>
			<div class="table-responsive">
            <table class="table table-striped allrequests">
                <thead>
                <tr>
                    <th>Tutor</th>
                    <th width="18%">Notes</th>
                    <th>Price</th>
                    <th>Rate <br/>Tutor</th>
                    <th>Payment<br/> Status</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <span>
                  <tr>
                    <th scope="row">
                        {{--<a href="#"><img src="images/cancel-icon2.png"></a>--}}
                        <img src="{{asset('/public/profile_pics/'.$request->profile_pic)}}" style="width:40px;">{{$request->tutor_unique}}</th>
                    <td>{{$request->note_title}}</td>
                    <td>${{$request->per_hour_charges}}/hour</td>
                    <td>
                      {{--<input type="text" name="rate" class="rating rating-loading" @if($request->ratting_status)disabled value="{{ceil($request->tutor_rating)}}" @else value="5" @endif value="2" data-size="xs" title="" request_id="{{$request->id}}" orgrate="{{$request->tutor_rating}}" tutor_id="{{$request->tutor_id}}">--}}
                        {{--<input type="range" @if($request->ratting_status)disabled value="{{ceil($request->tutor_rating)}}" @else value="5" @endif name="rate" min="1" max="5" request_id="{{$request->id}}" tutor_id="{{$request->tutor_id}}" class="rate">--}}
                      {{--@if(!$request->ratting_status)--}}
                          {{--<input type="button" name="submit" value="Submit Ratting" class="rateTutor btn btn-link" />--}}
                    {{--@endif--}}
                        <input type="hidden" name="tutor_id" id="tutor_id" value="{{ceil($request->tutor_rating)}}" />
                        <input type="hidden" name="booking_id" id="booking_id" value="{{ $request->id }}" />
                       @if(!($request->ratting_status == 1))
                              <a href="{{ route('payment_post') }}" price = "{{$request->per_hour_charges}}" data-id = "{{$request->id}}" data-toggle="modal" data-target="#ratingModal" class="btn btn-primary rateTutor" >Rate Tutor</a>
                       @else
                              <p> ** Rated ** </p>
                             @endif
                                  </td>

                                  <td>
                                      @if($request->pay_status)
                              <h4 class="text-center" style="color: #e80000;"><b>Paid</b></h4>
                              @else
                              <a href="{{ route('payment_post') }}" price = "{{$request->per_hour_charges}}" data-id = "{{$request->id}}" data-toggle="modal" data-target="#myModal" class="btn btn-primary pay" >Send Payment</a>
                    @endif
                                  </td>

                                  <td>{{$request->created_at}}</td>
                                 </tr>
                                  </span>

                                      @endforeach


                          {{--<tr>--}}
                          {{--<th scope="row"><a href="#"><img src="images/cancel-icon2.png"></a><img src="images/request-pic.png" style="width:40px;">Dr Adel</th>--}}
                          {{--<td>from 30$</td>--}}
                          {{--<td>@fat</td>--}}
                          {{--<td><a href="#" class="btn btn-primary edits">Send Payment</a></td>--}}
                          {{--<td>May 10,<br/> 2017</td>--}}
                          {{--</tr>--}}
                          {{--<tr>--}}
                          {{--<th scope="row"><a href="#"><img src="images/cancel-icon2.png"></a><img src="images/request-pic.png" style="width:40px;">Dejana Adel</th>--}}
                          {{--<td>from 40$</td>--}}
                          {{--<td>@twitter</td>--}}
                          {{--<td><a href="#" class="btn btn-primary edits">Send Payment</a></td>--}}
                          {{--<td>May 10,<br/> 2017</td>--}}
                          {{--</tr>--}}
                                  </tbody>
                              </table>
                              </div>
                              {{ $requests->links() }}

                                  <div id="myModal" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                          <!-- Modal content-->
                              <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New Notes</h4>
                        </div>
                        <div class="modal-body">
                            {{--<form id="bookingPayForm" method="post" action="{{ route('booking_payment') }}">--}}
                                <form id="bookingPayForm" method="post" role="form" action="{{route('brainTest')}}">
                                    <div class="row">
                        		<div class="form-group note-title col-md-6">
                                <input type="hidden" value="" name="id"/>
                                <label>Hours to Study</label>
                                <input type="number" min="1" name="hours_study" class="form-control " >
                            	</div>
                            	<div class="form-group note-title col-md-6 paym">
                                	<input type="hidden" value="{{ Session::token() }}" name="_token" />
                                    {{--<input type="submit" class="btn btn-primary" name="payment" value="PAY"/>--}}
                            	</div>
                                    </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="FIRST NAME">
                            </div>
                            <input type="hidden" name="plan_id" value="Null"/>
                            <input type="hidden" name="amount" value="3.99"/>
                            <input type="hidden" name="subscription" value="0"/>
                            <input type="hidden" name="pay_from" value="booking_pay"/>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="card-no" name="card-no" placeholder="CARD NUMBER">
                            </div>
                            <div class="form-group col-md-6">
                                <span style="color:red" class="note_title"></span>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="LAST NAME">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="ex-date" name="ex-date" placeholder="EXPIRY DATE  example : 7/17">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="PHONE NUMBER">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVC/CVV">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="email" name="email" placeholder="EMAIL">
                            </div>
                            <div class="form-group notes-detail col-md-12 text-center">
                                <input type="submit" class="btn btn-primary " value="submit"/>
                            </div>
                            {{csrf_field()}}

                            {{--<div class="form-group col-md-12 text-center">--}}
                                {{--<hr/>OR<div id="paypal-container"></div>--}}
                            {{--</div>--}}











                        </div>
                    </form>

                                <!-- <form id="bookingPayForm" method="post" action="{{ route('booking_payment') }}">
                                <input type="hidden" value="" name="id"/>
                                <div class="row">
                                <div class="col-md-4">
                                <label>Hours to Study</label>
                                <input type="number" min="1" name="hours_study" class="form-control " >
                                </div>
                                   <input type="hidden" value="{{ Session::token() }}" name="_token" />
                                <div class="col-md-8"><input type="submit" class="btn btn-primary" name="payment" value="PAY"/></div>
                                </div>
                                </form>
                                -->




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                                      </div>
                                  </div>

    <!-- Rating Model -->
    <div id="ratingModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Rate Tutor for this Lesson</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h3 class="modal_price"></h3>
                        <form id="tutorRateForm" method="post" action="{{ route('tutor_rating_update') }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Rating</label>
                                    @if(isset($request))
                                    <input type="text" id="rate_tutor" name="rate_tutor" class="rating rating-loading"

                                           value="" data-size="xs" title="{{$request->tutor_id}}" tutor_id="{{$request->tutor_id}}">
                                    <input type="hidden" value="" name="modal_booking_id" id="modal_booking_id" />
                                    @endif
                                    <input type="hidden" value="{{ Session::token() }}" name="_token" />
                                    <input type="submit" name="submit" value="Submit Rating" class=" btn btn-link" />
                                </div>

                                <div class="col-md-8"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
        </div>
    </div>

    {{-------------------------------------------------------}}
    {{--@foreach($requests as $request)--}}
    {{--<span>--}}
    {{--<p>tutor image: {{$request->profile_pic}}</p>--}}
    {{--<p>tutor: {{$request->tutor_unique}}</p>--}}
    {{--<p>charges: {{$request->per_hour_charges}}</p>--}}
    {{--<p>notes title: {{$request->note_title}}</p>--}}
    {{--<p>payment status: {{$request->is_paid}}</p>--}}
    {{--<p>Tutor Rating: <span class="orgRate">{{$request->tutor_rating}}</span></p>--}}
    {{--<h3>Rate Tutor:</h3>--}}
    {{--<input type="number" max="5" name="rate" tutor_id="{{$request->tutor_id}}"/>--}}
    {{--<div class="col-md-2">--}}
    {{--<div class="range range-primary">--}}
    {{--<input type="range" @if($request->ratting_status)disabled value="{{ceil($request->tutor_rating)}}" @else value="5" @endif name="rate" min="1" max="5" request_id="{{$request->id}}" tutor_id="{{$request->tutor_id}}" class="rate">--}}
    {{--<output class="rangePrimary">@if($request->ratting_status){{ceil($request->tutor_rating)}} @else 5 @endif</output>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-10">--}}
    {{--@if(!$request->ratting_status)--}}
    {{--<input type="button" name="submit" value="Rate Tutor" class="rateTutors" />--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</span>--}}
    {{--<div class="col-md-12"> <hr></div>--}}
    {{--@endforeach--}}
    <script src="{{asset('/public/js/star-rating.js')}}" type="text/javascript"></script>
    <script>

        /* Rate Tutor Modal */
        $('.rateTutor').on('click', function(e){
            e.preventDefault();
            console.log("rate tutor");

            var bookingId = $(this).closest('tr').find('input[name=booking_id]').val();
            console.log("bookingId" + bookingId);
            $("#modal_booking_id").val(bookingId);
            //var price = $(this).attr('price');
            //console.log("price" + price);
            // var url = "{{route('tutorRatting')}}";
            // $.ajaxSetup({
            //     headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            // });

            // $.ajax({
            //     url: url,// $("#register_form :input[name!=password2]").serializeArray()
            //     type: 'post', //$('input[name!=password2]', $("#register_form")).serializeArray() //$("#register_form :input[name!=password2][name!=_token]").serializeArray()
            //     data: {'tutorID': tutorID,'avgRate': avgRatting,'id':requestID},
            //     cache: true,
            //     success: function( data ) {
            //         console.log(data);
            //         toastr.success('ThankYou for ratting')
            //         setTimeout(function(){
            //             location.reload(), 1300});
            //     },
            //     error:function( data ) {
            //         var errors = data.responseJSON;
            //         toastr.error('Error! Something went wrong');
            //     }
            // });

        });

        $("#tutorRateForm").on('submit', function(e){
            e.preventDefault();
            var formData = $(this).serialize();


            console.log("tutor rate form submit");
            var bookingId = $('#modal_booking_id').val();
            console.log("bookingId modal" + bookingId);
            var tutor_rated = $("#rate_tutor").val();
            // var tutor_id = $("#rating_tutormodal_id").val();
            // var booking_id = $("#booking_id").val();
            //console.log("tutor_id" + tutor_id);
            var url = "{{route('tutor_ratting_2')}}";
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });

            $.ajax({
                url: url,
                type: 'post',
                // data: {'tutor_rated': tutor_rated, 'tutor_id': tutor_id, 'booking_id': booking_id},
                data: {'bookingId': bookingId, 'tutor_rated': tutor_rated},
                cache: true,
                success: function( data ) {
                    console.log(data);
                    toastr.success('ThankYou for ratting')
                    setTimeout(function(){
                        location.reload(), 1300});
                },
                error:function( data ) {
                    var errors = data.responseJSON;
                    toastr.error('Error! Something went wrong');
                }
            });

        });

        $(document).ready(function(){
            $('.pay').on('click',function(){
                var id = $(this).attr('data-id');
                var price = $(this).attr('price');
                $('#myModal').find('input[name=id]').val(id);
                $('#myModal').find('.modal_price').text('$'+price+'/hour');

            });
            {{--$('.pay').on('click',function(){--}}
                {{--var id = $(this).attr('data-id');--}}
                {{--var price = $(this).attr('price');--}}
                {{--$('#myModal').find('input[name=id]').val(id);--}}
                {{--$('#myModal').find('.modal_price').text('$'+price+'/hour');--}}

                {{--//Sending request to backend--}}

                {{--var url = "{{route('tutorRatting')}}";--}}
                {{--$.ajaxSetup({--}}
                    {{--headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }--}}
                {{--});--}}

                {{--$.ajax({--}}
                    {{--url: url,// $("#register_form :input[name!=password2]").serializeArray()--}}
                    {{--type: 'post', //$('input[name!=password2]', $("#register_form")).serializeArray() //$("#register_form :input[name!=password2][name!=_token]").serializeArray()--}}
                    {{--data: {'tutorID': tutorID,'avgRate': avgRatting,'id':requestID},--}}
                    {{--cache: true,--}}
                    {{--success: function( data ) {--}}
                        {{--console.log(data);--}}
                        {{--toastr.success('ThankYou for ratting')--}}
                        {{--setTimeout(function(){--}}
                            {{--location.reload(), 1300});--}}
                    {{--},--}}
                    {{--error:function( data ) {--}}
                        {{--var errors = data.responseJSON;--}}
                        {{--toastr.error('Error! Something went wrong');--}}
                    {{--}--}}
                {{--});--}}

            {{--});--}}

            $('.glyphicon-minus-sign').hide();
            /*
             $('.rateTutor').on('click',function(){
             var tutorRate = $(this).closest('tr').find('input[name=rate]').val();
             var tutorID = $(this).closest('tr').find('input[name=rate]').attr('tutor_id');
             var requestID = $(this).closest('tr').find('input[name=rate]').attr('request_id');
             var orgRate = $(this).closest('tr').find('input[name=rate]').attr('orgrate');
             var avgRatting = parseFloat(tutorRate) + parseFloat(orgRate) ;
             avgRatting = parseFloat(avgRatting/2);

             var url = "{{route('tutorRatting')}}";
             $.ajaxSetup({
             headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
             });

             $.ajax({
             url: url,// $("#register_form :input[name!=password2]").serializeArray()
             type: 'post', //$('input[name!=password2]', $("#register_form")).serializeArray() //$("#register_form :input[name!=password2][name!=_token]").serializeArray()
             data: {'tutorID': tutorID,'avgRate': avgRatting,'id':requestID},
             cache: true,
             success: function( data ) {
             console.log(data);
             toastr.success('ThankYou for ratting')
             setTimeout(function(){
             location.reload(), 1300});
             },
             error:function( data ) {
             var errors = data.responseJSON;
             toastr.error('Error! Something went wrong');
             }
             });
             }) */

        });
    </script>
@endsection
