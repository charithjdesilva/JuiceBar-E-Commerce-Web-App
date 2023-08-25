@extends('layouts.main')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
	<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7);"></div>      
	<div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread text-white">Collection Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">

						@foreach($products as $product)
		    			<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate" onclick="window.location='{{ route('single_product', ['id' => $product->id]) }}'; return false;">
		    				<div class="product">
		    					<a href="#" class="img-prod"><img class="img-fluid" src="{{asset('images/'.$product->image)}}" alt="Colorlib Template">
								<span class="status">{{round(($product->price - $product->salePrice)/$product->price*100, 2)}}% Off</span>
		    						<div class="overlay"></div>
		    					</a>
		    					<div class="text py-3 px-3">
		    						<h3><a href="{{ route('single_product', ['id' => $product->id]) }}">{{$product->name}}</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span class="mr-2 price-dc">Rs. {{$product->price}}</span><span class="price-sale">@if($product->salePrice){{$product->salePrice}}@else{{$product->price}}@endif</span></p>
				    					</div>
				    					<!-- <div class="rating">
			    							<p class="text-right">
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    							</p>
			    						</div> -->
			    					</div>
			    					<p class="bottom-area d-flex px-3">
		    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
		    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
						@endforeach

		    		</div>
					
		    		<div class="row mt-5">
						<div class="col text-center">
							<div class="block-27">
							<ul>
								<li><a href="#">&lt;</a></li>
								<li class="active"><span>1</span></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&gt;</a></li>
							</ul>
							</div>
						</div>
		        	</div>
		    	</div>
    		</div>
    	</div>
    </section>

@endsection