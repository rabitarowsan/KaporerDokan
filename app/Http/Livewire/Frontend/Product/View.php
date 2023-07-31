<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1;

    public function addToWishList($productId){
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id',$productId)->exists())
            {
                
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already Added to Wishlist!',
                    'type' => 'info',
                    'status' => 401
                ]);
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);

                $this->emit('wishlistAddedUpdated');
                
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to Wishlist!',
                    'type' => 'info',
                    'status' => 401
                ]);
            }
        }
        else
        {
            
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    
    
    public function colorSelected($productColorId)
    {
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount < 10){
        $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if($this->quantityCount > 1)
        {
        $this->quantityCount--;
        }
    }

    public function mount($category, $product)
    {
        $this->category =$category;
        $this->product =$product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
