<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Cart;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $city;
    public $state;
    public $country;
    public $zipcode;

    public $paymentmode;

    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'line1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required'
        ]);
    }

    public function placeOrder(Request $request)
    {

        $order = new Order();
        $order->user_id = Auth::user()->id();
        $order->subtotal = Cart::subtotal();
        $order->discount = 0;
        $order->tax = 0;
        $order->total = Cart::subtotal();
        $order->firstname = $request->input('firstname');
        $order->lastname = $request->input('lastname');
        $order->email = $request->input('email');
        $order->mobile = $request->input('mobile');
        $order->line1 = $request->input('line1');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->zipcode = $request->input('zipcode');
        $order->status = 'ordered';
        $order->is_shipping_different = 'false';
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        $shipping = new Shipping();
        $shipping->order_id = $order->id;
        $shipping->firstname = $this->firstname;
        $shipping->lastname = $this->lastname;
        $shipping->email = $this->email;
        $shipping->mobile = $this->mobile;
        $shipping->line1 = $this->line1;
        $shipping->city = $this->city;
        $shipping->state = $this->state;
        $shipping->country = $this->country;
        $shipping->zipcode = $this->zipcode;
        $shipping->save();

        if($request->input('paymentmode') == 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id();
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
        
        $this->thankyou = 1;

        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        return redirect('thankyou');
    }

    // public function placeOrder()
    // {
    //     $this->validate([
    //         'firstname' => 'required',
    //         'lastname' => 'required',
    //         'email' => 'required|email',
    //         'mobile' => 'required',
    //         'line1' => 'required',
    //         'city' => 'required',
    //         'state' => 'required',
    //         'country' => 'required',
    //         'zipcode' => 'required',
    //         'paymentmode' => 'required'
    //     ]);

    //     $order = new Order();
    //     $order->user_id = Auth::user()->id();
    //     $order->subtotal = session()->get('checkout')['subtotal'];
    //     $order->discount = session()->get('checkout')['discount'];
    //     $order->tax = session()->get('checkout')['tax'];
    //     $order->total = session()->get('checkout')['total'];
    //     $order->firstname = $this->firstname;
    //     $order->lastname = $this->lastname;
    //     $order->email = $this->email;
    //     $order->mobile = $this->mobile;
    //     $order->line1 = $this->line1;
    //     $order->city = $this->city;
    //     $order->state = $this->state;
    //     $order->country = $this->country;
    //     $order->zipcode = $this->zipcode;
    //     $order->status = 'ordered';
    //     $order->is_shipping_different = 'false';
    //     $order->save();

    //     foreach(Cart::instance('cart')->content() as $item)
    //     {
    //         $orderItem = new OrderItem();
    //         $orderItem->product_id = $item->id;
    //         $orderItem->order_id = $order->id;
    //         $orderItem->price = $item->price;
    //         $orderItem->quantity = $item->qty;
    //         $orderItem->save();
    //     }

    //     // $shipping = new Shipping();
    //     // $shipping->order_id = $order->id;
    //     // $shipping->firstname = $this->firstname;
    //     // $shipping->lastname = $this->lastname;
    //     // $shipping->email = $this->email;
    //     // $shipping->mobile = $this->mobile;
    //     // $shipping->line1 = $this->line1;
    //     // $shipping->city = $this->city;
    //     // $shipping->state = $this->state;
    //     // $shipping->country = $this->country;
    //     // $shipping->zipcode = $this->zipcode;
    //     // $shipping->save();

    //     if($this->paymentmode == 'cod')
    //     {
    //         $transaction = new Transaction();
    //         $transaction->user_id = Auth::user()->id();
    //         $transaction->order_id = $order->id;
    //         $transaction->mode = 'cod';
    //         $transaction->status = 'pending';
    //         $transaction->save();
    //     }
        
    //     $this->thankyou = 1;

    //     Cart::instance('cart')->destroy();
    //     session()->forget('checkout');
    // }

    public function verifiyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifiyForCheckout();
        return view('livewire.checkout-component')->layout("layouts.base");
    }
}
