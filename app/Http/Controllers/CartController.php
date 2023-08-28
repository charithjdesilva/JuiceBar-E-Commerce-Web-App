<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;   // import the DB

class CartController extends Controller
{
    // returns the view cart
    public function cart(){
        return view('cart');
    }

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

            // check if product not in the cart array, then add the product to cart
            if(!array_key_exists($id, $cart)){
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
            $this->calculateTotalCart($request);
            return view('cart');
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
            $this->calculateTotalCart($request);
            return view('cart');
        }
    }

    function calculateTotalCart(Request $request){
        $cart = $request->session()->get('cart');
        $total_price = 0;
        $total_quantity = 0;

        foreach($cart as $id => $product){
            $product = $cart[$id];

            $price = $product['price'];
            $quantity = $product['quantity'];

            $total_price = $total_price + ($price * $quantity);
            $total_quantity = $total_quantity + $quantity;

        }

        $request->session()->put('total', $total_price);
        $request->session()->put('quantity', $total_quantity);
    }

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

    function edit_product_quanity(Request $request){
        // check wheter if we have a cart or not
        if($request->session()->has('cart')){

            //get product id
            $product_id = $request->input('id');

            //get quantity
            $product_quantity = $request->input('quantity');

            // check which button has been clicked + or -
                //if the request has decrease_quantity_btn, it means that decrease button has been clicked
            if($request->has('decrease_quantity_btn')){
                $product_quantity = $product_quantity - 1;
            }
                //if the request has decrease_quantity_btn, it means that increase button has been clicked
            else if($request->has('increase_quantity_btn')){
                $product_quantity = $product_quantity + 1;
            }

                //neither of the button has been clicked
            else{

            }

            if($product_quantity <=0){
                $this->remove_from_cart($request);
            }

            //access the cart
            $cart = $request->session()->get('cart');

            // access the paticular product in the cart
            // to do that, first we have to check whether it is in the cart or not
            if(array_key_exists($product_id, $cart)){
                $cart[$product_id]['quantity'] = $product_quantity;

                //put the new value of the cart, back to the session
                $request->session()->put('cart',$cart);
                
                //total will be re-calculated
                $this->calculateTotalCart($request);
            }

            return view('cart');
        }
    }

    function checkout(){
        return view('checkout');
    }

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
            $status = "not paid";

            // we need to store the date, store the year, month, day
            $date = date('Y-m-d');

            // get products from the cart
            $cart = $request->session()->get('cart');

            // insert the order into the database, inorder to place a order, in this InsertGetId() return the orderId
            $order_id =  DB::table('orders')->InsertGetId([
                            'customerName' => $name,
                            'email' => $email,
                            'phone' => $phone,
                            'city' => $city,
                            'address' => $address,
                            'cost' => $cost,
                            'status' => $status,
                            'date' => $date
                        ], 'id');   // get the id assigned to this record in the database

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
                    'product_quantity' => $product_quantity,
                    'product_image' => $product_image,
                    'order_date' => $date
                ]);
            }

            // add the order_id into the session, for the payment
            $request->session()->put('order_id', $order_id);

            return view('payment');
        }
        // else we redirect
        else{
            return redirect('/');
        }
    }
}
