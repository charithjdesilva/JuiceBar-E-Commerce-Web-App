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
		    			<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
		    				<div class="product">
		    					<a href="#" class="img-prod"><img class="img-fluid" src="{{asset('images/'.$product->image)}}" alt="Colorlib Template">
								<span class="status">{{round(($product->price - $product->salePrice)/$product->price*100, 2)}}% Off</span>
		    						<div class="overlay"></div>
		    					</a>
		    					<div class="text py-3 px-3">
		    						<h3 onclick="window.location='{{ route('single_product', ['id' => $product->id]) }}'; return false;"><a href="{{ route('single_product', ['id' => $product->id]) }}">{{$product->name}}</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span class="mr-2 price-dc">Rs. {{$product->price}}</span><span class="price-sale">@if($product->salePrice){{$product->salePrice}}@else{{$product->price}}@endif</span></p>
				    					</div>
			    					</div>
			    					<form class="bottom-area d-flex px-3" id="form_Cart" method="POST" action="{{route('add_to_cart')}}">
										@csrf
										<a href="#" class="add-to-cart text-center py-2 mr-1 submit-form-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
		    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>

										<input type="hidden" name="id" value="{{$product->id}}" />
										<input type="hidden" name="name" value="{{$product->name}}" />
										<input type="hidden" name="price" value="{{$product->price}}" />
										<input type="hidden" name="salePrice" value="{{$product->salePrice}}" />
										<input type="hidden" name="quantity" value="1" />
										<input type="hidden" name="image" value="{{$product->image}}" />
									</form>
		    					</div>
		    				</div>
		    			</div>
						@endforeach

		    		</div>
					
		    		<div class="row mt-5 justify-content-center  ftco-animate">
						<div class="col text-center">
							<ul class="pagination justify-content-center">
								{{ $products->links('pagination::bootstrap-4') }}
							</ul>
							<style>
								.pagination .page-item.active .page-link {
									background-color: #343a40; /* Bootstrap's bg-dark color */
									color: #ffffff; /* Bootstrap's text-white color */
									border-color: #000000;
								}
								.pagination .page-item .page-link {
									background-color: #000000; /* Bootstrap's bg-dark color */
									color: #ffffff; /* Bootstrap's text-white color */
								}
								.pagination .page-item.active .page-link:hover {
									background-color: #343a40; /* Bootstrap's bg-dark color */
									color: #ffffff; /* Bootstrap's text-white color */
								}
								.pagination .page-item .page-link:hover {
									background-color: #FFA45C; /* Bootstrap's bg-dark color */
									color: #ffffff; /* Bootstrap's text-white color */
								}
							</style>
						</div>
		        	</div>
		    	</div>
    		</div>
    	</div>
    </section>

	<script>
		const submitButtons = document.querySelectorAll(".submit-form-cart");

		submitButtons.forEach(button => {
			button.addEventListener("click", function(event) {
				event.preventDefault(); // Prevent the default anchor behavior
				const form = this.closest("form"); // Find the parent form element
				if (form) {
					form.submit(); // Submit the form
				}
			});
		});
	</script>

@endsection