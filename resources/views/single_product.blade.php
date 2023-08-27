@extends('layouts.main')

@section('content')

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
				@foreach($product_array as $product)
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/menu-2.jpg" class="image-popup"><img src="{{asset('images/'.$product->image)}}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$product->name}}</h3>

    				<p class="price"><span class="price-dc"><s>Rs.{{$product->price}}</s></span> <span class="price-sale">Rs.{{$product->salePrice}}</span></p>

    				<p>{!! nl2br(e($product->description)) !!}</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select>
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
						<input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="{{$product->quantity}}">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;">{{$product->quantity}} glasses left</p>
	          	</div>
          	</div>
          	<p><a href="cart.html" class="btn btn-black py-3 px-5">Add to Cart</a></p>
    			</div>
				@endforeach
    		</div>
    	</div>
    </section>

	<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quantityInput = document.getElementById('quantity');
        var minusButton = document.querySelector('.quantity-left-minus');
        var plusButton = document.querySelector('.quantity-right-plus');

        minusButton.addEventListener('click', function() {
            if (quantityInput.value > 1) {
                quantityInput.value--;
            }
        });

        plusButton.addEventListener('click', function() {
            if (quantityInput.value < {{$product->quantity}}) {
                quantityInput.value++;
            }
        });

        quantityInput.addEventListener('change', function() {
            if (quantityInput.value < 1) {
                quantityInput.value = 1;
            } else if (quantityInput.value > {{$product->quantity}}) {
                quantityInput.value = {{$product->quantity}};
            }
        });
    });
</script>

@endsection