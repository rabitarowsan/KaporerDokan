@extends('auth')

@section('title', "KaporerDokan-Home")

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<style>
  #carouselExampleDark {
  z-index: -1; /* Adjust the z-index value as needed */
}

</style>

    <body>
    
        @include('include.header')

      <main style="padding-top: 100px;">
        <div class="container mt-7">
          <div class="row">
            <div class="col-md-12">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == '0' ? 'active':'' }}" >
                  @if ($sliderItem->image)
                  <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">
                  @endif
                  <div class="carousel-caption d-none d-md-block" style ="color: white;">
                    <h5>{{ $sliderItem->title }}</h5>
                    <p>{{ $sliderItem->description }}</p>
                    <div> <a href="#" class = "btn btn-slider" style="background-color: white; color: black;"> Get Now</a> </div>
                  </div>
                </div>
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            </div>
          </div>
        </div>
      </main>
    <div class = "py-5 bg-white">
      <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8">
          <h4> Welcome </h4>
          <div class="underline"></div>
          <p>
            Welcome to KaporerDokan
          </p>
        </div>
        </div>
      </div>
    </div>
    <div class = "py-5 bg-white">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <h4> trending </h4>
          <div class="underline"></div>
        </div>

        @if($trendingProducts)
            <div class="col-md-12">
              @foreach ($trendingProducts as $productItem)
                          <div class="col-md-4">
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
                          
                        
              @endforeach
            

            </div>
        @else
            <div class="col-md-12">
                            <div class="p-2">
                                <h4>No Products Available }</h4>
                            </div>
                        </div>
                        @endif
            </div>
      </div>
    </div>


</body>
      
        
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/w_work.js') }}"></script>
@endsection
