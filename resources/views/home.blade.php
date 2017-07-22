@extends('masterlayout')
@section('content')

    <!-- Carousel
    ================================================== -->
    <div class='slider'>
        <?php $i=1; ?>
        @foreach($sliders as $slider)
            <div class='slide<?php echo $i; ?>'> 
                <img src="{{asset('/public/dynamic_assets/'.$slider->image )}}" />
                <div class="carousel-caption slide-text">
                    <h1>{{ $slider->text }}</h1>
                    <div class="slider-btns">
                      <div class="slider-btns">
                                @if(Auth::check())
                                <a href="{{route('notesView')}}" class="btn btn-default btn-lg free-trial">YOUR NOTES</a>
                                @else
                                    <a href="{{route('auth_view')}}" class="btn btn-default btn-lg free-trial">SHARE NOTES</a>
                                @endif
                                @if(isset($tutor_flag))
                                @if(!$tutor_flag)
                                <a href="{{route('tutorRegisterView')}}" class="btn btn-default btn-lg subscribes">BECOME TUTOR</a>
                                @endif
                                    @else
                                    <a href="{{route('auth_view')}}" class="btn btn-default btn-lg subscribes">BECOME TUTOR</a>
                                @endif
                      </div>
                    </div>

                </div>
            </div>  
          <?php $i++; ?>         
        @endforeach
        
        <!--<div class='slide1'>
            <img src="{{asset('/public/images/sllider-bg-1.jpg')}}" />
            <div class="carousel-caption slide-text">
                <h1>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h1>
                <div class="slider-btns">
                    <a href="#" class="btn btn-default btn-lg free-trial">FREE TRIAL 1</a>
                    <a href="#" class="btn btn-default btn-lg subscribes">SUBSCRIBE</a>
                </div>

            </div>
        </div>
        <div class='slide2'>
            <img src="{{asset('/public/images/sllider-bg-2.jpg')}}" />
            <div class="carousel-caption slide-text">
                <h1>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h1>
                <div class="slider-btns">
                    <a href="#" class="btn btn-default btn-lg free-trial">FREE TRIAL 2</a>
                    <a href="#" class="btn btn-default btn-lg subscribes">SUBSCRIBE</a>
                </div>

            </div>
        </div>
        <div class='slide3'>
            <img src="{{asset('/public/images/sllider-bg-3.jpg')}}" />
            <div class="carousel-caption slide-text">
                <h1>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h1>
                <div class="slider-btns">
                    <a href="#" class="btn btn-default btn-lg free-trial">FREE TRIAL 3</a>
                    <a href="#" class="btn btn-default btn-lg subscribes">SUBSCRIBE</a>
                </div>

            </div>
        </div> -->
    </div>

        <div class="small-banner">
            <div id="text-carousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="row">
                    <div class="col-xs-offset-0 col-xs-12 slide-back">
                        <div class="carousel-inner small-carousel">
                            <div class="item active">
                                <div class="carousel-content">
                                    
                                        <p>Free For<br/> Students</p>
                                    
                                </div>
                            </div>
                            <div class="item">
                                <div class="carousel-content">
                                    
                                        <p>tutors needs<br/> to pay<br/> $3.99/month</p>
                                    
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Controls -->

            </div>
            {{--<img src="{{asset('/public/images/learningPlatform.png')}}" alt="banner"/>--}}
        </div>



        <!-- / WELCOME TEXT BLOCK -->
        <div class="container-fluid text-center text-sect">
            <h3>WELCOME TO JUMPNOTES</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem.</p>
        </div>


        <div class="mid-section">
            <div class="container-fluid">

                <div class="mid-top">

                    <div class="row">
                        <div class="top-ranking col-md-6 col-sm-6 col-xs-12">
                            <div class="tutors">
                                <h1>TEACH OTHERS<br>EARN  MORE</h1>
                                @if(Auth::check())
                                    @if(!$tutor_flag)
                                        <a href="{{route('tutorRegisterView')}}">Become a Tutor</a>
									@else
                                        <a href="{{route('notesView')}}">Your uploaded Notes</a>
                                    @endif

                                @else
                                    <a href="{{route('auth_view')}}">Join Us</a>
                                @endif
                            </div>

                        </div>

                        <div class="find-notes col-md-6 col-sm-6 col-xs-12">
                            <h2>FIND TOP NOTES</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="{{route('notes_index')}}" class="hoverable-dv">CHECK IT OUT</a>
                        </div>

                    </div>

                    <div class="row">
                        <div class="empower col-md-6 col-sm-6 col-xs-12">
                            <h2>EMPOWERING OTHERS</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="hoverable-dv fb-click">SHARE WITH FRIENDS</a>
                        </div>


                        <div class="recommend col-md-6 col-sm-6 col-xs-12">
                            <div class="tutors">
                                <h1>RECOMMENDED NOTES</h1>
                              
                                    <a href="{{route('notes_index')}}">View Notes</a>
                               
                            </div>
                        </div>

                    </div>


                </div>
            </div>





            <div class="meet-with">
                <div class="container-fluid">

                    <div class="text-center">
                        <h2>RECENT NOTES</h2>
                    </div>

                    <div class="first-row">
                        @foreach($recent_notes as $note)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 main-text col-md-offset-0">
                                <div class="pos-left details detail-home">
                                    <div class="desc-dv title views-no col-md-12">
                                        {{--<h2><a href="#">Note 6</a></h2>--}}
                                        <h2><a href="{{route('single_note',['id' => $note->notes_id])}}">@if(strlen($note->note_title)>20)<?php echo substr($note->note_title,0,20)?>...@else {{$note->note_title}}@endif</a></h2>
                                    </div>

                                    <a href="{{route('single_note',['id' => $note->notes_id])}}" class="pull-left col-md-12 file-ico">
                                        @if($note->file_type)
                                            <?php $img = explode(',',$note->note_file)?>
                                        <img src="{{asset('/public/notes/')}}/{{$img[0]}}">
                                        @else

                                            @if(!empty($note->note_thumb))
                                                <img src="{{asset('/public/notes/thumnail')}}/{{$note->note_thumb}}">
                                            @else
                                                <iframe src="http://docs.google.com/gview?url={{asset('/public/notes/')}}/{{$note->note_file}}&embedded=true" width="100%" height="600px"></iframe>
                                            @endif

                                        @endif
                                    </a>
                                    <div class="desc-dv title-desc col-md-12 col-sm-12 col-xs-12">
                                        <h4>Auhor : {{$note->username}} <small class="pull-right">Rating:

                                                <?php $ratting = round($note->note_rating);?>
                                @for($i=0;$i<5;$i++)
                                    @if($ratting!=0)
                                        <span class="glyphicon glyphicon-star"></span>
                                            <?php $ratting--;?>
                                        @else
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                    @endif
                                    @endfor
                                            </small></h4>

                                        <p class="pull-left "><b>Subject:</b> <span class="note_sub">@if(strlen($note->note_subject)>10) {{substr($note->note_subject,0,10)}}... @else {{$note->note_subject}} @endif</span></p>
                                        <p class="pull-right "><b>Level:</b> <span class="note_level">@if(strlen($note->class)>10) {{substr($note->note_class,0,10)}}... @else {{$note->note_class}} @endif</span></p>


                                        {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium...<p>--}}
                                    </div>
                                    <div class="desc-dv views-no col-md-12 col-sm-12 col-xs-12">
                                        No of View: {{$note->view_count}}

                                        <div class="rating pull-right">
                                            <a style="color: #ffffff" href="{{route('single_note',['id' => $note->notes_id])}}">READ MORE  &#10095;</a>
                                            {{--<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                                            {{--</span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                                            {{--</span><span class="glyphicon glyphicon-star-empty"></span>--}}
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </div>

                    {{--@foreach($recent_notes as $note)--}}
                    {{--<div class="col-lg-4 main-text">--}}
                    {{--<div class="pos-left details">--}}

                    {{--<div class="pull-left col-md-4 file-ico">--}}
                    {{--<i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i>--}}
                    {{--</div>--}}

                    {{--<div class="desc-dv col-md-8">--}}
                    {{--<a href="{{route('single_note',['id' => $note->notes_id])}}"><h4>{{$note->note_title}}</h4></a>--}}
                    {{--<h5>April 17,2016</h5>--}}
                    {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium...<p>--}}
                    {{--<a href="{{route('single_note',['id' => $note->notes_id])}}">READ MORE  &#10095;</a>--}}
                    {{--<p>No of View: {{$note->view_count}}</p>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}


                    {{--<div class="col-lg-4 main-text">--}}
                    {{--<div class="pos-left details">--}}

                    {{--<div class="pull-left col-md-4 file-ico">--}}
                    {{--<i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i>--}}
                    {{--</div>--}}

                    {{--<div class="desc-dv col-md-8">--}}
                    {{--<h4>Neque porro quisquam pro estqui dolorem ipsum</h4>--}}
                    {{--<h5>April 17,2016</h5>--}}
                    {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium...<p>--}}
                    {{--<a href="#">READ MORE  &#10095;</a>--}}
                    {{--<p>No of View: 10</p>--}}
                    {{--<div class="rating">--}}
                    {{--<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star-empty"></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4 main-text">--}}
                    {{--<div class="pos-left details">--}}

                    {{--<div class="pull-left col-md-4 file-ico">--}}
                    {{--<i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i>--}}
                    {{--</div>--}}

                    {{--<div class="desc-dv col-md-8">--}}
                    {{--<h4>Neque porro quisquam pro estqui dolorem ipsum</h4>--}}
                    {{--<h5>April 17,2016</h5>--}}
                    {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium...<p>--}}
                    {{--<a href="#">READ MORE  &#10095;</a>--}}
                    {{--<p>No of View: 10</p>--}}
                    {{--<div class="rating">--}}
                    {{--<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star-empty"></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-lg-4 main-text">--}}
                    {{--<div class="pos-left details">--}}

                    {{--<div class="pull-left col-md-4 file-ico">--}}
                    {{--<i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i>--}}
                    {{--</div>--}}

                    {{--<div class="desc-dv col-md-8">--}}
                    {{--<h4>Neque porro quisquam pro estqui dolorem ipsum</h4>--}}
                    {{--<h5>April 17,2016</h5>--}}
                    {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium...<p>--}}
                    {{--<a href="#">READ MORE  &#10095;</a>--}}
                    {{--<p>No of View: 10</p>--}}
                    {{--<div class="rating">--}}
                    {{--<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star-empty"></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}



                    {{--<div class="second-row">--}}

                    {{--<div class="col-lg-4 main-text ">--}}
                    {{--<div class="pos-left details">--}}
                    {{--<div class="pull-left col-md-4 file-ico">--}}
                    {{--<i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i>--}}
                    {{--</div>--}}
                    {{--<div class="desc-dv col-md-8">--}}
                    {{--<h4>Neque porro quisquam pro estqui dolorem ipsum</h4>--}}
                    {{--<h5>April 17,2016</h5>--}}
                    {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium...<p>--}}
                    {{--<a href="#">READ MORE  &#10095;</a>--}}
                    {{--<p>No of View: 10</p>--}}
                    {{--<div class="rating">--}}
                    {{--<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star-empty"></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    {{--<div class="col-lg-4 main-text ">--}}
                    {{--<div class="pos-left details">--}}
                    {{--<div class="pull-left col-md-4 file-ico">--}}
                    {{--<i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i>--}}
                    {{--</div>--}}
                    {{--<div class="desc-dv col-md-8">--}}
                    {{--<h4>Neque porro quisquam pro estqui dolorem ipsum</h4>--}}
                    {{--<h5>April 17,2016</h5>--}}
                    {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium...<p>--}}
                    {{--<a href="#">READ MORE  &#10095;</a>--}}
                    {{--<p>No of View: 10</p>--}}
                    {{--<div class="rating">--}}
                    {{--<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star-empty"></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-lg-4 main-text ">--}}
                    {{--<div class="pos-left details">--}}

                    {{--<div class="pull-left col-md-4 file-ico">--}}
                    {{--<i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i>--}}
                    {{--</div>--}}

                    {{--<div class="desc-dv col-md-8">--}}
                    {{--<h4>Neque porro quisquam pro estqui dolorem ipsum</h4>--}}
                    {{--<h5>April 17,2016</h5>--}}
                    {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium...<p>--}}
                    {{--<div id="stars-existing" class="starrr" data-rating='4'></div>--}}
                    {{--<a href="#">READ MORE  &#10095;</a>--}}
                    {{--<p>No of View: 10</p>--}}
                    {{--<div class="rating">--}}
                    {{--<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">--}}
                    {{--</span><span class="glyphicon glyphicon-star-empty"></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                </div>


            </div>
        </div>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css">

        {{--@if(Auth::check())--}}
        {{--<div style="float: right">--}}
        {{--<h3>LoggedIn</h3>--}}
        {{--<a href="{{route('logout')}}">Log Out</a>--}}
        {{--<a href="{{route('dashboard')}}">Dashboard</a>        --}}
        {{--</div>--}}
        {{--@else--}}
        {{--<div style="float: right">--}}
        {{--<a href="{{route('auth_view')}}">Log In</a>--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--<h1>i am in home</h1>--}}

        {{--<a>Find tutor</a>--}}
        {{--<a>Find student</a>--}}
        {{--<a>sign up</a>--}}
        {{--<a>sign in</a>--}}
        {{--@if(Auth::check())--}}
        {{--@if(isset($tutor_flag))--}}
        {{--@if(!$tutor_flag)--}}
        {{--<a href="{{route('tutorRegisterView')}}">Become a Tutor</a>--}}
        {{--<br>--}}
        {{--@endif--}}
        {{--@endif     --}}
        {{--<a href="{{route('notesView')}}">Your Notes</a>--}}
        {{--<a href="{{route('notes_index')}}">Notes</a>--}}
        {{--<a href="{{route('tutorsView')}}">Tutors</a>--}}
        {{--<div class="fb-share-button" data-href="http://www.ideaspakistan.gov.pk/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.ideaspakistan.gov.pk%2F&amp;src=sdkpreparse">Share</a></div>--}}
        {{--<button data-id = "{{ Auth::user()->id }}" class="fb-click" >share</button>--}}
        {{--@endif--}}

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <script>
            $('.fb-click').on('click',function(){
                var url = "http://www.facebook.com/sharer/sharer.php?u=http://110.37.221.34:7777/jumpnotes/rod/&title=testing POST";
                var id = $('.fb-click').attr('data-id');
                var openDialog = function(uri, name, options, closeCallback) {
                    var win = window.open(uri, name, options);
                    var interval = window.setInterval(function() {
                        try {
                            if (win == null || win.closed) {
                                window.clearInterval(interval);
                                var url = "social_shared/"+id;
                                $.get(url,function(data){
//                data = $.parseJSON(data);
//                            location.reload();
                                })
                                closeCallback(win);
                            }
                            else if(win != null && win.closed){
                                alert("this is it");
                            }
                        }
                        catch (e) {
                            alert('something went wrong');
                        }
                    }, 1000);
                    console.log(win);
                    return win;
                };

                openDialog(url,'Facebook','width=640,height=580', function(){
                    jQuery("#div_share").hide();
                    jQuery("#formulario").show();
                });
            });
        </script>

        {{--<script>--}}
        {{--window.fbAsyncInit = function() {--}}
        {{--FB.init({--}}
        {{--appId      : '261238447677693',--}}
        {{--xfbml      : true,--}}
        {{--version    : 'v2.9'--}}
        {{--});--}}
        {{--FB.ui({--}}
        {{--method: 'feed',--}}
        {{--name: 'Facebook Dialogs',--}}
        {{--link: 'http://www.ideaspakistan.gov.pk/',--}}
        {{--caption: document.title,--}}
        {{--description: 'Some custom text here'--}}
        {{--},--}}
        {{--function(response) {--}}
        {{--if (response && response.post_id) {--}}
        {{--alert('Post was published.');--}}
        {{--} else {--}}
        {{--alert('Post was not published.');--}}
        {{--}--}}
        {{--}),--}}
        {{--FB.AppEvents.logPageView();--}}
        {{--};--}}

        {{--(function(d, s, id){--}}
        {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
        {{--if (d.getElementById(id)) {return;}--}}
        {{--js = d.createElement(s); js.id = id;--}}
        {{--js.src = "//connect.facebook.net/en_US/sdk.js";--}}
        {{--fjs.parentNode.insertBefore(js, fjs);--}}
        {{--}(document, 'script', 'facebook-jssdk'));--}}

        {{--$(document).ready(function(){--}}
        {{--$('.fb-share-button').on('click',function(e){--}}
        {{--e.preventDefault();--}}
        {{--alert('i am in');--}}
        {{--FB.init({--}}
        {{--appId      : '261238447677693',--}}
        {{--xfbml      : true,--}}
        {{--version    : 'v2.9'--}}
        {{--});--}}
        {{--FB.ui({--}}
        {{--method: 'feed',--}}
        {{--name: 'Facebook Dialogs',--}}
        {{--link: 'http://www.ideaspakistan.gov.pk/',--}}
        {{--caption: document.title,--}}
        {{--description: 'Some custom text here'--}}
        {{--},--}}
        {{--function(response) {--}}
        {{--if (response && response.post_id) {--}}
        {{--alert('Post was published.');--}}
        {{--} else {--}}
        {{--alert('Post was not published.');--}}
        {{--}--}}
        {{--FB.AppEvents.logPageView();--}}
        {{--})--}}
        {{--});--}}
        {{--});--}}
        {{--</script>--}}
        <script>
            //    $(document).ready(function(){
            //        (function(d, s, id){
            //            var js, fjs = d.getElementsByTagName(s)[0];
            //            if (d.getElementById(id)) {return;}
            //            js = d.createElement(s); js.id = id;
            //            js.src = "//connect.facebook.net/en_US/sdk.js";
            //            fjs.parentNode.insertBefore(js, fjs);
            //        }(document, 'script', 'facebook-jssdk'));
            //
            //    $('.fb-click').on('click',function(e){
            //        e.preventDefault();
            //        var url = "http://www.facebook.com/sharer/sharer.php?u=http://www.ideaspakistan.gov.pk/&title=testing POST";
            //    window.fbAsyncInit = function() {
            //        FB.init({
            //            appId: '260821971052674',
            //            xfbml: true,
            //            version: 'v2.9'
            //        });
            //        FB.AppEvents.logPageView();
            //    };
            //
            //           FB.ui(
            //            {
            //                method: 'feed',
            //                name: 'Facebook Dialogs',
            //                link: url,
            //                picture: 'http://fbrell.com/f8.jpg',
            //                caption: 'Reference Documentation',
            //                description: 'Dialogs provide a simple, consistent interface for applications to interface with users.'
            //            },
            //            function(response) {
            //                if (response && response.post_id) {
            //                    alert('Post was published.');
            //                } else {
            //                    alert('Post was not published.');
            //                }
            //            }
            //        );
            //
            //
            //    });
            //    });

        </script>

        <!-- Toaster Alert Files -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{--<script>--}}
    {{--window.fbAsyncInit = function () {--}}
    {{--FB.init({--}}
    {{--appId: '260821971052674',--}}
    {{--status: true,--}}
    {{--cookie: true,--}}
    {{--xfbml: true,--}}
    {{--oauth: true--}}
    {{--});--}}

    {{--$('.fb-click').click(function () {--}}
    {{--FB.ui({--}}
    {{--method: 'feed',--}}
    {{--link: document.URL,--}}
    {{--//                caption: 'example',--}}
    {{--}, function (response) {--}}
    {{--if (response === null) {--}}
    {{--console.log('post was not shared');--}}
    {{--} else {--}}
    {{--console.log('post was shared');--}}
    {{--}--}}
    {{--});--}}
    {{--});--}}
    {{--};--}}

    {{--(function (d, s, id) {--}}
    {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
    {{--if (d.getElementById(id)) return;--}}
    {{--js = d.createElement(s); js.id = id;--}}
    {{--js.async = true;--}}
    {{--js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";--}}
    {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));--}}
    {{--</script>--}}
@endsection