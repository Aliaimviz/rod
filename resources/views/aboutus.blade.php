@extends('masterlayout')
@section('content')

	
		<!-- / ABOUT BANNER  -->
	
<div class="container-fluid text-center banner-text abt-banner">
  <h3>ABOUT US</h3>
</div>

	<!-- / ABOUT TEXT BLOCK -->

<div class="meet-with abt-section">
<div class="container">

   <div class="about-text col-md-6">  
   <h1>voluptatem accusantium dolor</h1>
   <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem colector accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit amoter aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rempote aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
   
   <h4>Happy Studying!
     voluptas sit aspernatur !!!</h4>
   </div>
   <div class="about-img col-md-6">
   <img src="{{ asset('public/images/abt-col-img.jpg') }}" alt=""/>   
   </div>

</div>
</div>

<div class="team-block text-center">
<div class="container">
    <div class="heading">	
        <h2>OUR TEAM</h2>
        <h3>WHO WE ARE</h3>
    </div><!-- //end heading -->

	<div class="row">
        <div class="col-sm-4">
            <div class="team-members">
                <div class="team-avatar">
                    <img class="img-responsive" src="{{ asset('public/images/john.jpg') }}" alt="">
                </div>
                <div class="team-desc">
                    <h4>John Joseph</h4>
                    <span>(FOUNDER)</span>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantc pro dolore
					mique sed ut perspi unde omnis istenatus</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="team-members">
                <div class="team-avatar">
                    <img class="img-responsive" src="{{ asset('public/images/maria.jpg') }}" alt="">
                </div>
                <div class="team-desc">
                    <h4>maria dose</h4>
                    <span>(INTERN DESIGNER)</span>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantc pro dolore
					mique sed ut perspi unde omnis istenatus</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="team-members">
                <div class="team-avatar">
                    <img class="img-responsive" src="{{ asset('public/images/micheal.jpg') }}" alt="">
                </div>

                <div class="team-desc">
                    <h4>michael aleum</h4>
                    <span>(Onboarding Manager)</span>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantc pro dolore
					mique sed ut perspi unde omnis istenatus</p>
                </div>
            </div>
        </div>
    </div><!-- //end row -->
</div>
</div>

<!-- //TEAM BLOCK END -->



<div class="container client-testimonial">
	<div class="row">
		<h2>What our customer says</h2>
		<h3>Client Testimonials</h3>

	</div>
</div>
<div class="carousel-reviews broun-block caro-1">
    <div class="container">
        <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
            
                <div class="carousel-inner">
                    <div class="item active">
                	    <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        <p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel">
				                <img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
							<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">
        						<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
					            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel">
				               <img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
						     <p title="" href="#">Jhone, adisicing elit</p>		
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">			
    							<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
								<ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
								<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
                    </div>
                    <div class="item">
                        <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        	<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
							<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">			
        							<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
					            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
						      <p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">
    								<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
								<ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
								<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
                    </div>
                    <div class="item">
                        <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        <p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
								<p title="" href="#">Jhone, adisicing elit</p>			
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">
        						<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
					            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
						       <p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">
    							<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
								<ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
								<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
                    </div>                    
                </div>
                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>




<div class="carousel-reviews broun-block caro-2">
    <div class="container">
        <div class="row">
            <div id="carousel-reviews-2" class="carousel slide" data-ride="carousel-2">
            
                <div class="carousel-inner">
                    <div class="item active">
                	    <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        <p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel">
				                <img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
							<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">
        						<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
					            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel">
				               <img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
						     <p title="" href="#">Jhone, adisicing elit</p>		
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">			
    							<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
								<ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
								<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
                    </div>
                    <div class="item">
                        <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        	<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
							<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">			
        							<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
					            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
						      <p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">
    								<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
								<ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
								<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
                    </div>
                    <div class="item">
                        <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        <p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
								<p title="" href="#">Jhone, adisicing elit</p>			
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">
        						<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
					            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
						       <p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">
    							<p>voluptatem accusantium doloremque elit laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasiums architecto beatae vitae dicta sunt explictos abo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.</p>
								<ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel">
								<img src="{{ asset('public/images/tet-img.jpg') }}" alt=""/>
								<p title="" href="#">Jhone, adisicing elit</p>	
							</div>
						</div>
                    </div>                    
                </div>
                <a class="left carousel-control" href="#carousel-reviews-2" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-reviews-2" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>



				<!-- client testimonials end  BLOCK -->

@endsection