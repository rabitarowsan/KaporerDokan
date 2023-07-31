<?php

namespace App\Http\Livewire\Frontend\Cart;

use auth;
use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
