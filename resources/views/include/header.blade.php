
    <link rel="stylesheet" href="{{ asset('assets/css/h_style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      #wrap {
  margin: 50px 100px;
  display: inline-block;
  position: relative;
  height: 60px;
  float: right;
  padding: 0;
  position: relative;
}

input[type="text"] {
  height: 60px;
  font-size: 55px;
  display: inline-block;
  font-family: "Lato";
  font-weight: 100;
  border: none;
  outline: none;
  color: #555;
  padding: 3px;
  padding-right: 60px;
  width: 0px;
  position: absolute;
  top: 0;
  right: 0;
  background: none;
  z-index: 3;
  transition: width .4s cubic-bezier(0.000, 0.795, 0.000, 1.000);
  cursor: pointer;
}

input[type="text"]:focus:hover {
  border-bottom: 1px solid #BBB;
}

input[type="text"]:focus {
  width: 700px;
  z-index: 1;
  border-bottom: 1px solid #BBB;
  cursor: text;
}
    </style>

    <header>
    <a href="{{ url('/')}}" class="logo">Kaporer Dokan</a>
    <div class="group">
        <ul class="navigation">
            <li><a href="{{ url('/')}}">Home</a></li>
            <li class="dropdown">
                    <a href="#">Shop</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/collections') }}">Category</a></li>
                        <li><a href="{{ url('/new-arrivals') }}">New Arrivals</a></li>
                        <li><a href="{{ url('') }}">Featured Products</a></li>    
                    </ul>
                </li>
            <li><a href="{{route('tshirt.upload')}}">Custom Order</a></li>
            <li class="dropdown">
    <a href="#">
      @auth
        <span class="user-dropdown">{{ auth()->user()->name }}</span>
      @else
        <span>Login/Register</span>
      @endauth
    </a>
    <ul class="dropdown-menu user-dropdown-menu">
    <li><a href="{{url('orders') }}">Orders</a></li>
      @auth
        <li><a href="{{ route('logout') }}">Logout</a></li>
      @else
        <li><a href="{{ route('register') }}">Login/Register</a></li>
      @endauth
      
    </ul>
  </li>
    <li>
      <a href="{{ url('wishlist') }}">
        <i class="fa fa-heart"></i>(<livewire:frontend.wishlist-count/>)
      </a>
    </li>
    <li>
      <a href="{{ url('cart') }}" >
        <i class="fa fa-shopping-cart"></i> (<livewire:frontend.cart.cart-count />)
      </a>
    </li>
        </ul>
        <div class="wrap">
        <div class="search">
        <form action="{{ url('search') }}" method="GET" role="search">
          <div class="input-group">
            <input type="search" name="search" value= "{{ Request::get('search') }}" placeholder="Search for products" class="form-control">
            <button class="btn bg-white" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </form>    
        </div>
        </div>
    
    </header>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
      let searchBtn = document.querySelector('.searchBtn');
      let closeBtn = document.querySelector('.closeBtn');
      let searchBox = document.querySelector('.searchBox');
      let group = document.querySelector('.group');
      let menuToggle = document.querySelector('.menuToggle');
      let header = document.querySelector('header');

      searchBtn.addEventListener('click', function() {
          searchBox.classList.add('active');
          closeBtn.classList.add('active');
          searchBtn.classList.add('active');
          menuToggle.classList.add('hide');
          header.classList.remove('open');
          group.classList.add('active-search'); // Add class to .group when search bar is active
      });

      closeBtn.addEventListener('click', function() {
          searchBox.classList.remove('active');
          closeBtn.classList.remove('active');
          searchBtn.classList.remove('active');
          menuToggle.classList.remove('hide');
          group.classList.remove('active-search'); // Remove class from .group when search bar is closed
      });

      menuToggle.addEventListener('click', function() {
          header.classList.toggle('open');
          searchBox.classList.remove('active');
          closeBtn.classList.remove('active');
          searchBtn.classList.remove('active');
      });

    </script>




