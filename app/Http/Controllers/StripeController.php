<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($id)
    {
        $products =product::findorfail($id);
        return view('stripe',["products"=>$products]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request,$id)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $sales =$id;
        $product =product::findorfail($id);
        $sales=$product->price;

        Stripe\Charge::create ([
                "amount" => $sales* 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from tutsmake.com."
        ]);



        return redirect()->back()->with('success', 'Payment successful!');
    }
}
