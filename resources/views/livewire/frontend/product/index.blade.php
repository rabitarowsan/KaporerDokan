<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)
            <div class="card">
                <div class="card-header"><h4>Brands</h4></div>
                <div class="card-body">
                @foreach ($category->brands as $brandItem)
                    <label class="d-block">
                    <input type = "checkbox" wire:model="brandInputs" value="{{$brandItem->name}}"/>{{$brandItem->name}}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="card mt=3">
                <div class="card-header"><h4>Price</h4></div >
                <div class="card-body">
                    <label class="d-block">
                        <input type = "radio" name="priceSort" wire:model="priceInput" value="high-to-low"/>High to Low
                    </label>

                    <label class="d-block">
                        <input type = "radio" name="priceSort" wire:model="priceInput" value="low-to-high"/>Low to High
                    </label>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-4">
                            <div class="product-card">
                                <div class="product-card-img">
                                    @if($productItem->quantity > 0)
                                    <label class="stock" style="background-color: black; color: white; border-radius: 4px; padding: 2px 12px; margin: 8px; font-size: 12px;">In Stock</label>
                                    @else
                                    <label class="stock" style="background-color: grey; color: white; border-radius: 4px; padding: 2px 12px; margin: 8px; font-size: 12px;">Out of Stock</label>
                                    @endif

                                    @if($productItem->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" style="color: black;">
                                    <div style="width: 200px; height: 200px; overflow: hidden;">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    </a>

                                    @endif

                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">
                                        @if($productItem->brand)
                                            {{ $productItem->brand }}
                                        @else
                                            Unknown Brand
                                        @endif
                                    </p>
                                    <h5 class="product-name" style = "color: black;">
                                       <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" style = "color: black;">
                                            {{ $productItem->name }} 
                                       </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{ $productItem->selling_price }}</span>
                                        @if($productItem->original_price > $productItem->selling_price)
                                            <span class="original-price">${{ $productItem->original_price }}</span>
                                        @endif
                                    </div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href = "">  <i class="fa fa-heart"></i> </a>
                                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="btn btn1"> View </a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                    @endforelse
                </div>
        </div>
    </div>
</div>

<!-- Include Livewire scripts -->
@livewireScripts

