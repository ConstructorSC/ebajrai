<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        return redirect()->route('product.cart');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        return redirect()->route('product.cart');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message','Item has been removed');
        return redirect()->route('product.cart');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {

        // if(!Cart::instance('cart')->count() > 0)
        // {
        //     session()->forget('checkout');
        //     return;
        // }

        session()->put('checkout',[
            'discount' => 0,
            'subtotal' => Cart::instance('cart')->subtotal(),
            'tax' => 0,
            'total' => Cart::instance('cart')->subtotal()
        ]);
        return redirect('checkout');
        // return back();
    }

    public function render()
    {
        // $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
