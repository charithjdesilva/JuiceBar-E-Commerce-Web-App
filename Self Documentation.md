
# Juice Bar E-commerce Web Application

## Folder/file Structure

MVC architecture
- Model = Data
- View = What is displayed to user
- Controller = Intermediary between the model and the view

bootstrap folder is needed to initiate the project.

public contatins the css and the js.

resources contains the ``views``

routes contain the **links** that let the user to go specifi pages.
Web ``php`` file is used to manage the routes of the application.

Storage folder is for anything we want to upload.

Test folder for running unit tests.

composer.json contains the version of the packages use in this project.

.env contains all the enviornment variables.
Application name, database configuration are in ``.env`` file.

---

## Running the Project

To Run this project type the following command in the terminal.

```
php artisan serve
```

---
### Adding and Setting views for the Project

Add the view to the ``resources/views`` directory with the extension ``.blade.php``

Then add that ``view``'s name without the extention to the ``web.php`` in the routes directory.

---
## Creating the Page Strucure of the Web Application


Page Strucure is divided into 3 sections. We create a folder called ``layout`` for this. 

- Header (will be same for all pages)
- Content
- Footer (will be same for all pages)

First create the ``heder.blade.php`` and ``footer.blade.php``.

Create the main page. (main.blade.php)

Import the heder and footer to the ``main.blade.php`` . To achieve this use the following line.

```
@include('layouts.header')
```

@include('name of the file'). It is inside the layouts folder. 

In between the header and the footer we can inject the content using following line.

```
@yield('content')
```

@yield('name of the thing we want to inject')


### Injecting contents to the 'content' defined as @yield('content')

In the ``index.blade.php`` we add the following line.

```
@extends('layouts.main')
```

(We are extending the main.blade.php file because we want to use it. And then we are )

To inject the content to the 'content' defined as @yield('content')

```
@section('content')

<h1>Html codes we want to inject</h1>

@endsection
```

Change the route of '/' to view 'index' instead of view 'welcome'

## Make references to the css and js files in the public

Use {{ asset( ) }} and parse in the css/js file location in the public folder as parameter.

example:
```
<img src="{{ asset('images/img.png') }}" />
```

## Connect to the Database

Configurations are on the .env file. (host, database name, username, password)
Create a new database and change the database name in the ``.env``

example: ``juicebar``

### Use migation to create tables

Run the command ``php artisan make:migration create_``*tableName*_``table``

example:
```
php artisan make:migration create_products_table
```

After running the above command a new file will be created on the database/migartions folder.

Now in the created CreateProductsTable file specify the columns of the database table.

example:
If we want to add a column named "name" we can add it as ```$table->String('name');```

For a nullable column
```$table->String('description')->nullable();```

```$table->decimal('price', 8,2);``` // max price 999999.00

```
$table->decimal('salePrice', 8,2)->nullable();
```
```
$table->int('quantity');
```

With this migation way we can create the tables we need.

example: 
```
php artisan make:migration create_orders_table
```

These tables are in project. But not yet on the database. To migrate it to the database run the following command.

```
php artisan migrate
```

### Create a new Controller

Make sure that the controller name's first letter is in uppercase.
```
php artisan make:controller JuicebarController
```

New controller will be created in the Http/Controllers folder.
Add functions to deal with the DB to the controller.

Import the DB class.

```
use Illuminate\Support\Facades\DB;
```

example:
```
    function index(){
        $products = DB::table('products')->get();
        return view('index', ['products'=>$products]);
    }

    function product(){
        $products = DB::table('products')->get();
        return view('index', ['products'=>$products]);
    }
}
```

Controller should be imported to routes/web.php

```
use App\Http\Controllers\JuicebarController;
```

Then, add the following routes instead of the default route.

```
Route::get('/index', [JuicebarController::class, 'index'])->name('home');
Route::get('/products', [JuicebarController::class, 'products'])->name('products');

```

## Displaying products

### Adding a foreach loop to display products

```
@foreach($products as $product)
		    			<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
		    				<div class="product">
		    					<a href="#" class="img-prod"><img class="img-fluid" src="{{asset('images'.$product->image)}}" alt="Colorlib Template">
		    						<span class="status">30%</span>
		    						<div class="overlay"></div>
		    					</a>
		    					<div class="text py-3 px-3">
		    						<h3><a href="#">{{$product->name}}</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span class="mr-2 price-dc">{{$product->price}}</span><span class="price-sale">@if($product->salePrice){{$product->salePrice}}@else{{$product->price}}@endif</span></p>
				    					</div>
				    					<div class="rating">
			    							<p class="text-right">
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    							</p>
			    						</div>
			    					</div>
			    					<p class="bottom-area d-flex px-3">
		    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
		    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
						@endforeach
```

Linking product title to a single product.

```
<h3><a href="{{route('single_product', ['id'=>$product->id] )}}">{{$product->name}}</a></h3>
```

Create the single product route in the **web.php**

Add single_product controller to web.php

```Route::get('/single_product/{id}', [JuicebarController::class, 'single_product'])->name('single_product');```

Create the function **single_product** in the **JuicebarController**.

```
public function single_product(Request $request, $id){
        $product_array = DB::table('products')->where('id', $id)->get();
        return view('single_product', ['product_array'=>product_array]);
    }
```

## Creating the Cart Page

### Cart view

First, create cart.blade.php in the views.

Add, the layout.
```
@extends('layout.main')
@section('content')
	//HTML section for cart
@endsection
```

Create the HTML section in between cart.

### CartController

Create using the following command.

```
php artisan make:controller CartController
```

Create the route for the Cart in the ```web.php```

```
use App\Http\Controllers\CartController;


Route::get('/cart', [CartController::class, 'cart'])->name('cart');
```

Create the function in the ``CartController`` which returns the view ``cart``

```
  // returns the view cart
    public function cart(){
        return view('cart');
    }
```

## Adding items to cart

We need to add items to the cart upon a click of "Add to cart" button. To do this we are implementing a form in the ``product.blade.php``.

Here, we are adding a 1 as default quantity, they can later increase it from the cart.
@csrf added to protect the form from hackers. (It is a security best practice.)

```
<form class="bottom-area d-flex px-3" id="form_Cart" method="POST" action="{{route('add_to_cart')}}">
	@csrf
	<a href="#" class="add-to-cart text-center py-2 mr-1" id="submit_Form_Cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
	<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>

	<input type="hidden" name="id" value="{{$product->id}}" />
	<input type="hidden" name="name" value="{{$product->name}}" />
	<input type="hidden" name="price" value="{{$product->price}}" />
	<input type="hidden" name="salePrice" value="{{$product->salePrice}}" />
	<input type="hidden" name="quantity" value="1" />
	<input type="hidden" name="image" value="{{$product->image}}" />
</form>
```

### Create the add_to_cart route in the web.php

Only allowing user to add to cart using POST method. Not allowing the GET method. In such case user will be redirected to the index page (home).

```
Route::post('/add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/add_to_cart', function(){
    return redirect('/');
});
```

### Create the add_to_cart function in the CartController

```
// add item to cart
public function add_to_cart(Request $request){
	// if we have a cart in session
	if($request->session()->has('cart')){

		// check whether the product is already in the cart or not

		// to do that first get the cart, this will have an associative_array, key will be the id, value will be the product
		$cart = $request->session()->get('cart');   // ['6' => [6's information], '8' => [8's information]]

		// get the product_id s to an array, which are already in the cart
		// we are using the array_column(input, column_key) function to check whether the id exist in the cart or not
		$product_array_ids = array_column($cart, 'id'); // [12, 5, 15]

		// get the product id from the submited form in the front-end form_Cart in product.blade.php
		$id = $request->input('id');    // get the id of the product from the front-end form_Cart in product.blade.php

		// check if product not in the array, then add the product to cart
		if(!in_array($id, $product_array_ids)){
			// get details of the product from the form
			$name = $request->input('name');
			$image = $request->input('image');
			$price = $request->input('price');
			$quantity = $request->input('quantity');
			$salePrice = $request->input('salePrice');

			// we need to check whether there is a sale or not on this product, before adding the product to cart
			if($salePrice != null){
				$price_to_charge = $salePrice;
			}
			else{
				$price_to_charge = $price;
			}

			// add the product to the card
			$product_array = array(
				'id' => $id,
				'name' => $name,
				'image' => $image,
				'price' => $price_to_charge,
				'quantity' => $quantity,
			);

			$cart[$id] = $product_array;
			$request->session()->put('cart', $cart);  //put the cart in the session
		}

		// else tell the user the product is already in the cart
		else{
			echo "<script>alert('Product is already in the cart!');</script>";
		}
	}

	// if we don't have a cart in session
	else{
		// create an array called cart
		$cart = array();

		// since this will be the first product to the cart, we don't need to check anything
		// get details of the product from the form
		$id = $request->input('id');
		$name = $request->input('name');
		$image = $request->input('image');
		$price = $request->input('price');
		$quantity = $request->input('quantity');
		$salePrice = $request->input('salePrice');

		// we need to check whether there is a sale or not on this product, before adding the product to cart
		if($salePrice != null){
			$price_to_charge = $salePrice;
		}
		else{
			$price_to_charge = $price;
		}

		// add the product to the card
		$product_array = array(
			'id' => $id,
			'name' => $name,
			'image' => $image,
			'price' => $price_to_charge,
			'quantity' => $quantity,
		);

		$cart[$id] = $product_array;
		$request->session()->put('cart', $cart);  //put the cart in the session
	}

	return view('cart');
}
```

### Access the product from the cart view	(cart.blade.php)

First we check if the session has a cart, and if it does then we loop over through each product in the cart.

```
@if(Session::has('cart'))
    @foreach(Session::get('cart') as $product)

	// statements

	@endforeach
@endif
```

### Calculate total for the cart

```
function calculateTotalCart(Request $request){
	$cart = $request->session()->get('cart');
	$total_price = 0;
	$total_quantity = 0;

	foreach($cart as $id => $product){
		$product = cart['id'];

		$price = $product['price'];
		$quantity = $product['quantity'];

		$total_price = $total_price + ($price * $quantity);
		$total_quantity = $total_quantity + $quantity;

	}

	$request->session()->put('total', $total_price);
	$request->session()->put('quantity', $total_quantity);
}
```

Add the calculateTotalCart() to the add_to_cart() function. So, when an item added it will be calculated again.

Next, display the total in the cart.blade.php

- First check wheter there is a total or not.
- If there is then, display it.


### Create the remove button

We are using a form to make the remove button work. 

```
<td class="product-remove">
	<form method="POST" action="remove_from_cart">
		@csrf
		<input type="hidden" name="id" value="{{ $product['id'] }}"  />
		<a href="#" class="submit-form"><span class="ion-ios-close"></span></a>
	</form>
</td>
```

Create the route in the web.php

```
Route::post('/remove_from_cart', [CartController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::get('/remove_from_cart', function(){
    return redirect('/');
});
```

Next create remove_from_cart function in the CartController

```
function remove_from_cart(Request $request){
	
	// get the cart
	//before getting the cart we need to check if it exists or not
	if($request->session()->has('cart')){
		// in-order to remove a item we need to get the id
		$id = $request->input('id');
		
		// get the cart
		$cart = $request->session()->get('cart');

		//remove the product from the cart
		unset($cart[$id]);

		// update the session cart
		$request->session()->put('cart', $cart);

		// Now products in the cart updated, we have to recalculate the total
		$this->calculateTotalCart($request);
	}
	return view('cart');
}
```

### Increment/decrement the quantity

We are also using a form here. And two input buttons. We are getting the id of the product as well.

```
<td class="quantity">
	<div class="input-group mb-3">
		<form method="POST" action="{{ route('edit_product_quanity') }}">
			@csrf
			<div class="input-group-prepend">
				<button class="quantity-minus input-group-text px-3" name="decrease_quantity_btn" type="button">-</button>
			</div>
			<input type="hidden" name="id" value="{{ $product['id'] }}" />
			<input type="text" name="quantity" class="quantity form-control input-number" value="{{$product['quantity']}}" min="1" max="100" readonly />
			<div class="input-group-append">
				<button class="quantity-plus input-group-text px-3" name="increase_quantity_btn" type="button">+</button>
			</div>
		</form>
	</div>
</td>
```

Create the ``route('edit_product_quanity')`` in web.

```
Route::post('/edit_product_quanity', [CartController::class, 'edit_product_quanity'])->name('edit_product_quanity');
Route::get('/edit_product_quanity', function(){
    return redirect('/');
});
```

## Create the Checkout

### Create the checkout button

Add the checkout route by creating a form for the checkout button in ``cart.blade.php``
User should not be able to checkout unless there is total price in the cart.
	- check whether there is a total
	- check if it is not null

```
 @if(Session::has('total'))
	@if(Session::get('total') != null)
		<form method="GET" action="{{ route('checkout') }}">
			<p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
		</form>
	@endif
@endif
```

### Create the route('checkout')

```
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
```

### Create checkout function in the CartController

```
function checkout(){
	return view('checkout');
}
```

### Create the checkout view

@extends('layouts.main')

@section('content')

	//checkout view section

@endsection

### Create the form to chcekout

```
<form method="POST" id="checkout-form" action="{{ route('order') }}" class="billing-form">
```

### Create the routte for 'place_order'

```
Route::post('/place_order', [CartController::class, 'place_order'])->name('place_order');
```

### Create the 'place_order' function in the CartController

We want to know the posted form data.
We want to know the cart of the user.


```
use Illuminate\Support\Facades\DB;   // import the DB


function place_order(Request $request){
	// we need to make sure that the cart is not empty
	if($request->session()->has('cart')){
		$name = $request->input('name');
		$email = $request->input('email');
		$phone = $request->input('phone');
		$city = $request->input('city');
		$address = $request->input('address');

		// get the cost from the session
		$cost = $request->session()->get('total');

		// get status whether user paid or not
		$status = "Not paid";

		// we need to store the date, store the year, month, day
		$date = date('Y-m-d');

		// get products from the cart
		$cart = $request->session()->get('cart');

		// insert the order into the database, inorder to place a order, in this InsertGetId() return the orderId
		$order_id =  DB::table('orders')->InsertGetId([
						'name' => $name,
						'email' => $email,
						'phone' => $phone,
						'city' => $city,
						'address' => $address,
						'cost' => $cost,
						'status' => $status,
						'date' => $date
					], 'id');   // get the id assigned to this record in the database
	}
	// else we redirect
	else{
		return redirect('/');
	}
}
```

Also add this to the above function. To add the order item to the order_item table.

```
// get all the products from the cart, since it is an array we need to use a foreach loop
foreach($cart as $id => $product){

	$product = $cart[$id];
	$product_id = $product['id'];
	$product_name = $product['name'];
	$product_price = $product['price'];
	$product_quantity = $product['quantity'];
	$product_image = $product['image'];

	// insert the data to the database table order_items
	DB::table('order_items')->insert([
		'order_id' => $order_id,
		'product_id' => $product_id,
		'product_name' => $product_name,
		'product_price' => $product_price,
		'product_quanity' => $product_quanity,
		'product_image' => $product_image,
		'order_date' => $date
	]);
}
```


Add the order_id into the session, for the payment.
```
$request->session()->put('order_id', $order_id);

return view('payment');
```

## Creating the Payament page

Make PayamentController

```
php artisan make:controller PaymentController
```

It will create the PaymentController in the ``Http/Controllers``.

Create the function for returning view ``payment``

Create the route for the function in the ``web.php``

Display the billing address if cart has a total and it is not null. Also Session should has a order_id and it should not be null.

```
@if(Session::has('total') && Session::get('total') != null)
    @if(Session::has('order_id') && Session::get('order_id') != null)
// Form

	@endif
@endif
```