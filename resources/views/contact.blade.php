@extends('layouts.main')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
	<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7);"></div>      
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
			<h1 class="mb-0 bread text-white">Contact</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
    <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
            <p><span>Address:</span> No. 659, Devinigoda, Rathgama.</p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
            <p><span>Phone:</span> <a href="tel://1234567920">+94 71 064 2428</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
            <p><span>Email:</span> <a href="mailto:charithjdesilva@gmail.com">charithjdesilva@gmail.com</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
            <p><span>Website</span> <a href="https://charithjdesilva.netlify.app">charithjdesilva.netlify.app</a></p>
            </div>
        </div>
    </div>
    <div class="row block-9">
        <div class="col-md-12 order-md-last d-flex">
        <form action="#" class="bg-white p-5 contact-form">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Email">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
        </form>
        
        </div>
    </div>
    </div>
</section> 

@endsection