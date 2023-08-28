@extends('auth')

@section('title', "Featured Products")

@section('content')
<div class = "py-5 bg-white">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <h4> Featured Products </h4>
          <div class="underline"></div>
        </div>

            
                
              @forelse ($featuredProducts as $productItem)
              <div class="col-md-3">
                <div class="product-card">
                                      <div class="product-card-img">
                                          
                                          <label class="stock" style="background-color: black; color: white; border-radius: 4px; padding: 2px 12px; margin: 8px; font-size: 12px;">New</label>
                                          

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
                <div class="col-md-12 p-2">
                    <h4>No Featured Products Available </h4>
                </div>
                @endforelse
            
            <div class="text-center">
                <a href="{{url('collections')}}" class="btn btn-warning px-3">Shop More</a>

            </div>
            
                        
            </div>
      </div>
    </div>
  
@endsection