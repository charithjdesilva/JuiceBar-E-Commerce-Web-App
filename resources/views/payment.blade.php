@extends('layouts.main')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
	<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7);"></div>      
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
			<h1 class="mb-0 bread text-white">Payment</h1>
			</div>
		</div>
	</div>
</div>


<h1>Payment</h1>
@if(Session::has('total') && Session::get('total') != null)
    @if(Session::has('order_id') && Session::get('order_id') != null)
        <div class="row mt-5 pt-3 d-flex">
            <div class="col-md-12 d-flex">
                <div class="cart-detail cart-total bg-light p-3 p-md-4">
                    <h3 class="billing-heading mb-4">Cart Total</h3>
                    <div class="d-flex">
                        <p class="d-flex total-price">
                            <span>Payament Total</span>
                            <span>Rs.{{ Session::get('total') }}.00</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif


@endsection