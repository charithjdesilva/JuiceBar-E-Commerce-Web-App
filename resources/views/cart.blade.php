@extends('layouts.main')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
	<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7);"></div>      
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
			<h1 class="mb-0 bread text-white">Cart</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
        <div class="col-md-12 ftco-animate">
            <div class="cart-list">
                <table class="table">
                    <thead class="thead-primary">
                        <tr class="text-center">
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Session::has('cart'))
                            @foreach(Session::get('cart') as $product)
                                <tr class="text-center">

                                <td class="product-remove">
                                    <form method="POST" action="remove_from_cart">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product['id'] }}"  />
                                        <a href="#" class="submit-form"><span class="ion-ios-close"></span></a>
                                    </form>
                                </td>
                                
                                <td class="image-prod">
                                    <div class="img" style="background-image:url('{{ asset('images/' . $product['image']) }}');"></div>
                                </td>
                                
                                <td class="product-name">
                                    <h3>{{$product['name']}}</h3>
                                </td>
                                
                                <td class="price">{{$product['price']}}</td>
                                
                                <td class="quantity">
                                    <form method="POST" action="{{ route('edit_product_quanity') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="quantity-minus input-group-text px-3" name="decrease_quantity_btn" type="submit">-</button>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $product['id'] }}" />
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="{{$product['quantity']}}" min="1" max="100" readonly />
                                            <div class="input-group-append">
                                                <button class="quantity-plus input-group-text px-3" name="increase_quantity_btn" type="submit">+</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                
                                <td class="total">{{$product['price'] * $product['quantity']}}.00</td>
                                </tr><!-- END TR-->
                            @endforeach
                        @endif
                    </tbody>
                    </table>
                </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
                <h3>Cart Totals</h3>
                @if(Session::has('cart'))
                    @if(Session::has('total'))
                        <!-- <p class="d-flex">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p> -->
                        
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>Rs. {{Session::get('total')}}.00</span>
                        </p>
                    @endif
                @endif
            </div>
            @if(Session::has('total'))
                @if(Session::get('total') != null)
                    <form method="GET" action="{{ route('checkout') }}">
                        <p class="text-center"><a href="#" class="btn btn-primary py-3 px-4" id="checkout-button">Proceed to Checkout</a></p>
                        <!-- Hidden submit button -->
                        <input type="submit" id="checkout-submit" style="display: none;">
                    </form>
                @endif
            @endif
        </div>
    </div>
    </div>
</section>

<script>
    const submitButtons = document.querySelectorAll(".submit-form");

    submitButtons.forEach(button => {
        button.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default anchor behavior
            const form = this.closest("form"); // Find the parent form element
            if (form) {
                form.submit(); // Submit the form
            }
        });
    });

        const quantityForms = document.querySelectorAll(".quantity-form");

    quantityForms.forEach(form => {
        const minusButton = form.querySelector(".quantity-minus");
        const plusButton = form.querySelector(".quantity-plus");

        minusButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default button behavior
            const inputField = form.querySelector(".quantity");
            inputField.value = parseInt(inputField.value) - 1;
            updateQuantity(form);
        });

        plusButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default button behavior
            const inputField = form.querySelector(".quantity");
            inputField.value = parseInt(inputField.value) + 1;
            updateQuantity(form);
        });
    });

    function updateQuantity(form) {
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update the cart or perform any necessary actions
                }
            }
        };
        
        xhr.open("POST", form.action, true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.send(formData);
    }

    const checkoutButton = document.getElementById('checkout-button');
    const checkoutSubmit = document.getElementById('checkout-submit');

    checkoutButton.addEventListener('click', function(event) {
        event.preventDefault();
        checkoutSubmit.click(); // Trigger form submission
    });
</script>

@endsection