@extends('layouts.main')

@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7);"></div>      
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread text-white">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    @if(Session::has('total') && Session::get('total') != null)
    @if(Session::has('order_id') && Session::get('order_id') != null)
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 ftco-animate">
                <form method="POST" id="checkout-form" action="{{ route('place_order') }}" class="billing-form">
                    @csrf
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" placeholder="" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" placeholder="" name="city">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-end">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" placeholder="" name="address">
                            </div>
                        </div>
                    </div>
                
                <div class="row mt-5 pt-3 d-flex">
                    <div class="col-md-12 d-flex">
                        <div class="cart-detail cart-total bg-light p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <div class="d-flex">
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>Rs.{{Session::get('total')}}.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 d-flex">
                    <div class="col-md-12 d-flex">
                        <p class="text-center">
                        <a href="#" class="btn btn-primary py-3 px-4" id="place-order-button" onclick="submitForm()">Place an order</a>
                        </p>
                    </div>
                </div>
                </form><!-- END -->
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section> <!-- .section -->
@endif
@endif

<script>
    function submitForm() {
        document.getElementById('checkout-form').submit();
    }
</script>

@endsection
