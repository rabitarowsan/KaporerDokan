<div class = "white-background">
    <div class="py-3 py-md-5 bg-light">
        <div class="container" style = "padding: 80px;">
            <h4 class="text-center"> Cart </h4>
            <hr>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @forelse($cart as $cartItem)
                            @if ($cartItem->product)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                            <label class="product-name" style = "color: black;">
                                                @if($cartItem->product->productImages)
                                                    <img src="{{ asset($cartItem->product->productImages[0]->image) }}" style="object-fit: contain; width: 50px; height: 50px" alt="">
                                                @else
                                                    <img src="" style="object-fit: contain; width: 50px; height: 50px" alt="">
                                                @endif

                                                {{$cartItem->product->name}}

                                                @if ($cartItem->productColor)
                                                    @if($cartItem->productColor->color)
                                                    <span>- Color: {{ $cartItem->productColor->color->name }} </span>
                                                    @endif
                                                @endif   
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">${{$cartItem->product->selling_price * $cartItem->quantity}} </label>
                                        @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity @endphp
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                                <input type="text" value="{{ $cartItem->quantity }}" class="input-quantity" />
                                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <a href="" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        
                        @empty
                            <div>No items added yet!!</div>
                        @endforelse
                      
                    </div>
                </div>
            </div>
            .<div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h4>
                        Get the Best Deals & Offers <a href="{{ url('/collections') }}">Shop Now!!</a>
                    </h4>
                </div>
                <div class="col-md-4 mt-3">
                    <div class = "shadow-sm bg-white p-3">
                        <h5>Total:
                            <span class = "float-end">${{ $totalPrice }}</span>
                        </h5>
                        <hr>     
                        <a href="{{ url('/checkout') }}" class = "btn btn-warning  w-100 d-inline-block" style = "background:black; color:white;">CheckOut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
