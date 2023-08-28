@extends('layouts.main')

@section('content')
<section id="home-section" class="hero">
		  <div class="home-slider js-fullheight owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third order-md-last img js-fullheight" style="background-image:url(images/bg_1.jpg);">
	          	</div>
		          <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">Fresh Juice Delights</span>
		          		<div class="horizontal">
		          			<h3 class="vr" style="background-image: url(images/divider.jpg);">Rejuvenate with Our Juices</h3>
							<h1 class="mb-4 mt-3">Experience Nature's <span>Refreshing</span> Elixir</h1>
				            <p>Immerse yourself in the captivating essence of our handcrafted juices, sourced from the finest fruits and ingredients. A revitalizing journey that awakens your senses and fuels your well-being.</p>
				            
				            <p><a href="{{ route('products') }}" class="btn btn-primary px-5 py-3 mt-3">Discover Now</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third order-md-last img js-fullheight" style="background-image:url(images/bg_2.jpg);">
	          	</div>
		          <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">Delicious Juice Creations</span>
		          		<div class="horizontal">
		          			<h3 class="vr" style="background-image: url(images/divider.jpg);">A Flavorful Journey Awaits</h3>
							<h1 class="mb-4 mt-3">Savor the <span>Essence</span> of Health</h1>
							<p>Indulge in our diverse selection of handcrafted juices, each brimming with vibrant flavors and nourishing goodness. Elevate your senses and embrace the art of well-being with every sip.</p>
				            
				            <p><a href="{{ route('products') }}" class="btn btn-primary px-5 py-3 mt-3">Explore Menu</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
						<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
							<span class="icon-play"></span>
						</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">Discover the Juicy Path</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
							<p>Embark on a sensory journey with us, where the vibrant hues of nature meet the refreshing essence of fruits. Our Juice Bar is more than just a place; it's an experience that revitalizes your body and soul.</p>
							<div class="row ftco-services">
			          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services">
			              <div class="icon d-flex justify-content-center align-items-center mb-4">
			            		<span class="flaticon-002-recommended"></span>
			              </div>
			              <div class="media-body">
			                <h3 class="heading">Revive Policy</h3>
			                <p>Explore our commitment to freshness and satisfaction. Our refund policy ensures your delight in every sip.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services">
			              <div class="icon d-flex justify-content-center align-items-center mb-4">
			            		<span class="flaticon-001-box"></span>
			              </div>
			              <div class="media-body">
			                <h3 class="heading">Premium Blends</h3>
			                <p>Indulge in our premium packaging that mirrors the quality and freshness of the wholesome ingredients within.</p>
			              </div>
			            </div>    
			          </div>
			          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services">
			              <div class="icon d-flex justify-content-center align-items-center mb-4">
			            		<span class="flaticon-003-medal"></span>
			              </div>
			              <div class="media-body">
			                <h3 class="heading">Unrivaled Taste</h3>
			                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
			              </div>
			            </div>      
			          </div>
			        </div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row">
				<div class="col-md-8 d-flex align-items-stretch">
					<div class="img" style="background-image: url(images/about-1.jpg);"></div>
				</div>
				<div class="col-md-4 py-md-5 ftco-animate">
					<div class="text py-3 py-md-5">
						<h2 class="mb-4">New Juice Flavors for Summer</h2>
						<p>Discover our refreshing and delicious new juice flavors specially crafted for the summer season. Made from the freshest fruits and ingredients, our juices are the perfect way to stay hydrated and healthy.</p>
						<p><a href="#" class="btn btn-white px-4 py-3">Explore Flavors</a></p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 order-md-last d-flex align-items-stretch">
					<div class="img img-2" style="background-image: url(images/about-2.jpg);"></div>
				</div>
				<div class="col-md-7 py-3 py-md-5 ftco-animate">
					<div class="text text-2 py-md-5">
						<h2 class="mb-4">Boost Your Health with Fresh Juices</h2>
						<p>Experience the goodness of natural ingredients with our handcrafted juices. Packed with vitamins, minerals, and antioxidants, our juices help you boost your immune system and stay energized.</p>
						<p><a href="#" class="btn btn-white px-4 py-3">Order Now</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
    	<div class="container">
    		<div class="row justify-content-center py-5">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10000">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="1000">0</strong>
		                <span>Partner</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Awards</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <h2 class="mb-4">Our Satisfied Customers Say</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat the item structure for other testimonials -->
                    <div class="item">
                        <!-- Testimonial content for the second customer -->
                    </div>
                    <div class="item">
                        <!-- Testimonial content for the third customer -->
                    </div>
                    <div class="item">
                        <!-- Testimonial content for the fourth customer -->
                    </div>
                    <div class="item">
                        <!-- Testimonial content for the fifth customer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

		<hr>

		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection