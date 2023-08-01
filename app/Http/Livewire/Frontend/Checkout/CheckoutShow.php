<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Orderitem;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    public function rules() 
    {
        return [
            'fullname' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|digits_between:10,11',
            'pincode' => 'required|digits:4',
            'address' => 'required|string|max:100',
            
        ];    
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id'=> auth()->user()->id,
            'tracking_no' => 'kaporerdokan-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'processing',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);

        if ($order) {
        
        foreach ($this->carts as  $cartItem) 
        {
            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'product_id' =>  $cartItem->product_id, 
                'product_color_id' =>  $cartItem->product_color_id,
                'quantity' =>  $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);
        }

        return $order;
    }
    return false;
        
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) 
        {
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'notify',
                'status' => 200
            ]);

            return redirect()->to('thank-you');
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong! Try Again!!',
                'type' => 'notify',
                'status' => 200
            ]);
        }
    }

    public function totalProductAmount()
    {
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as  $cartItem) 
        {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->totalProductAmount();

        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
