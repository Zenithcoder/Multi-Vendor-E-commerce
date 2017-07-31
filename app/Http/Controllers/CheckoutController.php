<?php

namespace App\Http\Controllers;

use App\Category;
use App\Products;
use App\Orders;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    //
//    public function step1()
//    {
//        $user = Auth::user();
//        $categories = Category::all();
//        if(Auth::check())
//        {
//            return view('frontend.shipping-info',compact('user','categories'));
//        }
//        return redirect('/signin');
//    }
    public function shipping()
    {
        $user = Auth::user();
        $categories = Category::all();
        $products = Products::all();
        if(Cart::count() >= 1)
        {
            return view('frontend.shipping-info',compact('user','categories'));
        } else{
            return view('cart.index',compact('user','categories'));
        }

    }
    public function payment()
    {
        if(Cart::count() >= 1) {
            $product = Products::all();
            $user = Auth::user();
            $categories = Category::all();
            return view('frontend.payment', compact('user', 'categories','product'));
        } else {
            return redirect()->route('cart.index');
        }
    }
    public function storePayment(Request $request)
    {
//       $carts = Cart::content();


        // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
       Stripe::setApiKey("sk_test_CAlUJdboGG5NPcnXYTg2tWpI");

// Token is created using Stripe.js or Checkout!
// Get the payment token submitted by the form:
// Charge the user's card:
        try{
           $charge = Charge::create(array(
                "amount" => cart::subTotal()*100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'),
                "description" => "Pako.com.ng charge"
            ));
            //        create the order
            $user = Auth::user();
            $vendor = Products::all();
            $order = $user->orders()->create([
                'total'=> $charge->amount/100,
                'delivered'=>0,
                'payment_id' => $charge->id,
                'vendor_id' => 0
            ]);


            $cartItems=Cart::content();
            foreach($cartItems as$cartItem)
            {
                $order->orderItems()->attach($cartItem->id,[
                    'qty'=>$cartItem->qty,
                    'total'=>$cartItem->qty*$cartItem->price
                ]);
            }

//            $order = new Orders();
//            $order->cart = serialize($item);
//            $order->name = $request->input('cardName');
//            $order->payment_id = $charge->id;
//            Auth::user()->orders()->save($order);
        } catch(\Exception $e) {

            return redirect()->route('checkout.payment')->with('error', $e->getMessage());
        }

        Session::forget('cart');

        return redirect()->route('frontend.collection')->with('success', 'Successfully purchased item!');


    }
}
