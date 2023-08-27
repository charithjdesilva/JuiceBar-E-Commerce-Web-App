
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

We need to 